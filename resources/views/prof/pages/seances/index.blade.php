@extends('tamplete.base')
@section('title')
    {{ 'Détails de la séance - ' . $seance->cours->titre }}
@endsection

@section('contenu')
<div class="content app-content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title font-weight-bolder float-left mb-0">Détails de la séance</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('ManagerCour.index') }}">Mes cours</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('ManagerCour.show', $seance->cours->id) }}">{{ $seance->cours->titre }}</a></li>
                                <li class="breadcrumb-item active">Séance {{ $seance->numero_seance }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- Informations de la séance -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card user-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-bg-6 col-lg-4 d-flex flex-column justify-content-between border-container-lg">
                                    <div class="user-avatar-section">
                                        <div class="d-flex justify-content-start">
                                            <div class="d-flex flex-column ml-1">
                                                <div class="user-info mb-1">
                                                    <h4 class="mb-0 ml-1">Séance {{ $seance->numero_seance }} - {{ $seance->cours->titre }}</h4>
                                                    <span class="card-text ml-1">{{ $seance->description ?? 'Aucune description disponible' }}</span>
                                                </div>
                                                <img style="min-width: 45px;" src="<?= asset('app-assets/images/logo/seances.png') ?>">
                                                <div class="d-flex flex-wrap ml-5">
                                                    <a href="{{ route('show-seance', $seance->id) }}" class="btn btn-primary btn-sm ml-1" data-toggle="tooltip" data-placement="bottom" title="Gérer la séance">
                                                        <i data-feather='settings'></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-bg-6 col-lg-4 mt-1 p-0 mt-xl-0">
                                    <div class="user-info-wrapper mt-5">
                                        <div class="d-flex flex-wrap d-sm-block d-sm-flex d-none">
                                            <div class="user-info-title">
                                                <i data-feather="calendar" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold font-weight-bolder mb-0 size">Date</span>
                                            </div>
                                            <p class="card-text mb-0 ml-1 size2">
                                                {{ Ladate($seance->date_seance) }}
                                            </p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title">
                                                <i data-feather="clock" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bolder mb-0 size">Horaire</span>
                                            </div>
                                            <p class="card-text mb-0 ml-1 size2">
                                                {{ $seance->heure_debut }} - {{ $seance->heure_fin }}
                                            </p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title">
                                                <i data-feather="tag" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bolder mb-0 size">Statut</span>
                                            </div>
                                            <p class="card-text mb-0 ml-1 size2">
                                                <span class="badge badge-pill badge-glow badge-{{ $seance->statut == 'planifiée' ? 'warning' : ($seance->statut == 'en cours' ? 'success' : 'secondary') }}">
                                                    {{ $seance->statut }}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-bg-6 col-lg-4 mt-1 p-0 mt-xl-0">
                                    <div class="user-info-wrapper mt-5">
                                        <div class="d-flex flex-wrap d-sm-block d-sm-flex d-none">
                                            <div class="user-info-title">
                                                <i data-feather="book" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold font-weight-bolder mb-0 size">Cours</span>
                                            </div>
                                            <p class="card-text mb-0 ml-1 size2">
                                                {{ $seance->cours->titre }}
                                            </p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title">
                                                <i data-feather="users" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bolder mb-0 size">Filière</span>
                                            </div>
                                            <p class="card-text mb-0 ml-1 size2">
                                                <span class="badge badge-pill badge-glow badge-warning">{{ $seance->cours->filiere->nom ?? 'Non assigné' }}</span>
                                            </p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title">
                                                <i data-feather="map-pin" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bolder mb-0 size">Salle</span>
                                            </div>
                                            <p class="card-text mb-0 ml-1 size2">
                                                {{ $seance->salle ?? 'Non définie' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistiques -->
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                {{-- <h2 class="font-weight-bolder mb-0">{{ $seance->presences->count() ?? 0 }}</h2> --}}
                                <h2 class="font-weight-bolder mb-0">30</h2>
                                <p class="card-text">Présences</p>
                            </div>
                            <div class="avatar bg-light-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="users" class="font-medium-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h2 class="font-weight-bolder mb-0">10</h2>
                                {{-- <h2 class="font-weight-bolder mb-0">{{ count($etudiants) - ($seance->presences->count() ?? 0) }}</h2> --}}
                                <p class="card-text">Absences</p>
                            </div>
                            <div class="avatar bg-light-danger p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="user-x" class="font-medium-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <!-- Liste des étudiants -->
             <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Liste des étudiants</h4>
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                    <i data-feather="more-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">
                                        <i data-feather="download" class="mr-50"></i>
                                        <span>Exporter la liste</span>
                                    </a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#notifierEtudiantsModal">
                                        <i data-feather="mail" class="mr-50"></i>
                                        <span>Notifier tous</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Présence</th>
                                            <th>Heure d'arrivée</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($etudiants as $etudiant)
                                            {{-- @php
                                                $presence = $seance->presences->where('etudiant_id', $etudiant->id)->first();
                                            @endphp --}}
                                            <tr>
                                                <td>{{ $etudiant->user->name }}</td>
                                                <td>{{ $etudiant->user->email }}</td>
                                                <td>
                                                    {{-- @if($presence)
                                                        <span class="badge badge-pill badge-light-success">Présent</span>
                                                    @else
                                                        <span class="badge badge-pill badge-light-danger">Absent</span>
                                                    @endif --}}
                                                      <span class="badge badge-pill badge-light-success">Présent</span>
                                                </td>
                                                <td>
                                                    {{-- @if($presence)
                                                        {{ \Carbon\Carbon::parse($presence->created_at)->format('H:i') }}
                                                    @else
                                                        -
                                                    @endif --}}
                                                    10h
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                            <i data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item toggle-presence" href="#" data-etudiant-id="{{ $etudiant->id }}" data-seance-id="{{ $seance->id }}">
                                                                {{-- <i data-feather="{{ $presence ? 'x-circle' : 'check-circle' }}" class="mr-50"></i>
                                                                <span>{{ $presence ? 'Marquer absent' : 'Marquer présent' }}</span> --}}
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i data-feather="message-square" class="mr-50"></i>
                                                                <span>Envoyer un message</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i data-feather="user" class="mr-50"></i>
                                                                <span>Voir le profil</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Aucun étudiant inscrit dans cette filière.</td>
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

@section('styles')
<style>
    .badge-glow {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
    .size {
        font-size: 1rem !important;
    }
    .size2 {
        font-size: 0.9rem !important;
    }
    .user-card .card-body {
        padding: 1.5rem;
    }
    .user-avatar-section {
        margin-bottom: 1rem;
    }
    .border-container-lg {
        border-right: 1px solid #ebe9f1;
    }
    .avatar {
        height: 32px;
        width: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f8f8f8;
        border-radius: 50%;
    }
    .avatar-content {
        font-size: 0.857rem;
        font-weight: 600;
    }
    @media (max-width: 992px) {
        .border-container-lg {
            border-right: none;
            border-bottom: 1px solid #ebe9f1;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
        }
    }
</style>
@endsection

@section('javascript')
<script>
    $(document).ready(function() {
        // Initialiser Feather Icons
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }

        // Initialiser les tooltips
        $('[data-toggle="tooltip"]').tooltip();
    });

    @if(session()->has('toast'))
        toastr['{{ session('toast.type') }}']('{{ session('toast.message') }}', {
            closeButton: true,
            tapToDismiss: false,
            rtl: false
        });
    @endif
</script>
@endsection