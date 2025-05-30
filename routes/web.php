<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('menunggu', function () {
    if (!Auth::check()) {
        return redirect('/'); // landing page
    }
    return view('livewire.tunggu');
})->name('tunggu');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    //tambahkan nama alias checkuserroles, dan parameternya (role)
    'CheckUserRoles:super_admin',
    'CheckUserRoles:admin_guru',
    'CheckUserRoles:siswa'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

//pkl-ish
Route::get('dataPkl',App\Livewire\Pkl\Index::class)->name('pkl');
Route::get('/dataPkl/createDataPkl',App\Livewire\Pkl\Create::class)->name('pklCreate');
Route::get('/dataPkl/{id}',App\Livewire\Pkl\View::class)->name('pklView');
Route::get('/dataPkl/{id}/editDataPkl',App\Livewire\Pkl\Edit::class)->name('pklEdit');

//guru-ish
Route::get('/dataGuru',App\Livewire\Guru\Index::class)->name('guru');

//siswa
Route::get('/dataSiswa',App\Livewire\Siswa\Index::class)->name('siswa');

//industri
Route::get('dataIndustri',App\Livewire\Industri\Index::class)->name('industri');
Route::get('/dataIndustri/createDataIndustri',App\Livewire\Industri\Create::class)->name('industriCreate');
Route::get('/dataIndustri/{id}/editDataIndustri',App\Livewire\Industri\Edit::class)->name('industriEdit');

// //dashboard
// Route::get('/dashboard', [DashboardController::class, 'index'])
//     ->middleware(['auth'])
//     ->name('dashboard');