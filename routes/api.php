<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\NilaiMahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\HasTokenApi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/user/validate', [UserController::class, 'auth'])->middleware(HasTokenApi::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'currentUser']);
    Route::get('/user/log-out', [UserController::class, 'logout']);
    Route::resource('mahasiswa', MahasiswaController::class)->middleware('checkRole:1,2');
    Route::resource('nilai', NilaiMahasiswaController::class)->middleware('checkRole:2,3');
    Route::resource('prodi', ProdiController::class)->middleware('checkRole:1');
    Route::resource('kelas', KelasController::class)->middleware('checkRole:1,3');
    Route::resource('mata-kuliah', MataKuliahController::class)->middleware('checkRole:1');
    Route::resource('dosen', DosenController::class)->middleware('checkRole:1');
});
