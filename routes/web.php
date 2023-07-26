<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\DashboardControler;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmployersController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\SalairesController;
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


Route::get('/', [authController::class, 'index'])->name('index');
Route::post('/', [authController::class, 'create'])->name('soumettre');
Route::get('gestion-app', [homeController::class, 'index'])->name('redirect');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardControler::class, 'index'])->name('dashboard');
    Route::get('liste-employer', [EmployersController::class, 'index'])->name('liste-employer');
    Route::get('liste-departement', [DepartementController::class, 'index'])->name('liste-departement');
    Route::get('liste-salaires', [SalairesController::class, 'index'])->name('liste-salaire');
});
