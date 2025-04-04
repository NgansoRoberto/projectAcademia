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
                                <form action="{{ route('ManagerCour.index') }}" method="GET" class="d-flex">
                                    <div class="input-group input-group-merge mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon-search2"><i data-feather="search"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Rechercher un cours..." name="search" value="{{ $search ?? '' }}" aria-label="Search..." aria-describedby="basic-addon-search2" />
                                    </div>
                                </form>
                            </div>
                            <div>
                                <a href="{{ route('ManagerCour.create') }}" style="background:#d87e46;" class="btn waves-effect waves-float waves-light">
                                    <i data-feather="plus" class="mr-25 text-white"></i>
                                    <span class="text-white">Créer un cours</span>
                                </a>
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
                                            <th>Titre</th>
                                            <th>Filière</th>
                                            <th>séances</th>
                                            <th>Première séance</th>
                                            <th>Date de création</th>
                                            <th>Statut</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($cours as $cour)
                                            <tr>
                                                <td>{{ $cour->titre }}</td>
                                                <td>{{ $cour->filiere->nom ?? 'Non assigné' }}</td>
                                                <td><span class="badge badge-pill badge-glow"  style="background:#d87e46;">{{ $cour->nombres_seances }}</span></td>
                                                <td>
                                                    @php
                                                        $prochaineSeance = $cour->seances->where('date_seance', '>=', date('Y-m-d'))->sortBy('date_seance')->first();
                                                    @endphp
                                                    @if($prochaineSeance)
                                                       {{Ladate($prochaineSeance->date_seance)}} à {{ $prochaineSeance->heure_debut }}
                                                    @else
                                                        <span class="badge badge-light-secondary">Aucune séance à venir</span>
                                                    @endif
                                                </td>
                                                <td>{{Ladate($cour->date_creation)}}</td>
                                                <td><span class="badge badge-pill badge-glow badge-secondary">{{$cour->statut}}</span></td>
                                                <td class="actions-cell">
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                            <i data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{ route('ManagerCour.show', $cour->id) }}">
                                                                <i data-feather="eye" class="mr-50"></i>
                                                                <span>Voir détails</span>
                                                            </a>
                                                            <a class="dropdown-item" href="{{ route('ManagerCour.edit', $cour->id) }}">
                                                                <i data-feather="edit-2" class="mr-50"></i>
                                                                <span>Modifier</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer ce cours?')) document.getElementById('delete-form-{{ $cour->id }}').submit();">
                                                                <i data-feather="trash" class="mr-50"></i>
                                                                <span>Supprimer</span>
                                                            </a>
                                                            <form id="delete-form-{{ $cour->id }}" action="{{ route('ManagerCour.destroy', $cour->id) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-danger">Aucun cours trouvé !</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if(isset($cours) && method_exists($cours, 'links'))
                        <div class="p-3">
                            {{ $cours->appends(['search' => $search ?? ''])->links('searchs.search') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .pagination {
        margin-bottom: 0;
    }
    .page-item.active .page-link {
        background-color: #7367f0;
        border-color: #7367f0;
    }
    .page-link {
        border: none;
        margin: 0 3px;
        min-width: 36px;
        height: 36px;
        line-height: 36px;
        text-align: center;
        border-radius: 6px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6e6b7b;
    }
    .page-link:hover {
        background-color: #f3f2f7;
        color: #7367f0;
    }
    .page-link:focus {
        box-shadow: none;
    }
    .page-item.disabled .page-link {
        background-color: #f3f2f7;
        border-color: #f3f2f7;
        color: #b9b9c3;
    }

    .hover-dropdown {
        position: absolute;
        top: -60px;
        left: 50%;
        transform: translateX(-50%);
        min-width: 200px;
        z-index: 9999;
        background: white;
        border: 1px solid rgba(0,0,0,.15);
        border-radius: 0.358rem;
        padding: 0.5rem 0;
        box-shadow: 0 5px 25px rgba(34,41,47,.1);
    }

    td {
        position: relative !important;
    }

    .cell-dropdown {
        position: relative;
    }

    .cell-dropdown .dropdown-menu {
        margin: 0;
        padding: 0.5rem;
        min-width: 200px;
        box-shadow: 0 5px 25px rgba(34,41,47,.1);
    }

    .cell-dropdown:hover .dropdown-menu {
        display: block;
        top: auto;
        bottom: 100%;
        margin-bottom: 5px;
    }

    .hover-input {
        width: 100%;
        padding: 0.438rem 1rem;
        font-size: 1rem;
        border: 1px solid #D8D6DE;
        border-radius: 0.357rem;
    }

</style>
@endsection

@section('javascript')
    <script type="text/javascript">
        document.getElementById('list_cours').className += 'active'
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