<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    GuruController,
    KelasController,
    MapelController,
    SiswaController,
    AuthController
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

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('name.postlogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'checkrole:admin']], function(){
    //Route Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    
    
    //route guru
    Route::get('/guru/data', [GuruController::class, 'data'])->name('guru.data');
    Route::resource('/guru', GuruController::class);
    Route::get('/guru/edit/{id}', [GuruController::class, 'edit']);
    Route::get('/guru/hapus/{id}', [GuruController::class, 'destroy']);
    
    //route Kelas
    Route::get('/kelas/data', [KelasController::class, 'data'])->name('kelas.data');
    Route::resource('/kelas', KelasController::class);
    
    // route mapel
    Route::get('/mapel/data', [MapelController::class, 'data'])->name('mapel.data');
    Route::resource('/mapel', MapelController::class);
    
    //Route Siswa
    Route::get('/siswa/data', [SiswaController::class, 'data'])->name('siswa.data');
    Route::resource('/siswa', SiswaController::class);
    Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit']);
    Route::get('/siswa/hapus/{id}', [SiswaController::class, 'destroy']);
    Route::get('/siswa/profile/{id}', [SiswaController::class, 'profile'])->name('siswa.profile');
    
});

Route::group(['middleware' => ['auth', 'checkrole:admin,siswa']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});