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

         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <!-- AOS CSS -->
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        
        
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

        /* Navigation */
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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

        /* Back to top button */
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

        /* Animation */
        .pulse-anim {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }

        .menu-item {
            transition: all 0.3s ease;
        }

        .menu-item:hover {
            color: #3b82f6;
            transform: translateX(5px);
        }
         .service-card:hover {
            cursor: pointer;
            transition: all 0.3s ease;
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .no-focus-outline:focus {
            box-shadow: none !important;
            outline: none !important;
        }

                /* Animation */
        .pulse-anim {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }

        .menu-item {
            transition: all 0.3s ease;
        }

        .menu-item:hover {
            color: #3b82f6;
            transform: translateX(5px);
        }
        
        /* Theme Selector */
        .theme-toggle {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            transition: all 0.3s ease;
        }
        
        .theme-toggle:hover {
            background-color: #e9ecef;
        }
        
        .theme-toggle .theme-icon {
            font-size: 1rem;
            color: #6c757d;
        }
        
        /* Dark Theme Styles */
        body.dark-theme {
            background-color: #121212;
            color: #e0e0e0;
        }
        
        body.dark-theme .navbar,
        body.dark-theme .card,
        body.dark-theme footer,
        body.dark-theme .bg-white,
        body.dark-theme .bg-light {
            background-color: #1e1e1e !important;
            color: #e0e0e0;
        }
        
        body.dark-theme .text-dark,
        body.dark-theme .nav-link,
        body.dark-theme h1, 
        body.dark-theme h2, 
        body.dark-theme h3, 
        body.dark-theme h4, 
        body.dark-theme h5, 
        body.dark-theme h6,
        body.dark-theme .card-title,
        body.dark-theme footer a.text-dark {
            color: #e0e0e0 !important;
        }
        
        body.dark-theme .border,
        body.dark-theme .border-top,
        body.dark-theme .border-bottom,
        body.dark-theme .border-start,
        body.dark-theme .border-end {
            border-color: #333 !important;
        }
        
        body.dark-theme .form-control,
        body.dark-theme .input-group-text {
            background-color: #2d2d2d;
            border-color: #444;
            color: #e0e0e0;
        }
        
        body.dark-theme .btn-light {
            background-color: #333;
            border-color: #444;
            color: #e0e0e0;
        }
        
        body.dark-theme .text-muted {
            color: #adb5bd !important;
        }
        
         .service-card:hover {
            cursor: pointer;
            transition: all 0.3s ease;
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>

    <body>
        <!-- Top Bar -->
    

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('app-assets/images/logo/iug.png')}}" alt="Image aléatoire" class="mb-3" style="height: 80px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">Nos campus</a>
                        </li>
                       <li class="nav-item mx-2">
                            <a class="nav-link" href="#">A propos</a>
                        </li>
                         <li class="nav-item mx-2">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="{{route('Publication')}}">Publications</a>
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
                    <div class="dropdown theme-selector ms-4">
                        <button class="btn btn-sm rounded-circle theme-toggle" type="button" id="themeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-moon theme-icon"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="themeDropdown">
                            <li><button class="dropdown-item" data-theme="system"><i class="fas fa-laptop me-2"></i>Système</button></li>
                            <li><button class="dropdown-item" data-theme="light"><i class="fas fa-sun me-2"></i>Clair</button></li>
                            <li><button class="dropdown-item" data-theme="dark"><i class="fas fa-moon me-2"></i>Sombre</button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>


      

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
                         <p class="text-muted mb-3">Ne manquez aucune de nos mises à jour</p>
                        <div class="input-group mb-4 shadow-sm">
                            <input type="email" class="form-control border-end-0 py-2 no-focus-outline" placeholder="Votre adresse email" aria-label="Votre adresse email">
                            <span class="input-group-text bg-white border-start-0 pe-0">
                                <button class="btn btn-success rounded-pill px-3 shadow-sm" type="button">
                                    Envoyer <i class="fas fa-paper-plane ms-1"></i>
                                </button>
                            </span>
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
        @yield('scripts')

        <!-- Back to top button -->
        <a href="#" class="btn btn-success rounded-circle back-to-top shadow-lg d-flex align-items-center justify-content-center">
            <i class="fas fa-arrow-up"></i>
        </a>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
         <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        
        <script>

            // Initialize AOS
            AOS.init({
                once: false,
                mirror: true,
                duration: 800,
                offset: 120,
                easing: 'ease-in-out'
            });
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

            // fonctionalité pour changer le theme  
            document.addEventListener('DOMContentLoaded', function() {
                // Get theme buttons
                const themeButtons = document.querySelectorAll('[data-theme]');
                const themeIcon = document.querySelector('.theme-icon');
                
                // Check for saved theme preference or respect OS preference
                const savedTheme = localStorage.getItem('theme') || 'system';
                
                // Apply theme on page load
                applyTheme(savedTheme);
                
                // Add click event to theme buttons
                themeButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        const theme = button.getAttribute('data-theme');
                        localStorage.setItem('theme', theme);
                        applyTheme(theme);
                    });
                });
                
                // Function to apply theme
                function applyTheme(theme) {
                    if (theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                        document.body.classList.add('dark-theme');
                        themeIcon.classList.remove('fa-moon');
                        themeIcon.classList.add('fa-sun');
                    } else {
                        document.body.classList.remove('dark-theme');
                        themeIcon.classList.remove('fa-sun');
                        themeIcon.classList.add('fa-moon');
                    }
                }
                
                // Listen for OS theme changes if using system preference
                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                    if (localStorage.getItem('theme') === 'system') {
                        applyTheme('system');
                    }
                });
            });

            
        </script>

    </body>
</html>