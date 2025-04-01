<?php

namespace App\Http\Controllers\admin\gestionsProf;
use App\Models\Filiere;
use App\Models\Professeur;
use App\Models\FiliereProfesseur;
use App\Models\Etudiant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FiliereProfesseurController extends Controller
{
    public function showAttributionForm()
    {
        $profs = Professeur::with('user')->get();
        $filieres = Filiere::all();
        
        return view('admin.pages.prof.attribute_classe', compact('profs', 'filieres'));
    }

    /**
     * Vérifie si un professeur est déjà attribué à une filière
     */
    public function checkAttribution(Request $request)
    {
        $request->validate([
            'prof_id' => 'required|exists:professeurs,id',
            'filiere_id' => 'required|exists:filieres,id',
        ]);
        
        $prof = Professeur::with('user')->findOrFail($request->prof_id);
        $filiere = Filiere::findOrFail($request->filiere_id);
        $nombre_etudiants = Etudiant::where('filiere_id', $filiere->id)->count();
        
        // Vérifier si le professeur est déjà attribué à cette filière
        $attribution = FiliereProfesseur::where('prof_id', $prof->id)->where('filiere_id', $filiere->id)->first();
        
        return response()->json([
            'prof' => [
                'id' => $prof->id,
                'nom' => $prof->user->name,
                'specialite' => $prof->specialite ?? 'Non spécifiée'
            ],
            'filiere' => [
                'id' => $filiere->id,
                'nom' => $filiere->nom
            ],
            'nombre_etudiants' => $nombre_etudiants,
            'is_attributed' => $attribution ? true : false
        ]);
    }

    /**
     * Attribue un professeur à une filière
     */
    public function attributeClasse(Request $request)
    {
        $request->validate([
            'prof_id' => 'required|exists:professeurs,id',
            'filiere_id' => 'required|exists:filieres,id',
        ]);
        
        // Vérifier si le professeur est déjà attribué à cette filière
        $attribution = FiliereProfesseur::where('prof_id', $request->prof_id)->where('filiere_id', $request->filiere_id)->first();
        
        if (!$attribution) {
            // Créer une nouvelle attribution
            FiliereProfesseur::create([
                'prof_id' => $request->prof_id,
                'filiere_id' => $request->filiere_id
            ]);
            
            return redirect()->back()->with('toast', [
                'type' => 'success', 
                'message' => 'Le professeur a été attribué à la classe avec succès.'
            ]);
        }
        
        return redirect()->back()->with('toast', [
            'type' => 'info', 
            'message' => 'Le professeur est déjà attribué à cette classe.'
        ]);
    }

    /**
     * Retire un professeur d'une filière
     */
    public function removeAttribution(Request $request)
    {
        $request->validate([
            'prof_id' => 'required|exists:professeurs,id',
            'filiere_id' => 'required|exists:filieres,id',
        ]);
        
        // Supprimer l'attribution
        FiliereProfesseur::where('prof_id', $request->prof_id)
                         ->where('filiere_id', $request->filiere_id)
                         ->delete();
        
        return redirect()->back()->with('toast', [
            'type' => 'success', 
            'message' => 'Le professeur a été retiré de la classe avec succès.'
        ]);
    }
}
