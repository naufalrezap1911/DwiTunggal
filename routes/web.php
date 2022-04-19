<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;

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

Route::get('Login', [MasterController::class, 'Login'])->name('Login');
Route::post('AuthLogin', [MasterController::class, 'AuthLogin'])->name('AuthLogin');
Route::get('Logout', [MasterController::class, 'Logout'])->name('Logout');

Route::middleware(['Login'])->group(function () {
    Route::get('Dashboard', [MasterController::class, 'Dashboard'])->name('Dashboard');
    Route::get('Profil', [MasterController::class, 'Profil'])->name('Profil');
    Route::get('EditProfil', [MasterController::class, 'EditProfil'])->name('EditProfil');
    Route::post('AuthEditProfil', [MasterController::class, 'AuthEditProfil'])->name('AuthEditProfil');
    Route::get('DataPekerja', [MasterController::class, 'DataPekerja'])->name('DataPekerja');
    Route::get('TambahPekerja', [MasterController::class, 'TambahPekerja'])->name('TambahPekerja');
    Route::post('AuthTambahPekerja', [MasterController::class, 'AuthTambahPekerja'])->name('AuthTambahPekerja');
    Route::get('DataBahanBaku', [MasterController::class, 'DataBahanBaku'])->name('DataBahanBaku');
    Route::get('TambahBahanBaku', [MasterController::class, 'TambahBahanBaku'])->name('TambahBahanBaku');
    Route::post('AuthTambahBahanBaku', [MasterController::class, 'AuthTambahBahanBaku'])->name('AuthTambahBahanBaku');
    Route::get('EditBahanBaku/{id}', [MasterController::class, 'EditBahanBaku'])->name('EditBahanBaku');
    Route::post('AuthEditBahanBaku', [MasterController::class, 'AuthEditBahanBaku'])->name('AuthEditBahanBaku');
});
