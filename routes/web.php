<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IjinController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\PersonilController;
use App\Http\Controllers\ReportPresencesController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('/presensi-tu')->group(function () {
        Route::get('/{show?}', [ReportPresencesController::class, 'presensi_tu'])->name('presensi-tu');
        Route::delete('/{id}/{tgl}', [ReportPresencesController::class, 'resetPresensiTu'])->name('presensi-tu-reset');
        // Route::get('export/{type}', [ReportPresencesController::class, 'exportPresensiTU'])->name('presensi-tu-export');
    });
    Route::prefix('/presensi-guru')->group(function () {
        Route::get('/{show?}', [ReportPresencesController::class, 'presensi_guru'])->name('presensi-guru');
        // Route::get('export/{type}', [ReportPresencesController::class, 'exportPresensiGuru'])->name('presensi-guru-export');
        Route::delete('/{id}/{tgl}', [ReportPresencesController::class, 'resetPresensiGuru'])->name('presensi-guru-reset');
    });
    Route::prefix('/personil')->group(function () {
        Route::get('/', [PersonilController::class, 'index'])->name('personil');
        // Route::get('/export/{type}', [PersonilController::class, 'exportPersonil'])->name('export-personil');
    });

    // perijinan
    Route::prefix('ijin')->group(function () {
        Route::get('/guru', [IjinController::class, 'ijin_guru'])->name('ijin-guru');
    });

    Route::prefix('/jurnal')->group(function () {
        Route::get('/', [JurnalController::class, 'index'])->name('jurnal');
    });
    Route::get('/about', function () {
        return view('tentang.index');
    })->name('about');
    Route::delete('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginProcess'])->name('login.action');
});


