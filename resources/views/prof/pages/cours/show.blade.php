@extends('tamplete.base')
@section('title')
    {{ 'Détails du cours - ' . $cours->titre }}
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
                        <h2 class="content-header-title font-weight-bolder float-left mb-0">Détails du cours</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('ManagerCour.index') }}">Mes cours</a></li>
                                <li class="breadcrumb-item active">{{ $cours->titre }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <!-- Informations du cours -->
            <div class="row">
                <div class="col-lg-8 col-md-7 order-2 order-md-1">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Informations du cours</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <h5 class="mb-1 fs-5">{{ $cours->titre }}</h5>
                                    <p class="card-text">{{ $cours->description }}</p>
                                </div>

                                @php
                                    // Déterminer le statut du cours
                                    $premiereSeance = $cours->seances->sortBy('date_seance')->first();
                                    $derniereSeance = $cours->seances->sortByDesc('date_seance')->first();

                                    if (!$premiereSeance) {
                                        $statusCours = 'Non démarré';
                                        $statusColor = 'warning';
                                    } elseif (\Carbon\Carbon::parse($derniereSeance->date_seance)->isPast()) {
                                        $statusCours = 'Terminé';
                                        $statusColor = 'success';
                                    } elseif (\Carbon\Carbon::parse($premiereSeance->date_seance)->isFuture()) {
                                        $statusCours = 'Prévu';
                                        $statusColor = 'info';
                                    } else {
                                        $statusCours = 'En cours';
                                        $statusColor = 'warning';
                                    }
                                @endphp



                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <h6 class="text-muted font-weight-bold mb-1 fs-5">Filière</h6>
                                        <p class="font-weight-medium"><span class="badge badge-pill badge-glow badge-warning">{{ $cours->filiere->nom ?? 'Non assigné' }}</span></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <h6 class="text-muted font-weight-bold mb-1 fs-5">Nombre de séances</h6>
                                        <p class="font-weight-medium">{{ $cours->nombres_seances }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <h6 class="text-muted font-weight-bold mb-1 fs-5">Date de création</h6>
                                        <p class="font-weight-medium">{{Ladate($cours->date_creation) }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <h6 class="text-muted font-weight-bold mb-1 fs-5">Première séance</h6>
                                        @if($premiereSeance)
                                            <p class="font-weight-medium">{{Ladate($premiereSeance->date_seance) }} à {{ $premiereSeance->heure_debut }}</p>
                                        @else
                                            <p class="text-warning">Aucune séance planifiée</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <h6 class="text-muted font-weight-bold mb-1 fs-5">Dernière séance</h6>
                                        @if($derniereSeance)
                                            <p class="font-weight-medium">{{Ladate($derniereSeance->date_seance) }} à {{ $derniereSeance->heure_fin }}</p>
                                        @else
                                            <p class="text-warning">Aucune séance planifiée</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <h6 class="text-muted font-weight-bold mb-1 fs-5">Satut</h6>
                                        <div class="badge badge-light-{{ $statusColor }} badge-pill mb-1" style="font-size: 0.9rem;">
                                            <i data-feather="clock" class="mr-25" style="width: 14px; height: 14px;"></i> {{ $statusCours }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-5 order-1 order-md-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 border-right">
                                    <div class="text-center">
                                        <h2 class="font-weight-bolder mb-0">{{ $seancesPassees }}</h2>
                                        <p class="card-text mb-0">Séances passées</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center">
                                        <h2 class="font-weight-bolder mb-0">{{ $seancesAVenir }}</h2>
                                        <p class="card-text mb-0">Séances à venir</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Actions rapides</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{ route('ManagerCour.edit', $cours->id) }}" class="btn btn-outline-primary btn-block mb-1">
                                        <i data-feather="edit" class="mr-25"></i>
                                        <span>Modifier le cours</span>
                                    </a>
                                    <a href="#" class="btn btn-outline-info btn-block mb-1">
                                        <i data-feather="file-text" class="mr-25"></i>
                                        <span>Ajouter un document</span>
                                    </a>
                                    <a href="#" class="btn btn-outline-success btn-block">
                                        <i data-feather="message-square" class="mr-25"></i>
                                        <span>Envoyer un message aux étudiants</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Liste des séances -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Séances du cours ({{ $cours->seances->count() }})</h4>
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                    <i data-feather="more-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">
                                        <i data-feather="plus" class="mr-50"></i>
                                        <span>Ajouter une séance</span>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i data-feather="calendar" class="mr-50"></i>
                                        <span>Exporter le calendrier</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="timeline">
                                @forelse($seancesParMois as $mois => $seances)
                                    <li class="timeline-item">
                                        <span class="timeline-point timeline-point-indicator"></span>
                                        <div class="timeline-event">
                                            <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                <h6 class="font-weight-bold">{{ $mois }}</h6>
                                                <span class="badge badge-light-primary">{{ $seances->count() }} séances</span>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>N°</th>
                                                            <th>Date</th>
                                                            <th>Horaire</th>
                                                            <th>Statut</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($seances as $seance)
                                                            @php
                                                                $dateSeance = \Carbon\Carbon::parse($seance->date_seance);
                                                                $aujourdhui = \Carbon\Carbon::today();

                                                                if ($dateSeance->isPast()) {
                                                                    $badgeClass = 'badge-light-secondary';
                                                                    $status = 'Passée';
                                                                } elseif ($dateSeance->isToday()) {
                                                                    $badgeClass = 'badge-light-success';
                                                                    $status = 'Aujourd\'hui';
                                                                } else {
                                                                    $badgeClass = 'badge-light-primary';
                                                                    $status = 'Planifié';
                                                                }
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $seance->numero_seance }}</td>
                                                                <td>{{ Ladate($dateSeance) }}</td>
                                                                <td>{{ $seance->heure_debut }} - {{ $seance->heure_fin }}</td>
                                                                <td><span class="badge {{ $badgeClass }}">{{ $status }}</span></td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                                            <i data-feather="more-vertical"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="#">
                                                                                <i data-feather="edit-2" class="mr-50"></i>
                                                                                <span>Modifier</span>
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i data-feather="check-square" class="mr-50"></i>
                                                                                <span>Marquer présences</span>
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i data-feather="file-text" class="mr-50"></i>
                                                                                <span>Ajouter support</span>
                                                                            </a>
                                                                            <a class="dropdown-item text-danger" href="#">
                                                                                <i data-feather="trash" class="mr-50"></i>
                                                                                <span>Supprimer</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="text-center p-3">
                                        <p class="text-muted">Aucune séance n'a été planifiée pour ce cours.</p>
                                    </li>
                                @endforelse
                            </ul>
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
    .timeline {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .timeline .timeline-item {
        position: relative;
        padding-left: 2.5rem;
        border-left: 1px solid #ebe9f1;
        margin-bottom: 1.5rem;
    }

    .timeline .timeline-item:last-child {
        border-left-color: transparent;
    }

    .timeline .timeline-point {
        position: absolute;
        left: -0.5rem;
        top: 0;
        z-index: 1;
    }

    .timeline .timeline-point-indicator {
        background-color: #7367f0;
        height: 12px;
        width: 12px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .timeline .timeline-event {
        position: relative;
        width: 100%;
        min-height: 4rem;
    }
    .size-label{
        font-size: 20px !important;
        color: #5E5873;
    }
    .size-info{
        font-size: 17px !important;
        color: #5E5873;
    }
</style>
@endsection

@section('javascript')
<script>
    // document.getElementById('list_cours').className += 'active';

    @if(session()->has('toast'))
        toastr['{{ session('toast.type') }}']('{{ session('toast.message') }}', {
            closeButton: true,
            tapToDismiss: false,
            rtl: false
        });
    @endif
</script>
@endsection