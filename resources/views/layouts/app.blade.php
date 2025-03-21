<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'IUG - Plateforme Pédagogique')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<style>
body {
    font-family: 'Montserrat', sans-serif;
}

.section-title {
    position: relative;
    margin-bottom: 1rem;
    font-weight: 700;
}

/* Top Bar */
.top-bar {
    font-size: 0.9rem;
}

.top-bar a:hover {
    opacity: 0.8;
}

/* Navigation */
.navbar {
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.navbar-dark .navbar-nav .nav-link {
    font-weight: 500;
    padding: 0.7rem 1rem;
    transition: all 0.3s ease;
}

.navbar-dark .navbar-nav .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.1);
}

/* Carousel */
.carousel-item {
    height: 600px;
}

.carousel-item img {
    object-fit: cover;
    height: 100%;
    filter: brightness(0.7);
}

.carousel-caption {
    bottom: 20%;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
}

.carousel-caption h2 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

/* Campus Cards */
.campus-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: none;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    overflow: hidden;
}

.campus-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.campus-card img {
    height: 200px;
    object-fit: cover;
}

/* Statistics Block */
.bg-dark {
    background-color: #222 !important;
}

.display-4 {
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 0.5rem;
}

.stats-text {
    font-size: 1rem;
    opacity: 0.9;
}

/* News Cards */
.news-card {
    border: none;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease;
}

.news-card:hover {
    transform: translateY(-5px);
}

.news-card img {
    height: 200px;
    object-fit: cover;
}

.news-date {
    position: relative;
    top: -30px;
    margin-bottom: -15px;
}

/* Feature List */
.feature-list li {
    margin-bottom: 0.8rem;
    font-size: 1.1rem;
}

/* Footer */
footer {
    background-color: #198754 !important;
}

footer a {
    text-decoration: none;
    transition: opacity 0.3s ease;
}

footer a:hover {
    opacity: 0.8;
    text-decoration: underline;
}

/* Buttons */
.btn-success {
    background-color: #198754;
    border-color: #198754;
}

.btn-outline-success {
    color: #198754;
    border-color: #198754;
}

.btn {
    padding: 0.6rem 1.5rem;
    border-radius: 4px;
    font-weight: 500;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .carousel-item {
        height: 400px;
    }
    
    .carousel-caption h2 {
        font-size: 1.8rem;
    }
    
    .display-4 {
        font-size: 2.5rem;
    }
}
 .back-to-top {
            position: fixed;
            bottom: 40px;
            right: 40px;
            width: 50px;
            height: 50px;
            display: none;
            z-index: 1000;
            transition: all 0.3s ease;
            opacity: 0.9;
        }
        .back-to-top:hover {
            opacity: 1;
            transform: translateY(-3px);
        }
        .border-white-10 {
            border-color: rgba(255, 255, 255, 0.1) !important;
        }
</style>

<body>
    <!-- Top Bar -->
 

    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="https://www.remove.bg/images/remove-bg-logo.svg" alt="Remove bg" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">Éliminer l'arrière-plan</a>
                </li>
                <li class="nav-item dropdown mx-2">
                    <a class="nav-link dropdown-toggle" href="#" id="outilsDropdown" role="button" data-bs-toggle="dropdown">
                        Outils
                    </a>
                </li>
                <li class="nav-item dropdown mx-2">
                    <a class="nav-link dropdown-toggle" href="#" id="entreprisesDropdown" role="button" data-bs-toggle="dropdown">
                        Pour Les Entreprises
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">Prix</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item me-2">
                    <a class="nav-link" href="#">Se connecter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-light border rounded-pill px-3" href="#">S'inscrire</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Section principale avec l'image et le formulaire -->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-7 pe-5">
            <div class="position-relative">
                <img src="{{asset('app-assets/images/logo/iug-et.png')}}" alt="Professionnelle avec ordinateur" class="img-fluid rounded position-relative" style="z-index: 2;">
                <div class="position-absolute" style="top: -10%; right: -10%; width: 60%; height: 120%; background-color: #198754; opacity: 0.2; z-index: 1; border-radius: 50%;"></div>
            </div>
            <div class="mt-4">
                <h1 class="display-5 fw-bold text-dark">Apprendre directement en ligne </h1>
                <p class="lead text-dark mt-3">
                    Se connecter et Etudier en ligne <span class="badge rounded-pill px-3 py-2" style="background-color: #198754; color: white;">gratuitement</span>
                </p>
            </div>
        </div>
        <div class="col-lg-5" style="margin-top:150px">
            <div class="card border-0 shadow-sm p-4 mt-5 mb-5" style="border-radius: 15px; margin-top: 120px;">
                <div class="text-center py-4">
                    <a href="#" class="btn btn-success btn-lg px-4 rounded-pill" style="padding-top: 12px; padding-bottom: 12px;">Tester la performance</a>
                    <div class="mt-4 text-muted">
                        <p class="mb-1">connectez vous pour accéder aux cours mise à votre disposition par vos Enseignants</p>
                    </div>
                </div>
            </div>
            <div class="position-relative">
                <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTIwIiBoZWlnaHQ9IjEyMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNNjAgMTEwYzI3LjYxNCAwIDUwLTIyLjM4NiA1MC01MFM4Ny42MTQgMTAgNjAgMTAgMTAgMzIuMzg2IDEwIDYwczIyLjM4NiA1MCA1MCA1MHoiIGZpbGw9Im5vbmUiIHN0cm9rZT0iIzE5ODc1NCIgc3Ryb2tlLXdpZHRoPSI1Ii8+PC9zdmc+" alt="" class="position-absolute" style="right: 0; top: 70%; z-index: -1;">
                <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTAgOTBjNDQuMTgzIDAgODAtMzUuODE3IDgwLTgwIiBmaWxsPSJub25lIiBzdHJva2U9IiMxOTg3NTQiIHN0cm9rZS13aWR0aD0iNSIvPjwvc3ZnPg==" alt="" class="position-absolute" style="right: 30%; top: 30%; z-index: -1;">
            </div>
        </div>
    </div>
</div>

    <!-- Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white text-dark py-5 mt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <img src="{{asset('app-assets/images/logo/iug.png')}}" alt="Image aléatoire" class="mb-3" style="height: 80px;">
                    <address>
                        <p class="mb-1"><i class="fas fa-map-marker-alt me-2"></i> Ndokoti PK 8 BP : 12 489 Douala Cameroun</p>
                        <p class="mb-1"><i class="fas fa-phone me-2"></i> (+237) 33 43 04 52 / 33 37 50 59</p>
                        <p class="mb-1"><i class="fas fa-print me-2"></i> (+237) 33 42 89 02</p>
                        <p class="mb-1"><i class="fas fa-envelope me-2"></i> info@univ-iug.com</p>
                    </address>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="fw-bold mb-4 text-uppercase">Navigation </h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-dark"><i class="fas fa-angle-right me-2"></i>Publication</a></li>
                        <li class="mb-2"><a href="#" class="text-dark"><i class="fas fa-angle-right me-2"></i>Contact</a></li>
                        <li class="mb-2"><a href="#" class="text-dark"><i class="fas fa-angle-right me-2"></i>Connexion</a></li>
                        <li class="mb-2"><a href="#" class="text-dark"><i class="fas fa-angle-right me-2"></i>Inscription</a></li>
                        <li class="mb-2"><a href="#" class="text-dark"><i class="fas fa-angle-right me-2"></i>À Propos</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12">
                    <h5 class="fw-bold mb-4 text-uppercase">Newsletter</h5>
                    <div class="input-group mb-4">
                        <input type="email" class="form-control" placeholder="Subscribe...">
                        <button class="btn btn-warning text-white" type="button">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                    <h5 class="fw-bold mb-3 text-uppercase">Suivez-nous</h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-dark" style="font-size: 1.5rem;">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-dark" style="font-size: 1.5rem;">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-dark" style="font-size: 1.5rem;">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <hr class="my-4 bg-dark opacity-25">
            
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; {{ date('Y') }} Institut Universitaire du Golfe de Guinée - Tous droits réservés.</p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                    <p class="mb-0 small">Réalisé Par <a href="#" class="text-dark fw-bold">Nganso Roberto</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to top button -->
    <a href="#" class="btn btn-success rounded-circle back-to-top shadow-lg d-flex align-items-center justify-content-center">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Show/hide scroll-to-top button
        window.addEventListener('scroll', function() {
            const backToTop = document.querySelector('.back-to-top');
            if (window.scrollY > 300) {
                backToTop.style.display = 'flex';
            } else {
                backToTop.style.display = 'none';
            }
        });

        // Smooth scroll to top
        document.querySelector('.back-to-top').addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</html>