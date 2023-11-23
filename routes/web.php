<?php

use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendaftaranController;
use App\Models\Mahasiswa;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Session\Session;
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

Route::middleware(['guest'])->group(function () {
    // Route::get('/home', [homeController::class, 'index']);
// Route::post('/', [SessionController::class, 'login']);
});
Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [SessionController::class, 'index']);
Route::post('/login', [SessionController::class, 'login']);
Route::post('/logout', [SessionController::class, 'logout']);
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class,'index'])->middleware('userAkses:admin');
    Route::get('/create', [PendaftaranController::class,'create'])->middleware('userAkses:user');
    Route::get('/pendaftaran/hasil', [PendaftaranController::class,'index'])->middleware('userAkses:user');
    Route::get('/pendaftaran/verifikasi/{nim}', [PendaftaranController::class,'update'])->middleware('userAkses:admin');
    // Route::put('mahasiswa/verifikasi/{id}', 'mahasiswaController@verifikasi')->name('mahasiswa.verifikasi');
    Route::get('/logout', [SessionController::class,'logout'])->middleware('userAkses:user');
    Route::get('/logout', [SessionController::class,'logout'])->middleware('userAkses:admin');
});

Route::resource('pendaftaran', PendaftaranController::class);
Route::resource('mahasiswa', PendaftaranController::class);
Route::get('/fetch-ipk', [PendaftaranController::class, 'fetchIpk']);
// Route::get('/mahasiswa', [MahasiswaController::class, 'index']);