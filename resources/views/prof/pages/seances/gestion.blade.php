@extends('tamplete.base')
@section('title')
    {{ 'Gestion de la séance - ' . $seance->cours->titre }}
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
                        <h2 class="content-header-title font-weight-bolder float-left mb-0">Gestion de la séance</h2>
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
                                                    <h4 class="mb-0 ml-1 font-weight-bolder" style="font-size: 1.5rem;">Séance {{ $seance->numero_seance }} - {{ $seance->cours->titre }}</h4>
                                                    <span class="card-text ml-1" style="font-size: 1.1rem;">{{ $seance->description ?? 'Aucune description disponible' }}</span>
                                                </div>
                                                <img style="min-width: 45px;" src="<?= asset('app-assets/images/logo/seances.png') ?>">
                                                <div class="d-flex flex-wrap ml-5 mt-2">
                                                    @if($seance->statut == 'planifiée')
                                                        <button id="demarrerSeanceBtn" type="button" class="btn btn-primary ml-1" data-toggle="tooltip" data-placement="bottom" title="Démarrer la séance">
                                                            <i data-feather='play'></i>
                                                        </button>
                                                    @elseif($seance->statut == 'en cours')
                                                        <form action="{{ route('terminer-seance', $seance->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success ml-1" data-toggle="tooltip" data-placement="bottom" title="Terminer la séance">
                                                                <i data-feather='check-circle'></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                    <a href="#" data-toggle="modal" data-target="#marquerPresencesModal" class="btn btn-secondary ml-1" data-toggle="tooltip" data-placement="bottom" title="Marquer les présences">
                                                        <i data-feather='check-square'></i>
                                                    </a>

                                                    <a href="#" data-toggle="modal" data-target="#ajouterSupportModal" class="btn btn-secondary ml-1" data-toggle="tooltip" data-placement="bottom" title="Ajouter un support">
                                                        <i data-feather='file-text'></i>
                                                    </a>

                                                    <a href="#" data-toggle="modal" data-target="#notifierEtudiantsModal" class="btn btn-secondary ml-1" data-toggle="tooltip" data-placement="bottom" title="Notifier les étudiants">
                                                        <i data-feather='message-square'></i>
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
                                                <i data-feather="calendar" class="mr-1" style="width: 18px; height: 18px;"></i>
                                                <span class="card-text user-info-title font-weight-bold font-weight-bolder mb-0" style="font-size: 1.2rem;">Date</span>
                                            </div>
                                            <p class="card-text mb-0 ml-1" style="font-size: 1.1rem;">
                                                {{ Ladate($seance->date_seance) }}
                                            </p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title">
                                                <i data-feather="clock" class="mr-1" style="width: 18px; height: 18px;"></i>
                                                <span class="card-text user-info-title font-weight-bolder mb-0" style="font-size: 1.2rem;">Horaire</span>
                                            </div>
                                            <p class="card-text mb-0 ml-1" style="font-size: 1.1rem;">
                                                {{ $seance->heure_debut }} - {{ $seance->heure_fin }}
                                            </p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title">
                                                <i data-feather="tag" class="mr-1" style="width: 18px; height: 18px;"></i>
                                                <span class="card-text user-info-title font-weight-bolder mb-0" style="font-size: 1.2rem;">Statut</span>
                                            </div>
                                            <p class="card-text mb-0 ml-1">
                                                <span class="badge badge-pill badge-glow badge-{{ $seance->statut == 'planifiée' ? 'warning' : ($seance->statut == 'en cours' ? 'success' : 'secondary') }}" style="font-size: 1rem; padding: 0.5rem 0.7rem;">
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

                                        <!-- Ajout de la zone pour la barre de progression -->
                                        <div id="progressContainer" class="d-flex flex-wrap my-50" style="display: none !important;">
                                            <div class="user-info-title">
                                                <i data-feather="activity" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bolder mb-0 size">Progression</span>
                                            </div>
                                            <div class="w-100 mt-1">
                                                <div id="progressSpinner" class="d-flex justify-content-center" style="display: none !important;">
                                                    <div class="spinner-border text-primary" role="status">
                                                        <span class="sr-only">Chargement...</span>
                                                    </div>
                                                </div>
                                                <div id="progressBarContainer" style="display: none;">
                                                    <div class="progress">
                                                        <div
                                                            class="progress-bar bg-primary"
                                                            role="progressbar"
                                                            style="width: 0%"
                                                            aria-valuenow="0"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100">
                                                            <span id="progressText">0%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <!-- Supports de cours -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Supports de cours</h4>
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#ajouterSupportModal">
                                <i data-feather="plus" class="mr-25"></i>
                                <span>Ajouter un support</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @forelse($seance->supports ?? [] as $support)
                                    <div class="col-md-4 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h5 class="mb-1">{{ $support->titre }}</h5>
                                                        <p class="card-text text-muted">{{ Str::limit($support->description, 50) }}</p>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                            <i data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{ route('telecharger-support', $support->id) }}">
                                                                <i data-feather="download" class="mr-50"></i>
                                                                <span>Télécharger</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i data-feather="edit" class="mr-50"></i>
                                                                <span>Modifier</span>
                                                            </a>
                                                            <a class="dropdown-item text-danger" href="#">
                                                                <i data-feather="trash" class="mr-50"></i>
                                                                <span>Supprimer</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center mt-1">
                                                    <i data-feather="file" class="mr-50"></i>
                                                    <small>{{ strtoupper(pathinfo($support->fichier, PATHINFO_EXTENSION)) }}</small>
                                                    <i data-feather="calendar" class="ml-1 mr-50"></i>
                                                    <small>{{ \Carbon\Carbon::parse($support->created_at)->format('d/m/Y') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <div class="alert alert-info" role="alert">
                                            <div class="alert-body">
                                                Aucun support de cours n'a été ajouté pour cette séance.
                                            </div>
                                        </div>
                                    </div>
                                @endforelse
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
                            <h5 class="modal-title" id="notifierEtudiantsModalTitle">Notifier les étudiants</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('NotifierCourEtudiants', $seance->cours->filiere) }}" method="POST">
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
                                <input type="hidden" name="filiere_id" value="{{ $seance->cours->filiere_id }}">
                                <input type="hidden" name="cours_id" value="{{ $seance->cours_id }}">
                                <input type="hidden" name="seance_id" value="{{ $seance->id }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn text-white" style="background:#d87e46;">Envoyer la notification</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Ajouter Support -->
            <div class="modal fade" id="ajouterSupportModal" tabindex="-1" role="dialog" aria-labelledby="ajouterSupportModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ajouterSupportModalTitle">Ajouter un support de cours</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('ajouter-support', $seance->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="titre">Titre du document</label>
                                    <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrez le titre du document" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Entrez une description du document"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="fichier">Fichier</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fichier" name="fichier" required>
                                        <label class="custom-file-label" for="fichier">Choisir un fichier</label>
                                    </div>
                                    <small class="form-text text-muted">Formats acceptés: PDF, DOCX, PPTX, etc. (Max: 10MB)</small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary">Ajouter le support</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
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

        // Gestion du bouton Démarrer la séance
        $('#demarrerSeanceBtn').on('click', function() {
            // Afficher le conteneur de progression
            $('#progressContainer').css('display', 'flex !important');
            $('#progressContainer').show();

            // Afficher le spinner
            $('#progressSpinner').css('display', 'flex !important');
            $('#progressSpinner').show();

            // Appel AJAX pour démarrer la séance
            $.ajax({
                url: '{{ route("demarrer-seance", $seance->id) }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Cacher le spinner après 1 seconde
                    setTimeout(function() {
                        $('#progressSpinner').css('display', 'none !important');
                        $('#progressSpinner').hide();

                        // Afficher la barre de progression
                        $('#progressBarContainer').show();

                        // Mettre à jour la barre de progression
                        updateProgressBar(response.seance.heure_debut, response.seance.heure_fin);
                        console.log(response.seance.heure_debut);

                        console.log(updateProgressBar(response.seance.heure_debut, response.seance.heure_fin));


                        // Mettre à jour l'interface pour refléter que la séance est en cours
                        updateSeanceStatus();

                        // Afficher un message de succès
                        toastr['success']('La séance a été démarrée avec succès.', {
                            closeButton: true,
                            tapToDismiss: false,
                            rtl: false
                        });
                    }, 1000);
                },
                error: function() {
                    // Cacher le spinner
                    $('#progressSpinner').hide();
                    $('#progressContainer').hide();

                    // Afficher un message d'erreur
                    toastr['error']('Une erreur est survenue lors du démarrage de la séance.', {
                        closeButton: true,
                        tapToDismiss: false,
                        rtl: false
                    });
                }
            });
        });

        // Fonction pour mettre à jour la barre de progression
        function updateProgressBar(dateDebut, dateFin) {
            console.log("Dates reçues:", dateDebut, dateFin);

            // Ajouter la date du jour pour avoir une date complète
            var today = new Date().toISOString().split('T')[0]; // Format YYYY-MM-DD
            var dateDebutComplete = today + 'T' + dateDebut;
            var dateFinComplete = today + 'T' + dateFin;

            // Calculer le pourcentage de progression
            var dateDebutTimestamp = new Date(dateDebutComplete).getTime();
            var dateFinTimestamp = new Date(dateFinComplete).getTime();
            var dateActuelleTimestamp = new Date().getTime();

            console.log("Timestamps:", dateDebutTimestamp, dateFinTimestamp, dateActuelleTimestamp);

            var tempsEcoule = dateActuelleTimestamp - dateDebutTimestamp;
            var tempsTotaux = dateFinTimestamp - dateDebutTimestamp;
            var pourcentage = Math.min(100, Math.max(0, Math.round((tempsEcoule / tempsTotaux) * 100)));

            console.log("Calcul:", tempsEcoule, tempsTotaux, pourcentage);

            // Mettre à jour la barre de progression
            $('.progress-bar').css('width', pourcentage + '%');
            $('.progress-bar').attr('aria-valuenow', pourcentage);
            $('#progressText').text(pourcentage + '%');

            // Mettre à jour la barre de progression toutes les minutes
            setTimeout(function() {
                updateProgressBar(dateDebut, dateFin);
            }, 60000);

            return pourcentage;
        }

        // Fonction pour mettre à jour l'interface après le démarrage de la séance
        function updateSeanceStatus() {
            // Remplacer le bouton démarrer par le bouton terminer
            var terminerBtn = `
                <form action="{{ route('terminer-seance', $seance->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm ml-1" data-toggle="tooltip" data-placement="bottom" title="Terminer la séance">
                        <i data-feather='check-circle'></i>
                    </button>
                </form>
            `;
            $('#demarrerSeanceBtn').replaceWith(terminerBtn);

            // Mettre à jour le statut de la séance
            $('.badge-warning').removeClass('badge-warning').addClass('badge-success').text('en cours');

            // Réinitialiser Feather Icons
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }

            // Réinitialiser les tooltips
            $('[data-toggle="tooltip"]').tooltip();
        }

        // Gestion des présences
        $('.toggle-presence').on('click', function(e) {
            e.preventDefault();
            var etudiantId = $(this).data('etudiant-id');
            var seanceId = $(this).data('seance-id');
            var row = $(this).closest('tr');

            $.ajax({
                url: '/toggle-presence',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    etudiant_id: etudiantId,
                    seance_id: seanceId
                },
                success: function(response) {
                    if (response.present) {
                        row.find('td:nth-child(3) span').removeClass('badge-light-danger').addClass('badge-light-success').text('Présent');
                        row.find('.toggle-presence i').replaceWith(feather.icons['x-circle'].toSvg({ class: 'mr-50' }));
                        row.find('.toggle-presence span').text('Marquer absent');
                        row.find('td:nth-child(4)').text('{{ \Carbon\Carbon::now()->format('H:i') }}');
                    } else {
                        row.find('td:nth-child(3) span').removeClass('badge-light-success').addClass('badge-light-danger').text('Absent');
                        row.find('.toggle-presence i').replaceWith(feather.icons['check-circle'].toSvg({ class: 'mr-50' }));
                        row.find('.toggle-presence span').text('Marquer présent');
                        row.find('td:nth-child(4)').text('-');
                    }

                    // Mettre à jour le compteur de présences
                    var presencesCount = parseInt($('.card-header .font-weight-bolder').first().text());
                    if (response.present) {
                        $('.card-header .font-weight-bolder').first().text(presencesCount + 1);
                        $('.card-header .font-weight-bolder').eq(1).text(parseInt($('.card-header .font-weight-bolder').eq(1).text()) - 1);
                    } else {
                        $('.card-header .font-weight-bolder').first().text(presencesCount - 1);
                        $('.card-header .font-weight-bolder').eq(1).text(parseInt($('.card-header .font-weight-bolder').eq(1).text()) + 1);
                    }

                    // Réinitialiser Feather Icons
                    if (feather) {
                        feather.replace({
                            width: 14,
                            height: 14
                        });
                    }
                },
                error: function() {
                    toastr['error']('Une erreur est survenue lors de la mise à jour de la présence.', {
                        closeButton: true,
                        tapToDismiss: false,
                        rtl: false
                    });
                }
            });
        });

        // Afficher le nom du fichier sélectionné
        $('.custom-file-input').on('change', function() {
            var fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').html(fileName);
        });

        // Afficher la barre de progression si la séance est déjà en cours
        @if($seance->statut == 'en cours')
            $('#progressContainer').css('display', 'flex !important');
            $('#progressContainer').show();
            $('#progressBarContainer').show();
            updateProgressBar('{{ $seance->heure_debut }}', '{{ $seance->heure_fin }}');
        @endif
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