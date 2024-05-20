<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IjinController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\KelompokPegawaiController;
use App\Http\Controllers\PersonilController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WifiController;
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

    // fitur presensi
    Route::prefix('presensi')->group(function () {
        Route::get('/report-recap', [PresensiController::class, 'reportOfRecap'])->name('presensi.report.re');
        Route::get('/{show?}/{personil?}', [PresensiController::class, 'index'])->name('presensi');
    });

    // perijinan
    Route::prefix('ijin')->group(function () {
        Route::get('/guru', [IjinController::class, 'ijin_guru'])->name('ijin-guru');
    });

    Route::prefix('/jurnal')->group(function () {
        Route::get('/detail/{personil}/{tanggal}', [JurnalController::class, 'detail'])->name('jurnal.detail');
        Route::get('/download/{personil}/{tanggal}', [JurnalController::class, 'generateJurnal'])->name('jurnal.download');
        Route::get('/{show?}/{personil?}', [JurnalController::class, 'index'])->name('jurnal');
    });
    /**
     * MASTER ROUTES
     */
    Route::prefix('/personil')->group(function () {
        Route::get('/', [PersonilController::class, 'index'])->name('personil');
        Route::get('/create', [PersonilController::class, 'create'])->name('personil-create');
        Route::get('/import', [PersonilController::class, 'import'])->name('personil-import');
        Route::get('/download', [PersonilController::class, 'downloadFormat'])->name('personil-format-download');
        Route::get('/reset', [PersonilController::class, 'reset'])->name('personil-reset');
        Route::get('/{personil}/edit', [PersonilController::class, 'edit'])->name('personil.edit');
    });
    Route::get('wifi', [WifiController::class, 'index'])->name('wifi');
    Route::prefix('kelompok')->group(function () {
        Route::get('/', [KelompokPegawaiController::class, 'index'])->name('kelompok');
    });

    Route::prefix('siswa')->group(function () {
        Route::get('/', [SiswaController::class, 'index'])->name('siswa');
        Route::get('/import', [SiswaController::class, 'import'])->name('siswa-import');
        Route::get('/reset', [SiswaController::class, 'reset'])->name('siswa-reset');
        Route::get('/download', [SiswaController::class, 'downloadFormat'])->name('siswa-format-download');
    });
    /**
     * END MASTER ROUTES
     */
    Route::get('/about', function () {
        return view('tentang.index');
    })->name('about');
    Route::delete('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginProcess'])->name('login.action');
});


