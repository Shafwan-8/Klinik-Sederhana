<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PatientController;

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

    // Route::get('/pengguna', [UsersController::class, 'index'])->name('user.index');
    // Route::get('/pengguna/tambah', [UsersController::class, 'create'])->name('user.create');
    // Route::post('/pengguna', [UsersController::class, 'store'])->name('user.store');
    // Route::get('/pengguna/{id}/edit', [UsersController::class, 'edit'])->name('user.edit');
    // Route::put('/pengguna/{id}', [UsersController::class, 'update'])->name('user.update');
    // Route::delete('/pengguna/{id}', [UsersController::class, 'destroy'])->name('user.destroy');

});

