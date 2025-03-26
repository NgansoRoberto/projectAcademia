<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function verifyEmail($token)
    {
        $user = User::where('remember_token', $token)->first();

        if (!$user) {
            return redirect('/login')->with('error', 'Lien invalide ou expiré.');
        }

        // Activer le compte
        $user->email_verified_at = now();
        $user->remember_token = null;
        $user->save();

        // Connexion automatique
        Auth::login($user);

        // Rediriger selon le rôle
        if ($user->type_compte === 'Etudiant') {
            return redirect('/dashboard/etudiant')->with('success', 'Compte activé !');
        } elseif ($user->type_compte === 'Professeur') {
            return redirect('/dashboard/professeur')->with('success', 'Compte activé !');
        } else {
            return redirect('/dashboard/admin')->with('success', 'Compte activé !');
        }
    }
}
