<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    GuruController,
    KelasController,
    MapelController,
    SiswaController
};
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
    return view('layout.app');
});

Route::resource('/guru', GuruController::class);

//route Kelas
Route::get('/kelas/data', [KelasController::class, 'data'])->name('kelas.data');
Route::resource('/kelas', KelasController::class);

// route mapel
Route::get('/mapel/data', [MapelController::class, 'data'])->name('mapel.data');
Route::resource('/mapel', MapelController::class);

Route::resource('/siswa', SiswaController::class);