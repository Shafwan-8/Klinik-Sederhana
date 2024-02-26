<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IcdController;
use App\Http\Controllers\InspectionsController;
use App\Http\Controllers\MasterLayananController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ReportDiagnosaController;
use App\Http\Controllers\ReportServiceController;
use App\Http\Controllers\ReportTransactionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MasterIcdxController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\MailButaWarnaController;
use App\Http\Controllers\MailDokterController;
use App\Http\Controllers\MailSehatController;
use App\Http\Controllers\ProfileController;
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
    Route::get('/pemeriksaan/{pemeriksaan}/detail', [InspectionsController::class, 'detail'])->name('pemeriksaan.detail');

    Route::get('/pemeriksaan/{pemeriksaan}/surat/keterangan-dokter', [MailDokterController::class, 'mailDokter'])->name('surat.dokter');
    Route::get('/pemeriksaan/{pemeriksaan}/surat/keterangan-sehat', [MailDokterController::class, 'mailSehat'])->name('surat.sehat');
    Route::get('/pemeriksaan/{pemeriksaan}/surat/keterangan-buta-warna', [MailDokterController::class, 'mailButaWarna'])->name('surat.buta-warna');
    
    Route::get('/pemeriksaan/{pemeriksaan}/create', [InspectionsController::class, 'create'])->name('pemeriksaan.create');
    Route::post('/pemeriksaan/{pemeriksaan}/create', [InspectionsController::class, 'store'])->name('pemeriksaan.store');
    
    Route::get('/laporan/diagnosa', [ReportDiagnosaController::class, 'index'])->name('report.diagnosis');
    Route::post('/laporan/diagnosa/view-pdf', [ReportDiagnosaController::class, 'viewPDF'])->name('view-pdf-diagnosis');
    Route::post('/laporan/diagnosa/download-pdf', [ReportDiagnosaController::class, 'downloadPDF'])->name('download-pdf-diagnosis');

    Route::get('/laporan/layanan', [ReportServiceController::class, 'index'])->name('report.service');
    Route::post('/laporan/layanan/view-pdf', [ReportServiceController::class, 'viewPDF'])->name('view-pdf-service');
    Route::post('/laporan/layanan/download-pdf', [ReportServiceController::class, 'downloadPDF'])->name('download-pdf-service');

    Route::get('/laporan/jumlah-transaksi', [ReportTransactionController::class, 'index'])->name('report.transaction');
    Route::post('/laporan/jumlah-transaksi/view-pdf', [ReportTransactionController::class, 'viewPDF'])->name('view-pdf-transaction');
    Route::post('/laporan/jumlah-transaksi/download-pdf', [ReportTransactionController::class, 'downloadPDF'])->name('download-pdf-transaction');

    // Route liveSearch
    Route::get('/icd', [IcdController::class, 'action'])->name('icd');
    Route::get('/icd/lainnya', [IcdController::class, 'actionLainnya'])->name('icd.lainnya');
    Route::get('/service', [ServiceController::class, 'action'])->name('service');
    Route::get('/service/lainnya', [ServiceController::class, 'actionLainnya'])->name('service.lainnya');

    Route::get('/service/lainnya', [ServiceController::class, 'actionLainnya'])->name('service.lainnya');

    Route::resource('/layanan', MasterLayananController::class);

    Route::resource('/master/icdx', MasterIcdxController::class);

    Route::get('/grafik/diagnosa', [GrafikController::class, 'graphDiagnosis'])->name('grafik.diagnosa');
    Route::get('/grafik/layanan', [GrafikController::class, 'graphService'])->name('grafik.layanan');
    Route::get('/grafik/transaksi', [GrafikController::class, 'graphTransaction'])->name('grafik.transaksi');

    Route::resource('/profile', ProfileController::class);

    Route::resource('/surat/keterangan-dokter', MailDokterController::class);
    Route::resource('/surat/keterangan-sehat', MailSehatController::class);
    Route::resource('/surat/keterangan-buta-warna', MailButaWarnaController::class);


});

