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

                                    $premiereSeance = $cours->seances->sortBy('date_seance')->first();
                                    $derniereSeance = $cours->seances->sortByDesc('date_seance')->first();

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
                                        <div class="badge badge-light-warning badge-pill mb-1" style="font-size: 0.9rem;">
                                            <i data-feather="clock" class="mr-25" style="width: 14px; height: 14px;"></i> {{ $cours->statut }}
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
                                    <a href="#" class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#notifierEtudiantsModal">
                                        <i data-feather="message-square" class="mr-25"></i>
                                        <span>Notifier les étudiants de {{ $cours->filiere->nom }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Notifier Étudiants -->
            <div class="modal fade" id="notifierEtudiantsModal" tabindex="-1" role="dialog" aria-labelledby="notifierEtudiantsModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="notifierEtudiantsModalTitle">Notifier les étudiants de {{ $cours->filiere->nom }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('NotifierCourEtudiants', $cours->filiere)}}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="sujet">Sujet</label>
                                    <input type="text" class="form-control" id="sujet" name="sujet" placeholder="Entrez le sujet de la notification" required>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="Entrez votre message" required></textarea>
                                </div>
                                <input type="hidden" name="filiere_id" value="{{ $cours->filiere_id }}">
                                <input type="hidden" name="cours_id" value="{{ $cours->id }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn text-white" style="background:#d87e46;">Envoyer la notification</button>
                            </div>
                        </form>
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
                                                            <tr>
                                                                <td>{{ $seance->numero_seance }}</td>
                                                                <td>{{ Ladate($seance->date_seance)}}</td>
                                                                <td>{{ $seance->heure_debut }} - {{ $seance->heure_fin }}</td>
                                                                <td><span class="badge badge-light-primary">{{ $seance->statut }} </span></td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                                            <i data-feather="more-vertical"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="{{route('show-seance', $seance->id)}}">
                                                                                <i data-feather="crosshair" class="mr-50"></i>
                                                                                <span>Demarrer la seance</span>
                                                                            </a>
                                                                            <a class="dropdown-item" href="#">
                                                                                <i data-feather="edit-2" class="mr-50"></i>
                                                                                <span>Modifier</span>
                                                                            </a>
                                                                            <a class="dropdown-item" href="{{route('show-detail-seance', $seance->id)}}">
                                                                                <i data-feather="eye" class="mr-50"></i>
                                                                                <span>Voir Detail</span>
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