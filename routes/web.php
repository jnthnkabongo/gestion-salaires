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
    //CRUD EMPLOYER
    Route::get('liste-employer', [EmployersController::class, 'index'])->name('liste-employer'); //Liste employers
    Route::get('créer-employer', [EmployersController::class, 'create'])->name('afficher-employer'); //Afficher le formulaire employer
    Route::post('créer-employers', [EmployersController::class, 'store'])->name('créer-employer'); //Soumission du formulaire employer

    //FIN CRUD EMPLOYER

    //CURD DEPARTEMENT
    Route::get('liste-departement', [DepartementController::class, 'index'])->name('liste-departement'); //Liste departements
    Route::post('créer-departement', [DepartementController::class, 'create'])->name('créer-departement'); //Création département
    Route::get('afficher-departement', [DepartementController::class, 'show'])->name('afficher-departement'); // Afficher page de modification département
    Route::get('modifier-departement/{result}', [DepartementController::class, 'edit'])->name('modifier-departement'); //Modification département
    Route::get('modifiers-departement/{result}', [DepartementController::class, 'update'])->name('modifiers-departement'); //Modification département
    Route::get('supprimer-departement/{result}', [DepartementController::class, 'destroy'])->name('supprimer-departement'); //Suppression département
    //FIN CRUD DEPARTEMENT

    //CRUD SALAIRES
    Route::get('liste-salaires', [SalairesController::class, 'index'])->name('liste-salaire');
    //FIN CRUD SALAIRES
});
