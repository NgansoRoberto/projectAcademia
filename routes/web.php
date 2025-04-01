<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\gestionsProf\FiliereProfesseurController;

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

Route::get('/Publication', [\App\Http\Controllers\Publication::class, 'showPublication'])->name('Publication');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('iug');
Route::get('/verify-email/{token}', [App\Http\Controllers\VerificationCompteController::class, 'verifyEmail'])
->name('verify.email');
    // Route pour la page de notification de vérification d'email
Route::get('/verification-email-sent', function () {
    return view('auth.verify-notice');
})->name('verification.notice');

// Routes protégées par l'authentification
Route::middleware(['auth', 'verified.email'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // route pour les admin
    Route::resource('ManagerProfessor', 'App\Http\Controllers\admin\gestionsProf\GestionProfController');
    Route::resource('ManagerEtudiant', 'App\Http\Controllers\admin\gestionsEtudiant\GestionEtudiantController');
    Route::get('/professeurs/attribute-filiere', [FiliereProfesseurController::class, 'showAttributionForm'])->name('FiliereProfesseur.showAttributionForm');
    Route::post('/professeurs/check-attribution', [FiliereProfesseurController::class, 'checkAttribution'])->name('FiliereProfesseur.checkAttribution');
    Route::post('/professeurs/attribute-classe', [FiliereProfesseurController::class, 'attributeClasse'])->name('FiliereProfesseur.attributeClasse');
    Route::delete('/professeurs/remove-attribution', [FiliereProfesseurController::class, 'removeAttribution'])->name('FiliereProfesseur.removeAttribution');
});