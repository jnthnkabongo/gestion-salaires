<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\authController;
use App\Http\Controllers\configurationController;
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

//ROUTES DE SESSION

Route::get('/', [authController::class, 'index'])->name('index'); //Page d'accueil
Route::post('/', [authController::class, 'create'])->name('soumettre'); //Soumission du formulaire
Route::get('gestion-app', [homeController::class, 'index'])->name('redirect'); //Route de redirection
Route::get('logout', [authController::class, 'destroy'])->name('logout'); //Deconnexion

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardControler::class, 'index'])->name('dashboard');
    //CRUD EMPLOYER
    Route::get('liste-employer', [EmployersController::class, 'index'])->name('liste-employer'); //Liste employers
    Route::get('afficher-employer', [EmployersController::class, 'store'])->name('afficher-employer'); //Afficher le formulaire employer
    Route::post('créer-employer', [EmployersController::class, 'create'])->name('créer-employer'); //Soumission du formulaire employer
    Route::post('creation', [EmployersController::class, 'creation'])->name('creation');
    Route::get('afficher-employers/{resultat}', [EmployersController::class, 'show'])->name('afficher-employers'); //Soumission du formulaire employer
    Route::get('modifier-employer/{resultat}', [EmployersController::class, 'edit'])->name('modifier-employer');
    Route::get('supprimer-employers/{resultat}',[EmployersController::class, 'destroy'])->name('supprimer-employers'); //Suppression de l'emploter

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
    Route::get('liste-salaires', [SalairesController::class, 'index'])->name('liste-salaire'); //Liste des salaires
    Route::get('initialiser-paiement', [SalairesController::class, 'store'])->name('initialiser-paiement'); //Initialiser le paiement
    Route::get('telecharger-pdf/{salaire}', [SalairesController::class, 'create'])->name('telecharger-pdf'); //Telechargement des pdf
    //FIN CRUD SALAIRES

    //CONFIGURATION
    Route::get('configuration-liste', [configurationController::class, 'index'])->name('liste-configuration');
    Route::get('afficher-configuration', [configurationController::class, 'store'])->name('afficher-configuration');
    Route::post('créer-configuration', [configurationController::class, 'create'])->name('créer-configuration');
    Route::get('supprimer-configuration/{config}', [configurationController::class, 'destroy'])->name('supprimer-configuration');
    //FIN CONFIGURATION

    //AMINSITRATEURS

    Route::prefix('administrateur')->group(function(){
        Route::get('dashboard-user', [DashboardControler::class, 'create' ])->name('dashboard-user');
        Route::get('liste', [adminController::class, 'index'])->name('liste-administrateur');
        Route::get('liste-user', [adminController::class, 'store'])->name('liste-employer-user');
        Route::get('créer', [adminController::class, 'store'])->name('admin-create');
        Route::post('créer', [adminController::class, 'create'])->name('creer-administrateur');
        Route::get('afficher/{admin}', [adminController::class, 'show'])->name('afficher-administrateurs');
        Route::get('modifier/{admin}', [adminController::class, 'update'])->name('admin-indupdateex');
        Route::get('supprimer/{admin}', [adminController::class, 'destroy'])->name('supprimer-administrateurs');

    });
});
