<?php

use App\Http\Controllers\DashboardController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('/presensi-tu')->group(function () {
    Route::get('/', [ReportPresencesController::class, 'presensi_tu'])->name('presensi-tu');
    Route::delete('/{id}', [ReportPresencesController::class, 'resetPresensiTu'])->name('presensi-tu-reset');
    Route::get('export/{type}', [ReportPresencesController::class, 'exportPresensiTU'])->name('presensi-tu-export');
});
Route::get('/presensi-guru', [ReportPresencesController::class, 'presensi_guru'])->name('presensi-guru');
Route::prefix('/personil')->group(function () {
    Route::get('/', [PersonilController::class, 'index'])->name('personil');
    Route::get('/export/{type}', [PersonilController::class, 'exportPersonil'])->name('export-personil');
});


// Route::get();


Route::get('/about', function () {
    return view('tentang.index');
})->name('about');
