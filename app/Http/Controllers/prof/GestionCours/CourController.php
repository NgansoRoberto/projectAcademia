<?php

namespace App\Http\Controllers\prof\GestionCours;

use App\Http\Controllers\Controller;
use App\Models\Cours;
use App\Models\Filiere;
use App\Models\Professeur;
use App\Models\SeanceCour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professeur = Professeur::where('user_id', Auth::user()->id)->first();
        $cours = Cours::where('professeur_id', $professeur->id)->with(['filiere', 'seances'])->orderBy('date_creation', 'desc')->get();

        return view('prof.pages.cours.index', compact('cours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filieres = Filiere::all();
        return view('prof.pages.cours.create', compact('filieres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $titre = $request->input('titre');
        $filiere_id = $request->input('filiere_id');
        $description = $request->input('description');

        $nombreSeances = $request->input('nombre_seances');
        $dureeSeance = $request->input('duree_seance');
        $frequence = $request->input('frequence');
        $jourSemaine = $request->input('jour_semaine');
        $heureDebut = $request->input('heure_debut');
        $dateDebut = $request->input('date_debut');

        $professeur = Professeur::where('user_id', Auth::user()->id)->first();

        $cour = new Cours();
        $cour->titre = $titre;
        $cour->description = $description;
        $cour->date_creation = now();
        $cour->professeur_id = $professeur->id;
        $cour->filiere_id = $filiere_id;
        $cour->nombres_seances = $nombreSeances;
        $cour->save();

        $coursId = $cour->id;

        $seances = SeanceCour::genererSeances(
            coursId: $coursId,
            nombreSeances: $nombreSeances,
            frequence: $frequence,
            dateDebut:  $dateDebut,
            jourSemaine: $jourSemaine,
            heureDebut: $heureDebut,
            dureeSeance: $dureeSeance
        );
        foreach ($seances as $seance) {
            SeanceCour::create($seance);
        }


        return redirect()->route('ManagerCour.index')->with('toast', ['type' => 'success', 'message' => 'Cour créé avec succès!']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $professeur = Professeur::where('user_id', Auth::user()->id)->first();
        $cours = Cours::where('id', $id)->where('professeur_id', $professeur->id)->with(['filiere', 'seances' => function($query) {
                          $query->orderBy('date_seance', 'asc')->orderBy('heure_debut', 'asc');
                      }])->firstOrFail();

        // Regrouper les séances par mois pour un affichage organisé
        $seancesParMois = $cours->seances->groupBy(function($seance) {
            return \Carbon\Carbon::parse($seance->date_seance)->format('F Y');
        });

        // Calculer les statistiques des séances
        $seancesPassees = $cours->seances->where('date_seance', '<', date('Y-m-d'))->count();
        $seancesAVenir = $cours->seances->where('date_seance', '>=', date('Y-m-d'))->count();

        return view('prof.pages.cours.show', compact('cours', 'seancesParMois', 'seancesPassees', 'seancesAVenir'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
