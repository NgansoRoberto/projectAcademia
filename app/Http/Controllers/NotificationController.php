<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Auth;
use App\Events\NouvelleNotificationEvent;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function envoyerNotification(Request $request)
    {
        // Récupérer les étudiants liés à la filière du cours
        $etudiants = Etudiant::where('filiere_id', $request->filiere_id)->get();

        // Créer une notification pour chaque étudiant de la filière
        foreach ($etudiants as $etudiant) {
            $notification = Notification::create([
                'message' => $request->message,
                'user_id' => $etudiant->user_id, // Associer la notification à l’étudiant
                'date' => now(),
                'statut' => 'envoyée',
            ]);

            // Déclencher un événement pour mettre à jour en temps réel
            event(new NouvelleNotificationEvent($notification));
        }

        return response()->json(['message' => 'Notifications envoyées à toute la filière !']);
    }
}
