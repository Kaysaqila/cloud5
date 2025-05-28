<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Industri;
use App\Models\Pkl;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count(); // hitung semua siswa
        $totalIndustri = Industri::count();
        $totalPkl = Pkl::count();

        return view('dashboard', [
            'totalSiswa' => $totalSiswa,
            'totalIndustri' => $totalIndustri,
            'totalPkl' => $totalPkl,
        ]);
    }
}