<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PekerjaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SearchController;
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
Route::get("/home", function(){
    return view("home.dashboardhome");
});

Route::get('/', function(){
    return view("home.dashboardhome");});
Route::get('/login', [AuthController::class, 'login']);
Route::post('/post_login', [AuthController::class, 'post_login']);
Route::get('/logout', [AuthController::class, 'logout']);

//----------------------------------P E M I L I K-----------------------------------//
//pemilik-akun
Route::get('/pemilik/dashboard', [DashboardController::class, 'pemilik_dashboard']);
Route::get('/pemilik/akun/edit/{id}', [DashboardController::class, 'pemilik_akun_edit']);
Route::post('/pemilik/akun/update/{id}', [DashboardController::class, 'pemilik_akun_update']);

//pemilik-pekerja
Route::get('/pekerja', [PekerjaController::class, 'index']);
Route::get('/pekerja/create', [PekerjaController::class, 'create']);
Route::post('/pekerja/insert', [PekerjaController::class, 'insert']);
Route::get('/pekerja/edit/{id}', [PekerjaController::class, 'edit']);
Route::post('/pekerja/update/{id}', [PekerjaController::class, 'update']);

//pemilik-keuangan
Route::get('/keuangan', [KeuanganController::class, 'index']);
Route::get('/keuangan/create', [KeuanganController::class, 'create']);
Route::post('/keuangan/insert', [KeuanganController::class, 'insert']);
Route::get('/keuangan/edit/{id}', [KeuanganController::class, 'edit']);
Route::post('/keuangan/update/{id}', [KeuanganController::class, 'update']);








//----------------------------------P E K E R J A-----------------------------------//
Route::get('/pekerja/dashboard', [DashboardController::class, 'pekerja_dashboard']);
Route::get('/pekerja/akun/edit/{id}', [DashboardController::class, 'pekerja_akun_edit']);
Route::post('/pekerja/akun/update/{id}', [DashboardController::class, 'pekerja_akun_update']);






//----------------------------------ALL ACCESS-----------------------------------//
//all-bahanbaku
Route::get('/bahan_baku', [BahanBakuController::class, 'index']);
Route::get('/bahan_baku/create', [BahanBakuController::class, 'create']);
Route::post('/bahan_baku/insert', [BahanBakuController::class, 'insert']);
Route::get('/bahan_baku/{nama_bahanbaku}', [BahanBakuController::class, 'detail']);
Route::get('/bahanbaku/{nama_bahanbaku}/edit/{id}', [BahanBakuController::class, 'edit']);
Route::post('/bahanbaku/{nama_bahanbaku}/update/{id}', [BahanBakuController::class, 'update']);


//all-produk
Route::get('/produk', [ProdukController::class, 'index']);
//all-produk-dibuat
Route::get('/produk/dibuat', [ProdukController::class, 'produk_dibuat']);
Route::get('/produk/dibuat/create', [ProdukController::class, 'produk_dibuat_create']);
Route::post('/produk/dibuat/insert', [ProdukController::class, 'produk_dibuat_insert']);
Route::get('/produk/dibuat/edit/{id}', [ProdukController::class, 'produk_dibuat_edit']);
Route::post('/produk/dibuat/update/{id}', [ProdukController::class, 'produk_dibuat_update']);

//all-produk-terjual
Route::get('/produk/terjual', [ProdukController::class, 'produk_terjual']);
Route::get('/produk/terjual/create', [ProdukController::class, 'produk_terjual_create']);
Route::post('/produk/terjual/insert', [ProdukController::class, 'produk_terjual_insert']);
Route::get('/produk/terjual/edit/{id}', [ProdukController::class, 'produk_terjual_edit']);
Route::post('/produk/terjual/update/{id}', [ProdukController::class, 'produk_terjual_update']);

//all-laporan
Route::get('/laporan', [LaporanController::class, 'index']);
Route::get('/laporan/create', [LaporanController::class, 'create']);
Route::post('/laporan/insert', [LaporanController::class, 'insert']);
Route::get('/laporan/edit/{id}', [LaporanController::class, 'edit']);
Route::post('/laporan/update/{id}', [LaporanController::class, 'update']);

//all-grafik
Route::get('/grafik', [GrafikController::class, 'index']);
Route::get('/grafik/keuangan', [GrafikController::class, 'keuangan']);
Route::get('/grafik/bahan_baku', [GrafikController::class, 'bahan_baku']);
Route::get('/grafik/produk_dibuat', [GrafikController::class, 'produk_dibuat']);
Route::get('/grafik/produk_dijual', [GrafikController::class, 'produk_terjual']);

//all-download
Route::get('/download', [DownloadController::class, 'index']);
Route::get('/download/bahanbaku', [DownloadController::class, 'bahanbaku']);
Route::get('/download/produk_dibuat', [DownloadController::class, 'produk_dibuat']);
Route::get('/download/produk_terjual', [DownloadController::class, 'produk_terjual']);
Route::get('/download/keuangan', [DownloadController::class, 'keuangan']);
Route::get('/download/laporan', [DownloadController::class, 'laporan']);
