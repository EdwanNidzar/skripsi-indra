<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaAktifController;
use App\Http\Controllers\PeminjamanAulaController;
use App\Http\Controllers\PKLController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\CutiMahasiswaController;
use App\Http\Controllers\CutiDosenController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// route for mahasiswa-aktif
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('mahasiswa-aktif', MahasiswaAktifController::class);
    Route::patch('mahasiswa-aktif/{mahasiswaAktif}/verify', [MahasiswaAktifController::class, 'verify'])->name('mahasiswa-aktif.verify');
    Route::patch('mahasiswa-aktif/{mahasiswaAktif}/reject', [MahasiswaAktifController::class, 'reject'])->name('mahasiswa-aktif.reject');
});

// route for pkl
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('pkl', PKLController::class);
    Route::patch('pkl/{pkl}/verify', [PKLController::class, 'verify'])->name('pkl.verify');
    Route::patch('pkl/{pkl}/reject', [PKLController::class, 'reject'])->name('pkl.reject');
});

// route for penelitian
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('penelitian', PenelitianController::class);
    Route::patch('penelitian/{penelitian}/verify', [PenelitianController::class, 'verify'])->name('penelitian.verify');
    Route::patch('penelitian/{penelitian}/reject', [PenelitianController::class, 'reject'])->name('penelitian.reject');
    Route::get('penelitian-report', [PenelitianController::class, 'report'])->name('penelitian.report');
    Route::get('penelitian-report-by-id/{penelitian}', [PenelitianController::class, 'reportById'])->name('penelitian.report-by-id');
});

// route for peminjam
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('peminjaman-aula', PeminjamanAulaController::class);
    Route::patch('peminjaman-aula/{peminjaman_aula}/verify', [PeminjamanAulaController::class, 'verify'])->name('peminjaman-aula.verify');
    Route::patch('peminjaman-aula/{peminjaman_aula}/reject', [PeminjamanAulaController::class, 'reject'])->name('peminjaman-aula.reject');
});

// route for cuti mahasiswa
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('cuti-mahasiswa', CutiMahasiswaController::class);
    Route::patch('cuti-mahasiswa/{cutiMahasiswa}/verify', [CutiMahasiswaController::class, 'verify'])->name('cuti-mahasiswa.verify');
    Route::patch('cuti-mahasiswa/{cutiMahasiswa}/reject', [CutiMahasiswaController::class, 'reject'])->name('cuti-mahasiswa.reject');
    Route::get('cuti-mahasiswa-report', [CutiMahasiswaController::class, 'report'])->name('cuti-mahasiswa.report');
    Route::get('cuti-mahasiswa-report-by-id/{cutiMahasiswa}', [CutiMahasiswaController::class, 'reportById'])->name('cuti-mahasiswa.report-by-id');
});

// route for cuti dosen
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('cuti-dosen', CutiDosenController::class);
    Route::patch('cuti-dosen/{cutiDosen}/verify', [CutiDosenController::class, 'verify'])->name('cuti-dosen.verify');
    Route::patch('cuti-dosen/{cutiDosen}/reject', [CutiDosenController::class, 'reject'])->name('cuti-dosen.reject');
});

require __DIR__.'/auth.php';
