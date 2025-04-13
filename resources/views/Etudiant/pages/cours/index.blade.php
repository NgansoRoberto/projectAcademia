@extends('tamplete.base')
@section('title')
    {{'Mes Cours'}}
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
                        <h2 class="content-header-title font-weight-bolder float-left mb-0">{{ __('Mes Cours') }}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Accueil') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('Cours') }}</li>
                                <li class="breadcrumb-item active">{{ __('Mes Cours') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="col-md-6">
                                <form action="{{ route('ListeCoursEtudiant') }}" method="GET" class="d-flex">
                                    <div class="input-group input-group-merge mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon-search2"><i data-feather="search"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Rechercher un cours..." name="search" value="{{ $search ?? '' }}" aria-label="Search..." aria-describedby="basic-addon-search2" />
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success')}}
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Nom</th>
                                            <th>Professeur</th>
                                            <th>Séances</th>
                                            <th>Prochaine séance</th>
                                            <th>Date de création</th>
                                            <th>Statut</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($cours as $cour)
                                            @php
                                                $prochaineSeance = $cour->seances->where('date_seance', '>=', date('Y-m-d'))->sortBy('date_seance')->first();

                                                // Déterminer le statut du cours
                                                $premiereSeance = $cour->seances->sortBy('date_seance')->first();
                                                $derniereSeance = $cour->seances->sortByDesc('date_seance')->first();

                                                if (!$premiereSeance) {
                                                    $statusCours = 'Non démarré';
                                                    $statusColor = 'warning';
                                                } elseif (\Carbon\Carbon::parse($derniereSeance->date_seance)->isPast()) {
                                                    $statusCours = 'Terminé';
                                                    $statusColor = 'secondary';
                                                } elseif (\Carbon\Carbon::parse($premiereSeance->date_seance)->isFuture()) {
                                                    $statusCours = 'À venir';
                                                    $statusColor = 'info';
                                                } else {
                                                    $statusCours = 'En cours';
                                                    $statusColor = 'success';
                                                }
                                            @endphp
                                            <tr>
                                                <td>{{ $cour->titre }}</td>
                                                <td>{{ $cour->professeur->user->name }}</td>
                                                <td><span class="badge badge-pill badge-glow" style="background:#d87e46;">{{ $cour->seances->count() }}</span></td>
                                                <td>
                                                    @if($prochaineSeance)
                                                       {{Ladate($prochaineSeance->date_seance)}} à {{ $prochaineSeance->heure_debut }}
                                                    @else
                                                        <span class="badge badge-light-secondary">Aucune séance à venir</span>
                                                    @endif
                                                </td>
                                                <td>{{Ladate($cour->date_creation)}}</td>
                                                <td><span class="badge badge-pill badge-glow badge-{{ $statusColor }}">{{ $statusCours }}</span></td>
                                                <td class="actions-cell">
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                            <i data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">
                                                                <i data-feather="eye" class="mr-50"></i>
                                                                <span>Voir détails</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i data-feather="file-text" class="mr-50"></i>
                                                                <span>Documents</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i data-feather="calendar" class="mr-50"></i>
                                                                <span>Séances</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">
                                                    <div class="alert alert-info">
                                                        <h4 class="alert-heading">Aucun cours trouvé</h4>
                                                        <p>Vous n'avez pas encore de cours assignés à votre filière.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script type="text/javascript">
        // document.getElementById('list_cours_etudiant').className += 'active';

        // Réinitialiser les icônes Feather après chaque changement de page
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }

        @if(session()->has('toast'))
            toastr['{{ session('toast.type') }}']('{{ session('toast.message') }}',{
                closeButton: true,
                tapToDismiss: false,
                rtl: false
            });
        @endif
    </script>
@endsection