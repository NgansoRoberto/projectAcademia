<?php

namespace App\Http\Controllers\admin\gestionsEtudiant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\Groupe;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GestionEtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $query = Etudiant::with(['user', 'filiere', 'groupe'])->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('matricule_etudiant', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                    })
                    ->orWhereHas('filiere', function ($q) use ($search) {
                        $q->where('nom', 'like', "%{$search}%");
                    })
                    ->orWhereHas('groupe', function ($q) use ($search) {
                        $q->where('nom', 'like', "%{$search}%");
                    });
            });
        });
        $etudiants = $query->orderBy('created_at', 'desc')->paginate(5); 
        if ($search) {
            $etudiants->appends(['search' => $search]);
        }
        
        return view('admin.pages.etudiant.index', compact('etudiants', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filieres = Filiere::all();
        $groupes = Groupe::all();
        return view('admin.pages.etudiant.create', compact('filieres', 'groupes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'matricule' => 'required|string|max:10|unique:etudiants,matricule_etudiant',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'filiere_id' => 'required|exists:filieres,id',
            'groupe_id' => 'exists:groupes,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
           
            DB::beginTransaction();

            
            $user = new User();
            $user->name = $request->nom;
            $user->email = $request->email;
            $user->password = Hash::make($request->password); 
            $user->role = 'ETUDIANT';
            $user->email_verified_at = now();	
            $user->save();

            
            $etudiant = new Etudiant();
            $etudiant->user_id = $user->id;
            $etudiant->matricule_etudiant = strtoupper($request->matricule);
            $etudiant->filiere_id = $request->filiere_id;
            $etudiant->groupe_id = $request->groupe_id;
            $etudiant->save();

            DB::commit();

            return redirect()->route('ManagerEtudiant.index')->with('toast', ['type' => 'success', 'message' => 'Étudiant créé avec succès!']);
        } catch (\Exception $e) {
            
            DB::rollBack();
            
            return redirect()->back()->with('toast', ['type' => 'error', 'message' => 'Une erreur est survenue: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $etudiant = Etudiant::with(['user', 'filiere', 'groupe'])->findOrFail($id);
        return view('admin.pages.etudiant.show', compact('etudiant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $etudiant = Etudiant::with(['user', 'filiere', 'groupe'])->findOrFail($id);
        $filieres = Filiere::all();
        $groupes = Groupe::all();
        return view('admin.pages.etudiant.edit', compact('etudiant', 'filieres', 'groupes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $etudiant = Etudiant::with('user')->findOrFail($id);
        
        
        $validationRules = [
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $etudiant->user->id,
            'filiere_id' => 'required|exists:filieres,id',
            'groupe_id' => 'exists:groupes,id',
        ];
        
      
        if ($request->matricule != $etudiant->matricule_etudiant) {
            $validationRules['matricule'] = 'required|string|max:10|unique:etudiants,matricule_etudiant,' . $etudiant->id;
        }
        
        
        if ($request->filled('password')) {
            $validationRules['password'] = 'string|min:8';
        }
        
        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            
            $user = $etudiant->user;
            $user->name = $request->nom;
            $user->email = $request->email;
            
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            
            $user->save();

            // Mettre à jour l'étudiant
            if ($request->matricule != $etudiant->matricule_etudiant) {
                $etudiant->matricule_etudiant = strtoupper($request->matricule);
            }
            
            $etudiant->filiere_id = $request->filiere_id;
            $etudiant->groupe_id = $request->groupe_id;
            $etudiant->save();

            DB::commit();

            return redirect()->route('ManagerEtudiant.index')->with('toast', ['type' => 'success', 'message' => 'Étudiant mis à jour avec succès!']);
        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()->back()->with('toast', ['type' => 'error', 'message' => 'Une erreur est survenue: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
    }
}