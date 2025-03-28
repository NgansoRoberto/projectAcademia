<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/Publication', [\App\Http\Controllers\Publication::class, 'showPublication'])->name('Publication');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('iug');
Route::get('/verify-email/{token}', [App\Http\Controllers\VerificationCompteController::class, 'verifyEmail'])
->name('verify.email');
    // Route pour la page de notification de vérification d'email
Route::get('/verification-email-sent', function () {
    return view('auth.verify-notice');
})->name('verification.notice');

// Routes protégées par l'authentification
Route::middleware(['auth', 'verified.email'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Vous pouvez ajouter d'autres routes protégées ici
    // Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    // Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
});