<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IcdController;
use App\Http\Controllers\InspectionsController;
use App\Http\Controllers\ReportDiagnosaController;
use App\Http\Controllers\ReportServiceController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ServiceController;
use App\Models\Inspection;

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
Route::middleware('guest')->group(function () {  
    Route::get('/', [LoginController::class, 'index']);
    Route::get('/login',[LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::get('/dashboard',[DashboardController::class, 'index']);

    
    Route::resource('/dokter', DokterController::class);
    Route::resource('/pengguna', UsersController::class);
    Route::resource('/patient', PatientController::class);
    
    Route::resource('/pemeriksaan', InspectionsController::class);

    Route::get('/pemeriksaan/{pemeriksaan}/create', [InspectionsController::class, 'create'])->name('pemeriksaan.create');
    Route::post('/pemeriksaan/{pemeriksaan}/create', [InspectionsController::class, 'store'])->name('pemeriksaan.store');
    
    Route::get('/laporan/diagnosa', [ReportDiagnosaController::class, 'index'])->name('report.diagnosis');
    Route::post('/laporan/diagnosa/view-pdf', [ReportDiagnosaController::class, 'viewPDF'])->name('view-pdf-diagnosis');
    Route::post('/laporan/diagnosa/download-pdf', [ReportDiagnosaController::class, 'downloadPDF'])->name('download-pdf-diagnosis');

    Route::get('/laporan/layanan', [ReportServiceController::class, 'index'])->name('report.service');
    Route::post('/laporan/layanan/view-pdf', [ReportServiceController::class, 'viewPDF'])->name('view-pdf-service');
    Route::post('/laporan/layanan/download-pdf', [ReportServiceController::class, 'downloadPDF'])->name('download-pdf-service');

    Route::get('/laporan/jumlah-transaksi', [TransactionController::class, 'index'])->name('report.transaction');
    Route::post('/laporan/jumlah-transaksi/view-pdf', [TransactionController::class, 'viewPDF'])->name('view-pdf-transaction');
    Route::post('/laporan/jumlah-transaksi/download-pdf', [TransactionController::class, 'downloadPDF'])->name('download-pdf-transaction');

    Route::get('/icd', [IcdController::class, 'action'])->name('icd.cari');
    Route::get('/service', [ServiceController::class, 'action'])->name('service');
});

