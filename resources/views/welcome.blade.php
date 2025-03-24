@extends('layouts.app')

@section('title', 'IUG - Institut Universitaire du Golfe de Guinée')

@section('content')

  
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-7 pe-5">
                <div class="position-relative">
                    <img src="{{asset('app-assets/images/logo/iug-et.png')}}" alt="Professionnelle avec ordinateur" class="img-fluid rounded position-relative" style="z-index: 2;">
                    <div class="position-absolute" style="top: -10%; right: -10%; width: 80%; height: 140%; background-color: #198754; opacity: 0.2; z-index: 1; border-radius: 50%;"></div>
                </div>
            </div>
            <div class="col-lg-5" style="margin-top:150px">
                <div class="card border-0 shadow-sm p-4 mt-5 mb-5" style="border-radius: 15px; margin-top: 120px;">
                    <div class="text-center py-4">
                        <a href="#" class="btn btn-success btn-sm px-4 rounded-pill" style="padding-top: 12px; padding-bottom: 12px;">Optimisez votre réussite académique.</a>
                        <div class="mt-4 text-muted">
                            <p class="mb-1">Découvrez vos cours et interagissez avec vos enseignants.</p>
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


    <section class="py-5 bg-success text-white mt-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-6 col-md-3 mb-4" data-aos="zoom-in" data-aos-duration="800">
                    <div class="display-4 fw-bold mb-2">
                       + <span class="counter" data-target="15">25 ans</span>                    
                    </div>
                    <p class="fs-5">Années d’experience dans l’enseignement</p>
                </div>

                <div class="col-6 col-md-3 mb-4" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="200">
                    <div class="display-4 fw-bold mb-2">
                        + <span class="counter" data-target="25">90</span>
                    </div>
                    <p class="fs-5"> Enseignants et personnels qualifiés</p>
                </div>

                <div class="col-6 col-md-3 mb-4" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="400">
                    <div class="display-4 fw-bold mb-2">
                      + <span class="counter" data-target="10">90</span>
                    </div>
                    <p class="fs-5">Salles de cours et un amphi de 700 places</p>
                </div>

                <div class="col-6 col-md-3 mb-4" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="600">
                    <div class="display-4 fw-bold mb-2">
                        + <span class="counter" data-target="95">5000</span>
                    </div>
                    <p class="fs-5">Etudiants inscrits chaque années</p>
                </div>
            </div>
        </div>
    </section>

   
    <!-- Services Section -->
    <section id="services" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Nos <span class="text-warning">Campus</span></h2>
                <div class="border-bottom border-warning mx-auto mb-3" style="width: 80px; height: 3px;"></div>
                <p class="lead mx-auto" style="max-width: 700px;">Retrouvez la liste de toutes nos écoles dans l'ensemble du territoire national</p>
            </div>
    
            <div class="row g-4">
                <!-- Service Card 1 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100 border-0 shadow service-card">
                        <div class="card-body p-4">
                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 80px; height: 80px;">
                                <img src="{{asset('app-assets/images/logo/esg.png')}}" alt="Professionnelle avec ordinateur" class="img-fluid rounded position-relative" style="z-index: 2;">
                            </div>
                            <h5 class="card-title fw-bold mb-3 text-center">ESG</h5>
                            <p class="card-text text-muted mb-3 text-center">ESG (école supérieure de gestion) est une école de l'institut universitaire du golfe de guinée qui offre des formations en cycle BTS et HND dans les filières de Gestion, Commerce-vente, Information et communication,</p>
                            <div class="text-center mt-auto">
                                <a href="#" class="btn btn-outline-warning rounded-pill px-4">
                                    En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Service Card 2 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card h-100 border-0 shadow service-card">
                        <div class="card-body p-4">
                            <div class="rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 80px; height: 80px;">
                                <img src="{{asset('app-assets/images/logo/ista.png')}}" alt="Professionnelle avec ordinateur" class="img-fluid rounded position-relative" style="z-index: 2;">
                            </div>
                            <h5 class="card-title fw-bold mb-3 text-center">ISTA</h5>
                            <p class="card-text text-muted mb-3 text-center">ISTA (Institut Supérieur des Technologies appliquées) est une école qui promeut les spécialités industrielles et technologiques tel que Génie civil, Génie électrique etc... en cours du jour et du soir pour le cycle BTS, HND.&nbsp;Des laboratoires et...</p>
                            <div class="text-center mt-auto">
                                <a href="#" class="btn btn-outline-warning rounded-pill px-4">
                                    En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Service Card 3 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card h-100 border-0 shadow service-card">
                        <div class="card-body p-4">
                            <div class="rounded-circle bg-info bg-opacity-10 d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 80px; height: 80px;">
                                <img src="{{asset('app-assets/images/logo/isa.png')}}" alt="Professionnelle avec ordinateur" class="img-fluid rounded position-relative" style="z-index: 2;">
                            </div>
                            <h5 class="card-title fw-bold mb-3 text-center">ISA</h5>
                            <p class="card-text text-muted mb-3 text-center">ISA est une école de l'institut universitaire du golfe de guinée spécialisé dans les formations en science de la santé (sciences infirmières, kinésithérapie, sage-femme, radiologie et imagerie...) en cycle BTS et HND.&nbsp;Bâtiment de haut standing,...</p>
                            <div class="text-center mt-auto">
                                <a href="#" class="btn btn-outline-warning rounded-pill px-4">
                                    En savoir plus <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-5" data-aos="fade-up">
                <a href="#" class="btn btn-primary rounded-pill px-5 py-2">Voir tous les campus</a>
            </div>
        </div>
    </section>

    
    <!-- Hero Section -->
    <!-- Section Communication Pédagogique -->
    <section id="accueil" class="bg-success bg-gradient text-white py-5 py-md-6">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-5 mb-md-0" data-aos="fade-right" data-aos-duration="1000">
                    <h1 class="display-4 fw-bold mb-4">Votre réussite, notre mission.</h1>
                    <p class="fs-5 mb-4">Une plateforme pédagogique moderne facilitant la communication entre étudiants et professeurs pour un apprentissage efficace et personnalisé.</p>
                    <div class="d-flex flex-column flex-sm-row gap-3">
                        <a href="#connexion" class="btn btn-light text-success rounded-pill px-4 py-2 fw-medium animate__animated animate__pulse animate__infinite">
                            Se connecter
                        </a>
                        <a href="#fonctionnalites" class="btn btn-outline-light rounded-pill px-4 py-2 fw-medium">
                            Fonctionnalités
                        </a>
                    </div>
                    <div class="row mt-5 text-center">
                        <div class="col-4">
                            <div class="fs-3 fw-bold">50+</div>
                            <div class="small">Professeurs</div>
                        </div>
                        <div class="col-4">
                            <div class="fs-3 fw-bold">2000+</div>
                            <div class="small">Étudiants</div>
                        </div>
                        <div class="col-4">
                            <div class="fs-3 fw-bold">30+</div>
                            <div class="small">Filières</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left" data-aos-duration="1000">
                    <img src="https://img.freepik.com/free-vector/online-learning-isometric-concept_1284-17947.jpg" alt="Communication pédagogique" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    

    <!-- Connexion Portal -->
   <section class="py-5 bg-light" id="fonctionnalites">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="800">
                    <h2 class="section-title">Plateforme <span class="text-success">Academia IUG</span></h2>
                    <p class="lead">Accédez à notre plateforme pédagogique pour une communication efficace entre professeurs et étudiants</p>
                    <ul class="list-unstyled feature-list">
                        <li class="mb-3" data-aos="fade-up" data-aos-delay="100">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="bg-success bg-opacity-10 rounded-circle p-2">
                                        <i class="fas fa-bell text-success"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold">Gestion des absences et notifications</h5>
                                    <p class="text-muted">Suivez les présences et recevez des alertes en temps réel</p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-3" data-aos="fade-up" data-aos-delay="200">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="bg-success bg-opacity-10 rounded-circle p-2">
                                        <i class="fas fa-book text-success"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold">Partage de cours et documents pédagogiques</h5>
                                    <p class="text-muted">Accédez à tous vos supports de cours en un seul endroit</p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-3" data-aos="fade-up" data-aos-delay="300">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="bg-success bg-opacity-10 rounded-circle p-2">
                                        <i class="fas fa-comments text-success"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold">Messagerie interne et forum de discussion</h5>
                                    <p class="text-muted">Communiquez facilement avec vos professeurs et camarades</p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-3" data-aos="fade-up" data-aos-delay="400">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <div class="bg-success bg-opacity-10 rounded-circle p-2">
                                        <i class="fas fa-chart-line text-success"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold">Suivi pédagogique efficace</h5>
                                    <p class="text-muted">Visualisez votre progression et vos résultats académiques</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="800">
                    <div class="position-relative">
                        <img src="https://img.freepik.com/free-vector/online-learning-concept-illustration_114360-4735.jpg" alt="Plateforme Academia" class="img-fluid rounded-lg shadow-lg">
                        <div class="position-absolute top-0 end-0 mt-n4 me-n4">
                            <img src="https://img.freepik.com/free-vector/mobile-learning-concept-illustration_114360-4711.jpg" alt="Mobile Learning" class="img-fluid rounded shadow-lg" style="width: 180px;" data-aos="zoom-in" data-aos-delay="300">
                        </div>
                        <div class="position-absolute bottom-0 start-0 mb-n4 ms-n4">
                            <div class="bg-white rounded-lg shadow-lg p-3" data-aos="zoom-in" data-aos-delay="500">
                                <div class="d-flex align-items-center">
                                    <div class="bg-success rounded-circle p-2 text-white">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="fw-bold mb-0">+85%</h6>
                                        <small class="text-muted">Taux de réussite</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @section('scripts')

    <script>

        
        
    </script>
    @endsection
@endsection
