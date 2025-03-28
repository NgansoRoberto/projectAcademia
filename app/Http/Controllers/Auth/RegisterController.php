<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Rule;
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
use Illuminate\Support\Facades\Log;
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
            'type_compte' => ['required', 'string', 'in:ETUDIANT,PROFESSEUR,ADMIN'],
        ];

        if (isset($data['type_compte'])) {
            if ($data['type_compte'] === 'ETUDIANT') {
                $rules['matricule_etudiant'] = ['required', 'string', 'exists:matricules_etudiant,matricule,utilise,0'];
                $rules['filiere_id'] = ['required', 'integer', 'exists:filieres,id'];
            } elseif ($data['type_compte'] === 'PROFESSEUR') {
                $rules['matricule_professeur'] = ['required', 'string', 'exists:matricules_professeur,matricule,utilise,0'];
            } elseif ($data['type_compte'] === 'ADMIN') {
                $rules['code_admin'] = ['required', 'string', 'exists:code_admin,code,utilise,0'];
            }
        }

        $messages = [
            'name.required' => 'Le nom est obligatoire.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email n\'est pas valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'type_compte.required' => 'Le type de compte est obligatoire.',
            'type_compte.in' => 'Le type de compte sélectionné n\'est pas valide.',
            'matricule_etudiant.exists' => 'Le matricule étudiant n\'est pas valide ou est déjà utilisé.',
            'matricule_professeur.exists' => 'Le matricule professeur n\'est pas valide ou est déjà utilisé.',
            'code_admin.exists' => 'Le code administrateur n\'est pas valide ou est déjà utilisé.',
            'filiere_id.exists' => 'La filière sélectionnée n\'existe pas.',
        ];

        return Validator::make($data, $rules, $messages);
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
        if ($data['type_compte'] === 'ETUDIANT') {
            $matricule = StudentID::where('matricule', $data['matricule_etudiant'])->where('utilise', false)->first();
        }
        elseif ($data['type_compte'] === 'PROFESSEUR') {
            $matricule = ProfessorID::where('matricule', $data['matricule_professeur'])->where('utilise', false)->first();
        }
        elseif ($data['type_compte'] === 'ADMIN') {
            $matricule = AdminCode::where('code', $data['code_admin'])->where('utilise', false)->first();
        }
        else {
            $matricule = null;
        }

        if (!$matricule) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'matricule' => ['Matricule invalide ou déjà utilisé.'],
            ]);
        }


            // Génération d'un token de vérification plus robuste
            $verificationToken = hash_hmac('sha256', Str::random(40), config('app.key'));

           // Créer l'utilisateur mais ne pas l'activer encore
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => $data['type_compte'],
                'email_verification_token' =>  $verificationToken, // Génère un token pour l'activation
            ]);




            // Associer l'utilisateur à sa table spécifique
        if ($data['type_compte'] === 'ETUDIANT') {
            Etudiant::create([
                'user_id' => $user->id,
                'matricule_etudiant' => $data['matricule_etudiant'],
                'filiere_id' => $data['filiere_id'],
            ]);
        } elseif ($data['type_compte'] === 'PROFESSEUR') {
            Professeur::create([
                'user_id' => $user->id,
                'matricule' => $data['matricule_professeur'],
            ]);
        } elseif ($data['type_compte'] === 'ADMIN') {
            Admin::create([
                'user_id' => $user->id,
            ]);
        }
        // Marquer le matricule comme utilisé
        $matricule->update(['utilise' => true]);

        Mail::to($user->email)->send(new VerifyEmail($user, $verificationToken));

      
        return $user; // Retourner l'utilisateur cré
    }
}
