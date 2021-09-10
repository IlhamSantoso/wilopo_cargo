<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataMasterController;
use App\Http\Controllers\DataPengajuanController;
use App\Http\Controllers\ManagemenUserController;
use App\Http\Controllers\PengajuanCutiController;

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

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('/');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::POST('/login', [LoginController::class, 'authenticate'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::POST('/logout', [LoginController::class, 'logout'])->name('logout');
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/pengajuan-cuti', PengajuanCutiController::class);

    Route::resource('/data-pengajuan-cuti', DataPengajuanController::class)->except(['show', 'destroy', 'create', 'edit', 'store'])->middleware('admin');

    Route::resource('/data-master-cuti', DataMasterController::class)->except(['show', 'destroy'])->middleware('admin');

    Route::resource('/managemen-karyawan', ManagemenUserController::class)->except(['show'])->middleware('admin');
});


