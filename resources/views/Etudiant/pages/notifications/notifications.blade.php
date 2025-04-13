@extends('tamplete.base')

@section('contenu')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Notifications</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item active">Notifications
                                    </li>
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
                                    <form action="#" method="GET" class="d-flex">
                                        <div class="input-group input-group-merge mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon-search2"><i data-feather="search"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Rechercher une notification..." name="search" value="{{ $search ?? '' }}" aria-label="Search..." aria-describedby="basic-addon-search2" />
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
                                                <th>Statut</th>
                                                <th>Date</th>
                                                <th>Professeur</th>
                                                <th>Sujet</th>
                                                <th>Message</th>
                                                <th>Cours</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($notifications as $notification)
                                                <tr>
                                                    <td>
                                                        @if($notification->statut === 'envoyée')
                                                            <span class="badge badge-pill badge-glow badge-primary">Non lue</span>
                                                        @else
                                                            <span class="badge badge-pill badge-glow badge-secondary">Lue</span>
                                                        @endif
                                                    </td>
                                                    <td>{{Ladate_heure($notification->created_at)}}</td>
                                                    <td> <span class="badge badge-pill badge-glow badge-dark">{{ $notification->user_send->name }} </span> </td>
                                                    <td>{{ $notification->sujet }}</td>
                                                    <td>{{ Str::limit($notification->message, 50) }}</td>
                                                    <td>
                                                        @if($notification->cours_id)
                                                            <a href="#">
                                                                <span class="badge badge-light-info"> {{ $notification->cour->titre }}</span>
                                                            </a>
                                                        @else
                                                            <span class="badge badge-light-secondary">Aucun cours associé</span>
                                                        @endif
                                                    </td>
                                                    <td class="actions-cell">
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                                <i data-feather="more-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#notification-modal-{{ $notification->id }}">
                                                                    <i data-feather="eye" class="mr-50"></i>
                                                                    <span>Voir détails</span>
                                                                </a>
                                                                @if($notification->statut === 'envoyée')
                                                                    <a class="dropdown-item change-status" href="#" data-id="{{ $notification->id }}">
                                                                        <i data-feather="check" class="mr-50"></i>
                                                                        <span>Marquer comme lue</span>
                                                                    </a>
                                                                @endif
                                                                @if($notification->cours_id && $notification->cours)
                                                                    <a class="dropdown-item" href="{{ route('etudiant.cours.show', $notification->cours_id) }}">
                                                                        <i data-feather="book-open" class="mr-50"></i>
                                                                        <span>Voir le cours</span>
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">
                                                        <div class="alert alert-info" role="alert">
                                                            <div class="alert-body">
                                                                Vous n'avez aucune notification pour le moment.
                                                            </div>
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
<script>
    $(document).ready(function() {
          $('.change-status').on('click', function(e) {
            e.preventDefault();
            var notificationId = $(this).data('id'); 
            
            // Ajouter un spinner dans la cellule de statut
            var statusCell = $(this).closest('tr').find('td:first-child');
            var originalContent = statusCell.html();
            statusCell.html('<div class="spinner-border spinner-border-sm text-primary" role="status"><span class="sr-only">Chargement...</span></div>');
            
            $.ajax({
                type: 'POST',
                url: '{{ route('etudiants.change-status') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    notificationId: notificationId,
                },
                success: function(response) {
                    if (response.success) {
                        var row = $('[data-id="' + notificationId + '"]').closest('tr');
                        row.find('td:first-child').html('<span class="badge badge-pill badge-glow badge-secondary">Lue</span>');

                        toastr['success']('Notification marquer comme lu', 'Succès',{
                            closeButton: true,
                            tapToDismiss: false
                        });
                    } else {
                        console.error('Erreur lors de la mise à jour de la tâche');
                        statusCell.html(originalContent);
                    }
                },
                error: function() {
                    console.error('Erreur lors de la requête AJAX');
                    statusCell.html(originalContent);
                }
            });
        });
    });
    
    $(document).ready(function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    });
</script>
@endsection