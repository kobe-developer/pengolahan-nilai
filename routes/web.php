<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\NilaiMahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\UserAuthorizeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', fn () => view('login.index'))->name('login');
    Route::post('/authorize', [UserAuthorizeController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('user-interface.pages.dashboard');
    })->name('dashboard');
    Route::delete('/logout', [UserAuthorizeController::class, 'logout']);
    Route::resource('dosen', DosenController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('mata-kuliah', MataKuliahController::class);
    Route::resource('prodi', ProdiController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('nilai', NilaiMahasiswaController::class);
});
