<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaAktifController;
use App\Http\Controllers\PKLController;
use App\Http\Controllers\PenelitianController;
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
    return view('welcome');
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
});

require __DIR__.'/auth.php';
