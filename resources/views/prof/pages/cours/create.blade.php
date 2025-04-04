@extends('tamplete.base')

@section('title', 'Créer un nouveau cours')

@section('contenu')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Créer un cours</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('ManagerCour.index') }}">Mes cours</a></li>
                                <li class="breadcrumb-item active">Créer un cours</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <section id="multiple-column-form">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Informations du cours</h4>
                            </div>
                            <div class="card-body">
                                <form class="form" action="{{ route('ManagerCour.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="titre">Titre du cours <span class="text-danger">*</span></label>
                                                <input type="text" id="titre" class="form-control @error('titre') is-invalid @enderror"
                                                    placeholder="Ex: Programmation Web I" name="titre" value="{{ old('titre') }}" required>
                                                @error('titre')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="filiere_id">Filière concernée <span class="text-danger">*</span></label>
                                                <select id="filiere_id" name="filiere_id" class="select2 form-control @error('filiere_id') is-invalid @enderror" required>
                                                    <option value="">Sélectionner une filière</option>
                                                    @foreach($filieres as $filiere)
                                                        <option value="{{ $filiere->id }}" {{ old('filiere_id') == $filiere->id ? 'selected' : '' }}>
                                                            {{ $filiere->nom }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('filiere_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nombre_seances">Nombre de séances <span class="text-danger">*</span></label>
                                                <input type="number" id="nombre_seances" class="form-control @error('nombre_seances') is-invalid @enderror"
                                                    placeholder="Ex: 8" name="nombre_seances" value="{{ old('nombre_seances') }}" min="1" required>
                                                @error('nombre_seances')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="description">Description du cours</label>
                                                <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                                                    name="description" placeholder="Description du contenu du cours">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div id="seances-details" class="mt-2" style="display: none;">
                                        <h5 class="mb-1">Détails des séances</h5>
                                        <div class="row">
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="duree_seance">Durée d'une séance (heures) <span class="text-danger">*</span></label>
                                                    <input type="number" id="duree_seance" class="form-control @error('duree_seance') is-invalid @enderror"
                                                        placeholder="Ex: 2" name="duree_seance" value="{{ old('duree_seance') }}" min="1" step="0.5">
                                                    @error('duree_seance')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="frequence">Fréquence des séances <span class="text-danger">*</span></label>
                                                    <select id="frequence" name="frequence" class="form-control @error('frequence') is-invalid @enderror">
                                                        <option value="weekly" {{ old('frequence') == 'weekly' ? 'selected' : '' }}>Hebdomadaire</option>
                                                        <option value="biweekly" {{ old('frequence') == 'biweekly' ? 'selected' : '' }}>Toutes les deux semaines</option>
                                                    </select>
                                                    @error('frequence')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="jour_semaine">Jour de la semaine <span class="text-danger">*</span></label>
                                                    <select id="jour_semaine" name="jour_semaine" class="form-control @error('jour_semaine') is-invalid @enderror">
                                                        <option value="1" {{ old('jour_semaine') == '1' ? 'selected' : '' }}>Lundi</option>
                                                        <option value="2" {{ old('jour_semaine') == '2' ? 'selected' : '' }}>Mardi</option>
                                                        <option value="3" {{ old('jour_semaine') == '3' ? 'selected' : '' }}>Mercredi</option>
                                                        <option value="4" {{ old('jour_semaine') == '4' ? 'selected' : '' }}>Jeudi</option>
                                                        <option value="5" {{ old('jour_semaine') == '5' ? 'selected' : '' }}>Vendredi</option>
                                                        <option value="6" {{ old('jour_semaine') == '6' ? 'selected' : '' }}>Samedi</option>
                                                        <option value="7" {{ old('jour_semaine') == '7' ? 'selected' : '' }}>Dimanche</option>
                                                    </select>
                                                    @error('jour_semaine')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="heure_debut">Heure de début <span class="text-danger">*</span></label>
                                                    <input type="time" id="heure_debut" class="form-control @error('heure_debut') is-invalid @enderror"
                                                        name="heure_debut" value="{{ old('heure_debut') }}">
                                                    @error('heure_debut')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="date_debut">Date de début <span class="text-danger">*</span></label>
                                                    <input type="date" id="date_debut" class="form-control @error('date_debut') is-invalid @enderror"
                                                        name="date_debut" value="{{ old('date_debut') }}">
                                                    @error('date_debut')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="preview-seances" class="mt-3" style="display: none;">
                                        <h5>Aperçu des séances planifiées</h5>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Séance</th>
                                                        <th>Date</th>
                                                        <th>Heure</th>
                                                        <th>Durée</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="seances-list">
                                                    <!-- Les séances seront générées ici par JavaScript -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-12 d-flex justify-content-between">
                                            <button type="button" id="btn-preview" class="btn btn-outline-primary" disabled>
                                                <i data-feather="eye" class="mr-50"></i>
                                                Prévisualiser les séances
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i data-feather="save" class="mr-50"></i>
                                                Créer le cours
                                            </button>
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
    document.addEventListener('DOMContentLoaded', function() {
        // Initialiser Select2
        if (typeof $.fn.select2 !== 'undefined') {
            $('.select2').select2();
        }

        // Afficher les détails des séances lorsque le nombre de séances est saisi
        const nombreSeancesInput = document.getElementById('nombre_seances');
        const seancesDetails = document.getElementById('seances-details');
        const btnPreview = document.getElementById('btn-preview');
        const previewSeances = document.getElementById('preview-seances');

        nombreSeancesInput.addEventListener('input', function() {
            if (this.value && parseInt(this.value) > 0) {
                seancesDetails.style.display = 'block';
                btnPreview.disabled = false;
            } else {
                seancesDetails.style.display = 'none';
                previewSeances.style.display = 'none';
                btnPreview.disabled = true;
            }
        });

        // Si le champ a déjà une valeur (par exemple après une validation échouée)
        if (nombreSeancesInput.value && parseInt(nombreSeancesInput.value) > 0) {
            seancesDetails.style.display = 'block';
            btnPreview.disabled = false;
        }

        // Prévisualiser les séances
        btnPreview.addEventListener('click', function() {
            const nombreSeances = parseInt(document.getElementById('nombre_seances').value);
            const dureeSeance = parseFloat(document.getElementById('duree_seance').value);
            const frequence = document.getElementById('frequence').value;
            const jourSemaine = parseInt(document.getElementById('jour_semaine').value);
            const heureDebut = document.getElementById('heure_debut').value;
            const dateDebut = document.getElementById('date_debut').value;

            // Vérifier que tous les champs nécessaires sont remplis
            if (!nombreSeances || !dureeSeance || !frequence || !jourSemaine || !heureDebut || !dateDebut) {
                toastr['error']('Veuillez remplir tous les champs des détails des séances', 'Erreur', {
                    closeButton: true,
                    tapToDismiss: false
                });
                return;
            }

            // Générer les dates des séances
            const seances = genererSeances(nombreSeances, frequence, dateDebut, jourSemaine, heureDebut, dureeSeance);

            // Afficher les séances dans le tableau
            const seancesList = document.getElementById('seances-list');
            seancesList.innerHTML = '';

            seances.forEach((seance, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>Séance ${index + 1}</td>
                    <td>${formatDate(seance.date)}</td>
                    <td>${seance.heure}</td>
                    <td>${dureeSeance} heure(s)</td>
                `;
                seancesList.appendChild(row);
            });

            // Afficher le tableau de prévisualisation
            previewSeances.style.display = 'block';
        });

        // Fonction pour générer les dates des séances
        function genererSeances(nombreSeances, frequence, dateDebut, jourSemaine, heureDebut, dureeSeance) {
            const seances = [];
            let currentDate = new Date(dateDebut);

            // Ajuster la date de début au jour de la semaine spécifié
            const dayDiff = jourSemaine - currentDate.getDay();
            if (dayDiff > 0) {
                currentDate.setDate(currentDate.getDate() + dayDiff);
            } else if (dayDiff < 0) {
                currentDate.setDate(currentDate.getDate() + 7 + dayDiff);
            }

            for (let i = 0; i < nombreSeances; i++) {
                seances.push({
                    date: new Date(currentDate),
                    heure: heureDebut,
                    duree: dureeSeance
                });

                // Calculer la date de la prochaine séance
                if (frequence === 'weekly') {
                    currentDate.setDate(currentDate.getDate() + 7); // Une semaine plus tard
                } else if (frequence === 'biweekly') {
                    currentDate.setDate(currentDate.getDate() + 14); // Deux semaines plus tard
                }
            }

            return seances;
        }

        // Fonction pour formater la date
        function formatDate(date) {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            return date.toLocaleDateString('fr-FR', options);
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