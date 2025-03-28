<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class VerificationCompteController extends Controller
{
    public function verifyEmail($token)
    {
        Log::info(' voici le token $token: ' . $token);
        $user = User::where('email_verification_token', $token)->first();

        if (!$user) {
            return redirect()->route('/login')->with('error', 'Lien de vérification invalide.');
        }

        if ($user->email_verified_at) {
            return redirect()->route('login')->with('info', 'Email déjà vérifié.');
        }

        // Activer le compte
        $user->email_verified_at = now();
        $user->email_verification_token = NULL; // Invalider le token après utilisation
        $user->save();

        // Pour déboguer, vérifiez si la sauvegarde a réussi
        if (!$user->wasChanged('remember_token')) {
            Log::error('Impossible de mettre à jour le remember_token pour l\'utilisateur ID: ' . $user->id);
        }

        // Connexion automatique
        Auth::login($user);

        // Rediriger selon le rôle
        if ($user->type_compte === 'ETUDIANT') {
            return redirect('/home')->with('success', 'Compte activé !');
        } elseif ($user->type_compte === 'PROFESSEUR') {
            return redirect('/home')->with('success', 'Compte activé !');
        } else {
            return redirect('/home')->with('success', 'Compte activé !');
        }
    }
}
