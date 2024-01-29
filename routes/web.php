<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InspectionsController;
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
    Route::resource('/pemeriksaan', InspectionsController::class);

    Route::get('/pemeriksaan/{pemeriksaan}/create', [InspectionsController::class, 'create'])->name('pemeriksaan.create');
    Route::post('/pemeriksaan/{pemeriksaan}/create', [InspectionsController::class, 'store'])->name('pemeriksaan.store');
    

});

