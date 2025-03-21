@extends('layouts.app')

@section('title', 'IUG - Institut Universitaire du Golfe de Guinée')

@section('content')
<!-- Slider -->
<div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/slider1.jpg') }}" class="d-block w-100" alt="IUG Campus">
            <div class="carousel-caption">
                <h2>Bienvenue à l'Institut Universitaire du Golfe de Guinée</h2>
                <p>Une éducation de qualité pour un avenir brillant</p>
                <a href="#" class="btn btn-success btn-lg">Pré-inscription</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slider2.jpg') }}" class="d-block w-100" alt="Étudiants IUG">
            <div class="carousel-caption">
                <h2>Des formations adaptées au marché du travail</h2>
                <p>Formez-vous aux métiers de demain</p>
                <a href="#" class="btn btn-success btn-lg">Nos formations</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/slider3.jpg') }}" class="d-block w-100" alt="Campus IUG">
            <div class="carousel-caption">
                <h2>Un environnement propice à l'apprentissage</h2>
                <p>Des infrastructures modernes et un corps enseignant qualifié</p>
                <a href="#" class="btn btn-success btn-lg">Découvrir l'IUG</a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Campus Block -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Nos <span class="text-success">Campus</span></h2>
            <p class="lead">Découvrez nos trois campus modernes et bien équipés</p>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card campus-card h-100">
                    <img src="{{ asset('images/campus1.jpg') }}" class="card-img-top" alt="Campus Principal">
                    <div class="card-body text-center">
                        <h4 class="card-title">Campus Principal</h4>
                        <p class="card-text">Notre campus principal accueille l'administration et les formations en management, commerce et droit.</p>
                        <p><i class="fas fa-map-marker-alt text-success me-2"></i>Douala, Quartier Bonamoussadi</p>
                    </div>
                    <div class="card-footer bg-white border-0 text-center">
                        <a href="#" class="btn btn-outline-success">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card campus-card h-100">
                    <img src="{{ asset('images/campus2.jpg') }}" class="card-img-top" alt="Campus Technique">
                    <div class="card-body text-center">
                        <h4 class="card-title">Campus Technique</h4>
                        <p class="card-text">Le campus technique abrite nos formations en ingénierie, informatique et sciences appliquées.</p>
                        <p><i class="fas fa-map-marker-alt text-success me-2"></i>Douala, Quartier Ndokoti</p>
                    </div>
                    <div class="card-footer bg-white border-0 text-center">
                        <a href="#" class="btn btn-outline-success">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card campus-card h-100">
                    <img src="{{ asset('images/campus3.jpg') }}" class="card-img-top" alt="Campus Santé">
                    <div class="card-body text-center">
                        <h4 class="card-title">Campus Santé</h4>
                        <p class="card-text">Notre campus santé est dédié aux formations en sciences médicales et paramédicales.</p>
                        <p><i class="fas fa-map-marker-alt text-success me-2"></i>Douala, Quartier Bali</p>
                    </div>
                    <div class="card-footer bg-white border-0 text-center">
                        <a href="#" class="btn btn-outline-success">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Block -->
<section class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center mb-4 mb-md-0">
                <h2 class="display-4 text-warning">+25</h2>
                <p class="stats-text">Années d'expérience dans l'enseignement</p>
            </div>
            <div class="col-md-3 text-center mb-4 mb-md-0">
                <h2 class="display-4 text-warning">+90</h2>
                <p class="stats-text">Enseignants et personnels qualifiés</p>
            </div>
            <div class="col-md-3 text-center mb-4 mb-md-0">
                <h2 class="display-4 text-warning">+90</h2>
                <p class="stats-text">Salles de cours et un amphi de 700 places</p>
            </div>
            <div class="col-md-3 text-center">
                <h2 class="display-4 text-warning">+5000</h2>
                <p class="stats-text">Étudiants inscrits chaque année</p>
            </div>
        </div>
    </div>
</section>

<!-- Latest News and Events -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Actualités <span class="text-success">& Événements</span></h2>
            <p class="lead">Restez informé des dernières nouvelles et événements de l'IUG</p>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card news-card h-100">
                    <img src="{{ asset('images/news1.jpg') }}" class="card-img-top" alt="Remise des diplômes">
                    <div class="card-body">
                        <div class="news-date mb-2">
                            <span class="bg-success text-white px-3 py-1">15 Mars 2025</span>
                        </div>
                        <h5 class="card-title">Cérémonie de remise des diplômes 2025</h5>
                        <p class="card-text">La cérémonie annuelle de remise des diplômes se tiendra le 30 avril au campus principal.</p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="#" class="btn btn-link text-success p-0">Lire la suite <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card news-card h-100">
                    <img src="{{ asset('images/news2.jpg') }}" class="card-img-top" alt="Conférence">
                    <div class="card-body">
                        <div class="news-date mb-2">
                            <span class="bg-success text-white px-3 py-1">10 Mars 2025</span>
                        </div>
                        <h5 class="card-title">Conférence internationale sur l'innovation</h5>
                        <p class="card-text">L'IUG accueillera une conférence internationale sur l'innovation et l'entrepreneuriat.</p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="#" class="btn btn-link text-success p-0">Lire la suite <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card news-card h-100">
                    <img src="{{ asset('images/news3.jpg') }}" class="card-img-top" alt="Partenariat">
                    <div class="card-body">
                        <div class="news-date mb-2">
                            <span class="bg-success text-white px-3 py-1">5 Mars 2025</span>
                        </div>
                        <h5 class="card-title">Nouveau partenariat avec l'industrie</h5>
                        <p class="card-text">L'IUG signe un partenariat stratégique avec plusieurs entreprises leaders du secteur.</p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="#" class="btn btn-link text-success p-0">Lire la suite <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="#" class="btn btn-outline-success">Voir toutes les actualités</a>
        </div>
    </div>
</section>

<!-- Connexion Portal -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="section-title">Plateforme <span class="text-success">IUG Connect</span></h2>
                <p class="lead">Accédez à notre plateforme pédagogique pour une communication efficace entre professeurs et étudiants</p>
                <ul class="list-unstyled feature-list">
                    <li><i class="fas fa-check-circle text-success me-2"></i> Gestion des absences et notifications</li>
                    <li><i class="fas fa-check-circle text-success me-2"></i> Partage de cours et documents pédagogiques</li>
                    <li><i class="fas fa-check-circle text-success me-2"></i> Messagerie interne et forum de discussion</li>
                    <li><i class="fas fa-check-circle text-success me-2"></i> Suivi pédagogique efficace</li>
                </ul>
                <div class="mt-4">
                    <a href="#" class="btn btn-success me-2">Connexion</a>
                    <a href="#" class="btn btn-outline-success">S'inscrire</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow-lg">
                    <div class="card-body p-4">
                        <h4 class="card-title text-center mb-4">Accès rapide</h4>
                        <form>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Votre adresse email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="password" placeholder="Votre mot de passe">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember">Se souvenir de moi</label>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Connexion</button>
                            <div class="text-center mt-3">
                                <a href="#" class="text-success">Mot de passe oublié?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection