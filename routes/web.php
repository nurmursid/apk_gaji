<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

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

/* Route::get('/', function () {
    return view('welcome');
});
 */
//Tampilan  


Route::get('/', [LoginController::class, 'ShowLoginForm'])->name('login.index');
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('/gaji', [GajiController::class, 'index'])->name('gaji.index');
Route::get('/Perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan.index');

Route::prefix('pegawai')->group(function(){
    Route::post('store', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('add', [PegawaiController::class, 'create'])->name('pegawai.create');
    Route::get('edit/{id}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::post('update/{id}', [PegawaiController::class,'update'])->name('pegawai.update');
    Route::post('delete/{id}', [PegawaiController::class,'delete'])->name('pegawai.delete');
    Route::get('search', [PegawaiController::class,'search'])->name('pegawai.search');
    Route::post('soft_delete/{id}', [PegawaiController::class,'soft_delete'])->name('pegawai.soft_delete');
    Route::post('restore/{id}', [PegawaiController::class,'restore'])->name('pegawai.restore');
});

Route::prefix('gaji')->group(function(){
    Route::post('store', [GajiController::class, 'store'])->name('gaji.store');
    Route::get('add', [GajiController::class, 'create'])->name('gaji.create');
    Route::get('edit/{id}', [GajiController::class, 'edit'])->name('gaji.edit');
    Route::post('update/{id}', [GajiController::class,'update'])->name('gaji.update');
    Route::post('delete/{id}', [GajiController::class,'delete'])->name('gaji.delete');
});

Route::prefix('perusahaan')->group(function(){
    Route::post('store', [PerusahaanController::class, 'store'])->name('perusahaan.store');
    Route::get('add', [PerusahaanController::class, 'create'])->name('perusahaan.create');
    Route::get('edit/{id}', [PerusahaanController::class, 'edit'])->name('perusahaan.edit');
    Route::post('update/{id}', [PerusahaanController::class,'update'])->name('perusahaan.update');
    Route::post('delete/{id}', [PerusahaanController::class,'delete'])->name('perusahaan.delete');
});

//Login

Auth::routes();

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 */