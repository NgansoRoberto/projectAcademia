@extends('tamplete.base')

@section('title')
    {{'Attribuer un professeur à une filière'}}
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
                            <h2 class="content-header-title font-weight-bolder  float-left mb-0">{{ __('Attribuer un professeur') }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ __('Accueil') }}</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('ManagerProfessor.index')}}">{{ __('Professeurs') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Attribuer à une classe') }}</li>
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
                                <div class="card-header">
                                    <span class="card-title">Vérifier la Disponibilité</span>
                                </div>
                                <div class="card-body">
                                    <form id="verification-form" class="form" action="{{ route('FiliereProfesseur.checkAttribution') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="filiere_id">Filière <span class="text-danger">*</span></label>
                                                    <select id="filiere_id" name="filiere_id" class="select2 form-control @error('filiere_id') is-invalid @enderror" required>
                                                        <option value="">Sélectionner une filière</option>
                                                        @foreach($filieres as $filiere)
                                                            <option value="{{ $filiere->id }}" {{ old('filiere_id') == $filiere->id ? 'selected' : '' }}>
                                                                {{ $filiere->nom }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('filiere_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="prof_id">Professeur <span class="text-danger">*</span></label>
                                                    <select id="prof_id" name="prof_id" class="select2 form-control @error('prof_id') is-invalid @enderror" required>
                                                        <option value="">Sélectionner un professeur</option>
                                                        @foreach($profs as $prof)
                                                            <option value="{{ $prof->id }}" {{ old('prof_id') == $prof->id ? 'selected' : '' }}>
                                                                {{ $prof->user->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('prof_id')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2 d-flex align-items-end">
                                                <button type="submit" id="check-btn" class="btn text-white" style="background:#d87e46;">
                                                    <i data-feather="check" class="mr-50 text-white"></i>
                                                    Vérifier
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <!-- Spinner de chargement -->
                            <div class="spinner-container text-center my-2" id="loading-spinner" style="display: none;">
                                <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                                    <span class="sr-only">Chargement...</span>
                                </div>
                                <p class="mt-2 text-primary font-weight-bold">Vérification en cours...</p>
                            </div>
                            
                            <!-- Résultat de la vérification -->
                            <div id="result-container" class="mt-2" style="display: none;">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Résultat de la vérification</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="attribution-status" class="mb-2"></div>
                                        
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-md-6 mb-2">
                                                    <div class="card shadow-lg border-0" style="border-left: 4px solid #7367f0 !important;">
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-center mb-2">
                                                                <div class="avatar bg-light-primary p-50 mr-2">
                                                                    <div class="avatar-content">
                                                                        <i data-feather="book" class="font-medium-4"></i>
                                                                    </div>
                                                                </div>
                                                                <h5 class="card-title font-weight-bolder mb-0">Informations sur la filière</h5>
                                                            </div>
                                                            <div class="pl-1 mt-3">
                                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                                    <p class="mb-0 font-weight-bold text-primary">Nom de la filière:</p>
                                                                    <h6 id="filiere-nom" class="mb-0 font-weight-bolder"></h6>
                                                                </div>
                                                                <div class="divider my-1"></div>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <p class="mb-0 font-weight-bold text-primary">Nombre d'étudiants:</p>
                                                                    <h6 class="mb-0">
                                                                        <span id="nombre-etudiants" class="badge badge-pill badge-light-primary font-weight-bold" style="font-size: 0.9rem;"></span>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 mb-2">
                                                    <div class="card shadow-lg border-0" style="border-left: 4px solid #00cfe8 !important;">
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-center mb-2">
                                                                <div class="avatar bg-light-info p-50 mr-2">
                                                                    <div class="avatar-content">
                                                                        <i data-feather="user" class="font-medium-4"></i>
                                                                    </div>
                                                                </div>
                                                                <h5 class="card-title font-weight-bolder mb-0">Informations sur le professeur</h5>
                                                            </div>
                                                            <div class="pl-1 mt-3">
                                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                                    <p class="mb-0 font-weight-bold text-info">Nom du professeur:</p>
                                                                    <h6 id="prof-nom" class="mb-0 font-weight-bolder"></h6>
                                                                </div>
                                                                <div class="divider my-1"></div>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <p class="mb-0 font-weight-bold text-info">Spécialité:</p>
                                                                    <h6 class="mb-0">
                                                                        <span id="prof-specialite" class="badge badge-pill badge-light-info font-weight-bold" style="font-size: 0.9rem;"></span>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div id="attribution-actions" class="mt-2" style="display: none;">
                                            <form id="attribution-form" action="{{ route('FiliereProfesseur.attributeClasse') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="filiere_id" id="hidden-filiere-id">
                                                <input type="hidden" name="prof_id" id="hidden-prof-id">
                                                
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-success">
                                                        <i data-feather="link" class="mr-50"></i>
                                                        Attribuer le professeur à cette classe
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                        <div id="remove-attribution-actions" class="mt-2" style="display: none;">
                                            <form id="remove-attribution-form" action="{{ route('FiliereProfesseur.removeAttribution') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="filiere_id" id="remove-filiere-id">
                                                <input type="hidden" name="prof_id" id="remove-prof-id">
                                                
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-danger">
                                                        <i data-feather="x" class="mr-50"></i>
                                                        Retirer le professeur de cette filière
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
    <script type="text/javascript">
    
         const activeMenu = document.getElementById('associer_prof');
           
        document.addEventListener('DOMContentLoaded', function() {

             if (activeMenu) {
                activeMenu.className += ' active';
            } else {
                console.log("erreur de chargement de l'élément associerProfElement");
            }
        
            const verificationForm = document.getElementById('verification-form');
            const resultContainer = document.getElementById('result-container');
            const loadingSpinner = document.getElementById('loading-spinner');
            const attributionStatus = document.getElementById('attribution-status');
            const attributionActions = document.getElementById('attribution-actions');
            const removeAttributionActions = document.getElementById('remove-attribution-actions');
         
            const filiereNom = document.getElementById('filiere-nom');
            const nombreEtudiants = document.getElementById('nombre-etudiants');
            const profNom = document.getElementById('prof-nom');
            const profSpecialite = document.getElementById('prof-specialite');
            
            
            const hiddenFiliereId = document.getElementById('hidden-filiere-id');
            const hiddenProfId = document.getElementById('hidden-prof-id');
            const removeFiliereId = document.getElementById('remove-filiere-id');
            const removeProfId = document.getElementById('remove-prof-id');
            
            $(verificationForm).on('submit', function(e) {
                e.preventDefault();
                
                
                $(resultContainer).hide();
                $(loadingSpinner).show();
                
                $.ajax({
                    url: '{{ route("FiliereProfesseur.checkAttribution") }}',
                    method: 'POST',
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    success: function(data) {
                        
                        $(loadingSpinner).hide();
                        
                        $(resultContainer).fadeIn(300);
                        
                        $(filiereNom).text(data.filiere.nom);
                        $(nombreEtudiants).text(data.nombre_etudiants);
                        $(profNom).text(data.prof.nom);
                        $(profSpecialite).text(data.prof.specialite || 'Non spécifiée');
                        
                        $(hiddenFiliereId).val(data.filiere.id);
                        $(hiddenProfId).val(data.prof.id);
                        $(removeFiliereId).val(data.filiere.id);
                        $(removeProfId).val(data.prof.id);
                        
                        if (data.is_attributed) {
                             $(attributionStatus).html('<div class="badge badge-light-warning" style="font-size:15px"><i data-feather="plus-circle" style="font-size:15px"></i> Professeur déjà Associer à la filière</div>');
                            feather.replace();
                            $(attributionActions).hide();
                            $(removeAttributionActions).show();
                        } else {
                            $(attributionStatus).html('<div class="badge badge-light-dark" style="font-size:15px"><i data-feather="plus-circle" style="font-size:15px"></i> Professeur Disponible Pour cette filière</div>');
                            feather.replace();
                            $(attributionActions).show();
                            $(removeAttributionActions).hide();
                        }
                    },
                    error: function(error) {
                        $(loadingSpinner).hide();
                        
                        console.error('Erreur:', error);
                        $(resultContainer).fadeIn(300);
                        $(attributionStatus).html('<div class="alert alert-danger"><i data-feather="alert-circle" class="mr-1"></i> Une erreur est survenue lors de la vérification.</div>');
                        $(attributionActions).hide();
                        $(removeAttributionActions).hide();
                    }
                });
            });
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