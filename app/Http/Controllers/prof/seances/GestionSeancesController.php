<?php

namespace App\Http\Controllers\prof\seances;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeanceCour;
use App\Models\Etudiant;
use App\Models\Fichier;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class GestionSeancesController extends Controller
{
    public function show($id)
    {
        $seance = SeanceCour::findOrFail($id);
        $cour = $seance->cours->filiere_id;
        $etudiants = Etudiant::where('filiere_id', $cour)->get();
        return view('prof.pages.seances.gestion', compact('seance', 'etudiants'));
    }
    public function detail($id)
    {
        $seance = SeanceCour::findOrFail($id);
        $cour = $seance->cours->filiere_id;
        $etudiants = Etudiant::where('filiere_id', $cour)->get();
        return view('prof.pages.seances.index', compact('seance', 'etudiants'));
    }
    public function demarrerSeance(Request $request, $id)
    {
        try {
            $seance = SeanceCour::findOrFail($id);

            // Mettre à jour le statut de la séance
            $seance->statut = 'en cours';
            $seance->heure_debut = Carbon::now()->format('H:i:s');
            $seance->save();

            return response()->json([
                'success' => true,
                'message' => 'La séance a été démarrée avec succès.',
                'seance' => $seance
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors du démarrage de la séance.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function add_fichier(Request $request, SeanceCour $seance)
    {

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'fichier' => 'required|file|max:10240',
        ]);

        $path = $request->file('fichier')->store('supports_cours', 'public');

        $support = new Fichier();
        $support->titre = $request->titre;
        $support->description = $request->description;
        $support->chemin_fichier = $path;
        $support->taille = $request->file('fichier')->getSize();
        $support->cours_id = $seance->cours_id;
        $support->seance_id = $seance->id;
        $support->save();

        // Redirection avec message de succès
        return redirect()->back()->with('toast', [
            'type' => 'success',
            'message' => 'Le support de cours a été ajouté avec succès.'
        ]);
    }

    public function download_fichier(Fichier $support)
    {
        if (!Storage::disk('public')->exists($support->chemin_fichier)) {
            return redirect()->back()->with('toast', [
                'type' => 'error',
                'message' => 'Le fichier demandé n\'existe pas.'
            ]);
        }

        return Storage::disk('public')->download($support->chemin_fichier, $support->titre);
    }
}
