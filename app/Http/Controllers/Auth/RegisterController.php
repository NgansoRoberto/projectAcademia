<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ProfessorID;
use App\Models\StudentID;
use App\Models\Etudiant;
use App\Models\Professeur;
use App\Models\Admin;
use App\Models\AdminCode;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/verification-email-sent';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered($request, $user)
    {
        // Déconnecte l'utilisateur après l'inscription
        $this->guard()->logout();

        // Redirige vers une page d'information sur la vérification d'email
        return redirect()->route('verification.notice')
            ->with('status', 'Un email de vérification a été envoyé à votre adresse. Veuillez vérifier votre boîte de réception.');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type_compte' => ['required', 'in:Etudiant,Professeur,Admin'],
            'terms' => ['required', 'accepted'],
        ];

        // Add conditional validation rules based on account type
        if (isset($data['type_compte'])) {
            if ($data['type_compte'] === 'Etudiant') {
                $rules['matricule_etudiant'] = ['required', 'string'];
                $rules['filiere_id'] = ['required', 'exists:filieres,id'];
                $rules['niveau_id'] = ['required', 'exists:niveaux_academiques,id'];
            } elseif ($data['type_compte'] === 'Professeur') {
                $rules['matricule_professeur'] = ['required', 'string'];
                $rules['specialite'] = ['required', 'string', 'max:255'];
            } elseif ($data['type_compte'] === 'Admin') {
                $rules['code_admin'] = ['required', 'string'];
            }
        }

        return Validator::make($data, $rules, [
            'terms.accepted' => 'Vous devez accepter les conditions d\'utilisation.',
            'matricule_etudiant.required' => 'Le matricule étudiant est obligatoire.',
            'matricule_professeur.required' => 'Le matricule professeur est obligatoire.',
            'code_admin.required' => 'Le code d\'administration est obligatoire.',
            'filiere_id.required' => 'Veuillez sélectionner une filière.',
            'niveau_id.required' => 'Veuillez sélectionner un niveau académique.',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Vérifier le type de compte et valider le matricule
        if ($data['type_compte'] === 'Etudiant') {
            $matricule = StudentID::where('matricule', $data['matricule_etudiant'])->where('utilise', false)->first();
        }
        elseif ($data['type_compte'] === 'Professeur') {
            $matricule = ProfessorID::where('matricule', $data['matricule_professeur'])->where('utilise', false)->first();
        }
        elseif ($data['type_compte'] === 'Administration') {
            $matricule = AdminCode::where('code_admin', $data['code_admin'])->where('utilise', false)->first();
        }
        else {
            $matricule = null;
        }

        if (!$matricule) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'matricule' => ['Matricule invalide ou déjà utilisé.'],
            ]);
        }
           // Créer l'utilisateur mais ne pas l'activer encore
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type_compte' => $data['type_compte'],
            'matricule' => $data['matricule_etudiant'] ?? $data['matricule_professeur'],
            'remember_token' => Str::random(64), // Génère un token pour l'activation
        ]);
        $token = $user->remember_token;
        // Associer l'utilisateur à sa table spécifique
        if ($data['type_compte'] === 'etudiant') {
            Etudiant::create([
                'user_id' => $user->id,
                'matricule' => $data['matricule_etudiant'],
                'filiere_id' => $data['filiere_id'],
                'niveau_id' => $data['niveau_id'],
            ]);
        } elseif ($data['type_compte'] === 'professeur') {
            Professeur::create([
                'user_id' => $user->id,
                'matricule' => $data['matricule_professeur'],
                'specialite' => $data['specialite'],
            ]);
        } elseif ($data['type_compte'] === 'admin') {
            Admin::create([
                'user_id' => $user->id,
            ]);
        }
        // Marquer le matricule comme utilisé
        $matricule->update(['utilise' => true]);

        Mail::to($user->email)->send(new VerifyEmail($user, $token));

        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
        return $user; // Retourner l'utilisateur cré
    }
}
