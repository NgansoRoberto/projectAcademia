<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\gestionsProf\FiliereProfesseurController;
use App\Http\Controllers\etudiant\Cours\EtudiantCourController;
use App\Http\Controllers\prof\seances\GestionSeancesController;

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


    //Route pour les professeurs
    Route::resource('ManagerCour', 'App\Http\Controllers\prof\GestionCours\CourController');
    Route::post('/Notification-etudiants-cours/{cours_id}', [App\Http\Controllers\NotificationController::class, 'NotifierEtudiants'])->name('NotifierCourEtudiants');
    Route::get('/seance/{id}', [GestionSeancesController::class, 'show'])->name('show-seance');
    Route::get('/seance-detail/{id}', [GestionSeancesController::class, 'detail'])->name('show-detail-seance');
    Route::post('/seances/{id}/demarrer', [GestionSeancesController::class, 'demarrerSeance'])->name('demarrer-seance');
    Route::post('/seances/{id}/terminer', [GestionSeancesController::class, 'terminerSeance'])->name('terminer-seance');

    Route::post('/seances/{seance}/ajouter-support', [GestionSeancesController::class, 'add_fichier'])->name('ajouter-support');
    // Route pour télécharger un support de cours
    Route::get('/supports/{support}/telecharger', [GestionSeancesController::class, 'download_fichier'])->name('telecharger-support');



    //Route pour les etudiants
    Route::get('/Cours-Etudiant', [EtudiantCourController::class, 'index'])->name('ListeCoursEtudiant');
    Route::get('/notifications-non-lues', [EtudiantCourController::class, 'NotificationNonLue'])->name('notifications-non-lues');
    Route::get('/list-notifications-etudiant', [EtudiantCourController::class, 'indexNotifications'])->name('etudiants.list-notification');
    Route::post('/change-staus', [EtudiantCourController::class, 'changeStatusNotification'])->name('etudiants.change-status');




});
