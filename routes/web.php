<?php

use App\Http\Controllers\PegadaianController;
use App\Http\Controllers\LoginController;
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
Route::get('/', [PegadaianController::class, 'index'])->name('landing');
Route::post('/store',[PegadaianController::class, 'store'])->name('store');


Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('isPublic');
Route::post('/auth', [LoginController::class, 'auth'])->name('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');;



Route::group(['middleware' => ['isLogin']], function () {
    // Petugas
    Route::get('/petugas', [PegadaianController::class, 'petugas'])->name('data-petugas')->middleware('isPetugas');
    Route::get('/petugas/status', [PegadaianController::class, 'status'])->name('status-petugas')->middleware('isPetugas');
    Route::post('/create/{id}', [PegadaianController::class, 'create'])->name('create')->middleware('isPetugas');
    Route::post('/update/{id}', [PegadaianController::class, 'update'])->name('update')->middleware('isPetugas');
    // Admin
    Route::get('/admin', [PegadaianController::class, 'admin'])->name('data-admin')->middleware('isAdmin');
    Route::post('/admin', [PegadaianController::class, 'admin'])->name('data-admin')->middleware('isAdmin');
    Route::get('/export/pdf', [PegadaianController::class, 'pdf'])->name('export-pdf')->middleware('isAdmin');
    // Route::get('/export/excel', [PegadaianController::class, 'excel'])->name('export-excel')->middleware('isAdmin');
});

// //route utk admin dan petugas setelah login agar bisa logout
// Route::middleware(['isLogin', 'CekRole:admin,petugas'])->group(function() {
// Route::get('/logout', [ReportController::class, 'logout'])->name('logout');});
