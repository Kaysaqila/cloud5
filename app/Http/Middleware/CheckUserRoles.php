<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa; // ⬅ tambahkan ini untuk akses ke model Siswa

class CheckUserRoles
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Kalau belum login, langsung arahkan ke tampilan 'tunggu'
        if (!Auth::check()) {
            return response()->view('livewire.tunggu');
        }

        // Jika user punya salah satu role, izinkan
        if ($user->hasAnyRole(['super_admin', 'admin_guru', 'siswa'])) {
            return $next($request);
        }

        // Cek apakah user termasuk ke tabel siswa berdasarkan user_id
        $isSiswaTercatat = Siswa::where('email', $user->email)->exists();

        // Jika dia termasuk di tabel siswa, izinkan
        if ($isSiswaTercatat) {
            return $next($request);
        }

        // Jika semua gagal, tampilkan tampilan 'tunggu'
        return response()->view('livewire.tunggu');
    }
}
