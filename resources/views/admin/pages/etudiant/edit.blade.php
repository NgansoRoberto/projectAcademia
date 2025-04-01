@extends('tamplete.base')

@section('title')
{{'Modifier un étudiant'}}
@endsection

@section('contenu')
    <div class="content app-content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-12 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title font-weight-bolder float-left mb-0">{{ __('Modifier un étudiant') }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('ManagerEtudiant.index')}}">{{ __('Étudiants') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Modifier') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success')}}
                </div>
            @endif
            
            <div class="content-body">
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form" action="{{ route('ManagerEtudiant.update', $etudiant->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row col-8 mx-auto mt-3 mb-3">

                                            <div class="col-md-6 py-1">
                                                <label for="nom">Nom <span class="text-danger">*</span></label>
                                                <input type="text" placeholder="Entrez le nom" id="nom" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $etudiant->user->name) }}" required>
                                                @error('nom')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            
                                            <div class="col-md-6 py-1">
                                                <label for="email">Email <span class="text-danger">*</span></label>
                                                <input type="email" placeholder="exemple@email.com" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $etudiant->user->email) }}" required>
                                                @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                           <div class="col-md-6 py-1">
                                                <label for="filiere_id">Filière <span class="text-danger">*</span></label>
                                                <select id="filiere_id" name="filiere_id" class="form-control @error('filiere_id') is-invalid @enderror" required>
                                                    <option value="">Sélectionner une filière</option>
                                                    @foreach($filieres as $filiere)
                                                        <option value="{{ $filiere->id }}" {{ (old('filiere_id', $etudiant->filiere_id) == $filiere->id) ? 'selected' : '' }}>
                                                            {{ $filiere->nom }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('filiere_id')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 py-1">
                                                <label for="matricule">Matricule <span class="text-danger">*</span></label>
                                                <input type="text" placeholder="Entrez le matricule" id="matricule" name="matricule" class="form-control @error('matricule') is-invalid @enderror" value="{{ old('matricule', $etudiant->matricule_etudiant)}}" maxlength="10" required>
                                                <small class="text-muted" id="matricule-counter">0/10 caractères</small>
                                                @error('matricule')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            
                                           

                                              <div class="col-md-6 py-1">
                                                <label for="password">Mot de passe <span class="text-info">[Optionnel]</span></label>
                                                <div class="input-group input-group-merge form-password-toggle">
                                                    <input type="password" placeholder="Laisser vide pour ne pas modifier" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                    </div>
                                                </div>
                                                <small class="text-muted">Laisser vide pour conserver le mot de passe actuel</small>
                                                @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            
                                            <div class="col-md-6 py-1">
                                                <label for="groupe_id">Groupe <span class="text-info">[Optionnel]</span></label>
                                                <select id="groupe_id" name="groupe_id" class="form-control @error('groupe_id') is-invalid @enderror">
                                                    <option value="">Sélectionner un groupe</option>
                                                    @foreach($groupes as $groupe)
                                                        <option value="{{ $groupe->id }}" {{ (old('groupe_id', $etudiant->groupe_id) == $groupe->id) ? 'selected' : '' }}>
                                                            {{ $groupe->nom }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('groupe_id')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row col-12">
                                            <div class="d-none d-md-block text-center col-bg-5 col-lg-8 col-md-12 col-12 mx-auto">
                                                <a href="{{ route('ManagerEtudiant.index') }}" class="btn col-8 col-sm-7 col-lg-5 col-xl-3 col-md-4 btn-danger mt-1 mt-md-2 mr-md-4">
                                                    <i class="mr-1" data-feather='x'></i> Annuler
                                                </a>
                                                <button type="submit" class="btn col-8 col-sm-7 col-lg-5 col-xl-3 col-md-4 btn-success mt-1 mt-md-2">
                                                    <i class="mr-1" data-feather='download'></i> Enregistrer
                                                </button>
                                            </div>
                                            <div class="d-block d-md-none text-center col-bg-5 col-lg-8 col-md-12 col-12 mx-auto">
                                                <button type="submit" class="btn col-8 col-sm-7 col-lg-5 col-xl-3 col-md-4 btn-success mt-1 mt-md-2 mr-md-2">
                                                    <i class="mr-1" data-feather='download'></i> Enregistrer
                                                </button>
                                                <a href="{{ route('ManagerEtudiant.index') }}" class="btn col-8 col-sm-7 col-lg-5 col-xl-3 col-md-4 btn-danger mt-1 mt-md-2">
                                                    <i class="mr-1" data-feather='x'></i> Annuler
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        document.getElementById('add_etudiant').className += 'active';  
        // Gestion du compteur de caractères pour le matricule
        document.addEventListener('DOMContentLoaded', function() {
            const matriculeInput = document.getElementById('matricule');
            const matriculeCounter = document.getElementById('matricule-counter');
            
            // Initialiser le compteur au chargement
            updateCounter();
            
            matriculeInput.addEventListener('input', function() {
                if (this.value.length > 10) {
                    this.value = this.value.substring(0, 10);
                }         
                updateCounter();
            });
            
            function updateCounter() {
                const currentLength = matriculeInput.value.length;
                matriculeCounter.textContent = `${currentLength}/10 caractères`;
                
                // Réinitialiser toutes les classes de couleur
                matriculeCounter.classList.remove('text-warning', 'text-danger', 'text-success', 'text-muted');
                
                if (currentLength === 0) {
                    matriculeCounter.classList.add('text-muted');
                } else if (currentLength === 10) {
                    matriculeCounter.classList.add('text-success');
                } else {
                    matriculeCounter.classList.add('text-muted'); 
                }
                
                matriculeInput.value = matriculeInput.value.toUpperCase();
            }
        });

        @if(session()->has('toast'))
            toastr['{{ session('toast.type') }}']('{{ session('toast.message') }}', 'Notification', {
                closeButton: true,
                tapToDismiss: false,
                rtl: false
            });
        @endif
    </script>
@endsection