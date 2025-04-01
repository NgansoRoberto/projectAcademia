<?php

namespace App\Http\Controllers\admin\gestionsProf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Professeur;
use App\Models\MatriculeProfesseur;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GestionProfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $query = Professeur::with('user')->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('matricule', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                    });
            });
        });
        $professeurs = $query->orderBy('created_at', 'desc')->paginate(5); 
        if ($search) {
            $professeurs->appends(['search' => $search]);
        }
        
        return view('admin.pages.prof.index', compact('professeurs', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.prof.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'matricule' => 'required|string|max:9|unique:professeurs',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
           
            DB::beginTransaction();

            // Créer un nouvel utilisateur
            $user = new User();
            $user->name = $request->nom;
            $user->email = $request->email;
            $user->password = Hash::make($request->password); 
            $user->role = 'PROFESSEUR';
            $user->email_verified_at = now();	
            $user->save();

            // Créer un nouveau professeur
            $professeur = new Professeur();
            $professeur->user_id = $user->id;
            $professeur->matricule = 'IugProf-' . strtoupper($request->matricule);
            $professeur->save();

            // Vérifier 
            $matriculeExist = MatriculeProfesseur::where('matricule', strtoupper($request->matricule))->first();
            
            if ($matriculeExist) {
                $matriculeExist->utilise = 1;
                $matriculeExist->save();
            } else {
                $matricule = new MatriculeProfesseur();
                $matricule->matricule = 'IugProf-' . strtoupper($request->matricule);
                $matricule->utilise = 1;
                $matricule->save();
            }

            DB::commit();

            return redirect()->route('ManagerProfessor.index')->with('toast', ['type' => 'success', 'message' => 'Professeur créé avec succès!']);
        } catch (\Exception $e) {
            // Annuler la transaction en cas d'erreur
            DB::rollBack();
            
            return redirect()->back()->with('toast', ['type' => 'error', 'message' => 'Une erreur est survenue: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $professeur = Professeur::with('user')->findOrFail($id);
        return view('admin.pages.prof.edit', compact('professeur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $professeur = Professeur::with('user')->findOrFail($id);
        
        // Validation des données
        $validationRules = [
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $professeur->user->id,
        ];
        
        
        if ($request->matricule != str_replace('IugProf-', '', $professeur->matricule)) {
            $validationRules['matricule'] = 'required|string|max:9|unique:professeurs,matricule,' . $professeur->id;
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

            
            $user = $professeur->user;
            $user->name = $request->nom;
            $user->email = $request->email;
            
           
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            
            $user->save();

            
            if ($request->matricule != str_replace('IugProf-', '', $professeur->matricule)) {
                $oldMatricule = $professeur->matricule;
                $newMatricule = 'IugProf-' . strtoupper($request->matricule);
                
                
                $professeur->matricule = $newMatricule;
                
                
                $matriculeExist = MatriculeProfesseur::where('matricule', $newMatricule)->first();
                
                if ($matriculeExist) {
                    $matriculeExist->utilise = 1;
                    $matriculeExist->save();
                } else {
                    $matricule = new MatriculeProfesseur();
                    $matricule->matricule = $newMatricule;
                    $matricule->utilise = 1;
                    $matricule->save();
                }
                
                
                $oldMatriculeRecord = MatriculeProfesseur::where('matricule', $oldMatricule)->first();
                if ($oldMatriculeRecord) {
                    $oldMatriculeRecord->utilise = 0;
                    $oldMatriculeRecord->save();
                }
            }
            
            $professeur->save();

            DB::commit();

            return redirect()->route('ManagerProfessor.index')->with('toast', ['type' => 'success', 'message' => 'Professeur mis à jour avec succès!']);
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
        //
    }
}
