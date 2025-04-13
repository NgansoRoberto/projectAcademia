<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Auth;
use App\Events\NouvelleNotificationEvent;
use App\Models\Cours;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function NotifierEtudiants(Request $request, $cours_id)
    {
        // Récupérer le cours avec sa filière
        $cours =  Cours::findOrFail($request->cours_id);
        // Récupérer les étudiants associés à la filière du cours
        $etudiants = Etudiant::where('filiere_id', $cours->filiere->id)->get();
        

        // Vérifier si des étudiants ont été trouvés
        if ($etudiants->isEmpty()) {
            return redirect()->back()->with('error', 'Aucun étudiant trouvé pour cette filière.');
        }

        // Notifier chaque étudiant
        foreach ($etudiants as $etudiant) {
            Notification::create([
                'message' => $request->message,
                'sujet' => $request->sujet,
                'date' => now(),
                'expediteur_id' => auth()->id(),
                'cours_id' => $request->cours_id,
                'filiere_id' => $cours->filiere_id,
                'user_id' => $etudiant->user_id,
                'statut' => 'envoyée',
            ]);
        }

        return redirect()->back()->with('success', 'Les étudiants ont été notifiés.');
    }
}
