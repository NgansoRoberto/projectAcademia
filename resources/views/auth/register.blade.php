@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-white text-center py-4 border-bottom-0">
                    <img src="{{asset('app-assets/images/logo/iug.png')}}" alt="IUG Logo" class="mb-3" style="height: 80px;">
                    <h4 class="fw-bold text-success">{{ __('Inscription') }}</h4>
                    <p class="text-muted">Créez votre compte pour accéder à la plateforme</p>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label fw-medium">{{ __('Nom complet') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-user text-muted"></i></span>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Entrez votre nom complet">
                            </div>
                            @error('name')
                                <span class="invalid-feedback d-block mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-medium">{{ __('Adresse Email') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-envelope text-muted"></i></span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="exemple@email.com">
                            </div>
                            @error('email')
                                <span class="invalid-feedback d-block mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-medium">{{ __('Mot de passe') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-lock text-muted"></i></span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Minimum 8 caractères">
                            </div>
                            @error('password')
                                <span class="invalid-feedback d-block mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label fw-medium">{{ __('Confirmer le mot de passe') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-lock text-muted"></i></span>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Répétez votre mot de passe">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="type_compte" class="form-label fw-medium">{{ __('Type de Compte') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-user-tag text-muted"></i></span>
                                <select id="type_compte" name="type_compte" class="form-select @error('type_compte') is-invalid @enderror" required>
                                    <option value="" selected disabled>Sélectionnez votre profil</option>
                                    <option value="Etudiant" {{ old('type_compte') == 'Etudiant' ? 'selected' : '' }}>Étudiant</option>
                                    <option value="Professeur" {{ old('type_compte') == 'Professeur' ? 'selected' : '' }}>Professeur</option>
                                    <option value="Admin" {{ old('type_compte') == 'Admin' ? 'selected' : '' }}>Administration</option>
                                </select>
                            </div>
                            @error('type_compte')
                                <span class="invalid-feedback d-block mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Champs conditionnels pour Étudiant -->
                        <div id="champs-etudiant" class="conditional-fields" style="display:none;">
                            <div class="mb-4">
                                <label for="matricule_etudiant" class="form-label fw-medium">{{ __('Matricule Étudiant') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-id-card text-muted"></i></span>
                                    <input id="matricule_etudiant" type="text" class="form-control @error('matricule_etudiant') is-invalid @enderror" name="matricule_etudiant" value="{{ old('matricule_etudiant') }}" placeholder="Entrez votre matricule">
                                </div>
                                @error('matricule_etudiant')
                                    <span class="invalid-feedback d-block mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="filiere_id" class="form-label fw-medium">{{ __('Filière') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-graduation-cap text-muted"></i></span>
                                    <select id="filiere_id" name="filiere_id" class="form-select @error('filiere_id') is-invalid @enderror">
                                        <option value="" selected disabled>Sélectionnez votre filière</option>
                                        @foreach ($filieres as $filiere)
                                            <option value="{{ $filiere->id }}" {{ old('filiere_id') == $filiere->id ? 'selected' : '' }}>{{ $filiere->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('filiere_id')
                                    <span class="invalid-feedback d-block mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Champs conditionnels pour Professeur -->
                        <div id="champs-professeur" class="conditional-fields" style="display:none;">
                            <div class="mb-4">
                                <label for="matricule_professeur" class="form-label fw-medium">{{ __('Matricule Professeur') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-chalkboard-teacher text-muted"></i></span>
                                    <input id="matricule_professeur" type="text" class="form-control @error('matricule_professeur') is-invalid @enderror" name="matricule_professeur" value="{{ old('matricule_professeur') }}" placeholder="Entrez votre matricule">
                                </div>
                                @error('matricule_professeur')
                                    <span class="invalid-feedback d-block mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>

                        <!-- Champs conditionnels pour Admin -->
                        <div id="champs-admin" class="conditional-fields" style="display:none;">
                            <div class="mb-4">
                                <label for="code_admin" class="form-label fw-medium">{{ __('Code d\'Administration') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-key text-muted"></i></span>
                                    <input id="code_admin" type="text" class="form-control @error('code_admin') is-invalid @enderror" name="code_admin" value="{{ old('code_admin') }}" placeholder="Entrez le code d'administration">
                                </div>
                                @error('code_admin')
                                    <span class="invalid-feedback d-block mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                                <label class="form-check-label" for="terms">
                                    J'accepte les <a href="#" class="text-success">conditions d'utilisation</a> et la <a href="#" class="text-success">politique de confidentialité</a>
                                </label>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success py-2">
                                <i class="fas fa-user-plus me-2"></i>{{ __('Créer mon compte') }}
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer bg-white text-center py-3 border-top-0">
                    <p class="mb-0">Vous avez déjà un compte? <a href="{{ route('login') }}" class="text-success fw-medium">Se connecter</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const typeCompteSelect = document.getElementById('type_compte');
        const champsEtudiant = document.getElementById('champs-etudiant');
        const champsProfesseur = document.getElementById('champs-professeur');
        const champsAdmin = document.getElementById('champs-admin');

        // Fonction pour afficher/masquer les champs conditionnels
        function toggleConditionalFields() {
            // Masquer tous les champs conditionnels
            champsEtudiant.style.display = 'none';
            champsProfesseur.style.display = 'none';
            champsAdmin.style.display = 'none';

            // Afficher les champs correspondants
            const selectedValue = typeCompteSelect.value;
            if (selectedValue === 'Etudiant') {
                champsEtudiant.style.display = 'block';
            } else if (selectedValue === 'Professeur') {
                champsProfesseur.style.display = 'block';
            } else if (selectedValue === 'Admin') {
                champsAdmin.style.display = 'block';
            }
        }

        // Appliquer au chargement (pour conserver les valeurs après validation)
        toggleConditionalFields();

        // Écouter les changements
        typeCompteSelect.addEventListener('change', toggleConditionalFields);
    });
</script>
@endsection
@endsection
