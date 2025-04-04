
@if(auth()->user()->role == 'PROFESSEUR')
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                    <span class="brand-logo" style="max-width: 40px; overflow: hidden;">
                        <img style="min-width: 45px;" src="<?= asset('app-assets/images/logo/iug.png') ?>">
                    </span>
                        <h2 class="brand-text text-secondary" style="padding-left: 1.4rem;font-size: 20px; padding-bottom: 10px;">Academia</h2>
                    </a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main mt-2" id="main-menu-navigation" data-menu="menu-navigation" style="font-size: 0.9rem !important;">






                <li id="home" class=" nav-item">
                    <a class="d-flex align-items-center" href="{{route('home')}}">
                        <i data-feather="home"></i>
                        <span class="menu-item" data-i18n="List"> Dashboard</span>
                    </a>
                </li>


                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='book'></i><span class="menu-title text-truncate" data-i18n="User">Cours</span></a>
                    <ul class="menu-content">

                        <li id="add_projet">
                            <a class="d-flex align-items-center" href="{{route('ManagerCour.create')}}">
                                <i data-feather="plus"></i>
                                <span class="menu-item" data-i18n="List">
                                    Créer un Cour
                                </span>
                            </a>
                        </li>


                        <li id="list_projet">
                            <a class="d-flex align-items-center" href="{{route('ManagerCour.index')}}">
                                <i data-feather="list"></i>
                                <span class="menu-item" data-i18n="Edit">
                                    Mes des Cours
                                </span>
                            </a>
                        </li>
                        <br>
                    </ul>
                </li>

                {{-- <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='layers'></i><span class="menu-title text-truncate" data-i18n="User">Tâches</span></a>
                    <ul class="menu-content">

                        <li id="add_tache">
                            <a class="d-flex align-items-center" href="#">
                                <i data-feather="list"></i>
                                <span class="menu-item" data-i18n="List">
                                    Ajouter
                                </span>
                            </a>
                        </li>


                        <li id="list_tache">
                            <a class="d-flex align-items-center" href="#">
                                <i data-feather="list"></i>
                                <span class="menu-item" data-i18n="Edit">
                                    List
                                </span>
                            </a>
                        </li>
                        <br>
                    </ul>
                </li> --}}

            </ul>
        </div>
    </div>
@endif





@if(auth()->user()->role == 'ADMIN')
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                    <span class="brand-logo" style="max-width: 40px; overflow: hidden;">
                        <img style="min-width: 45px;" src="<?= asset('app-assets/images/logo/iug.png') ?>">
                    </span>
                        <h2 class="brand-text text-secondary" style="padding-left: 1.4rem;font-size: 20px; padding-bottom: 10px;">Academia</h2>
                    </a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main mt-2" id="main-menu-navigation" data-menu="menu-navigation" style="font-size: 0.9rem !important;">






                <li id="home" class=" nav-item">
                    <a class="d-flex align-items-center" href="{{route('home')}}">
                        <i data-feather="home"></i>
                        <span class="menu-item" data-i18n="List"> Dashboard</span>
                    </a>
                </li>


                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='user'></i></i><span class="menu-title text-truncate" data-i18n="User">Gestion Professeur</span></a>
                    <ul class="menu-content">

                        <li id="add_professeur">
                            <a class="d-flex align-items-center" href="{{route('ManagerProfessor.create')}}">
                                <i data-feather="plus"></i>
                                <span class="menu-item" data-i18n="List">
                                    Ajouter
                                </span>
                            </a>
                        </li>


                        <li id="list_professeur">
                            <a class="d-flex align-items-center" href="{{route('ManagerProfessor.index')}}">
                                <i data-feather="list"></i>
                                <span class="menu-item" data-i18n="Edit">
                                    List
                                </span>
                            </a>
                        </li>

                        <li id="associer_prof" class=" nav-item">
                                <a class="d-flex align-items-center" href="{{route('FiliereProfesseur.showAttributionForm')}}">
                                    <i data-feather="git-commit"></i>
                                    <span class="menu-item" data-i18n="List"> Attribuer une Filière</span>
                                </a>
                            </li>
                        <br>
                    </ul>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='user'></i></i><span class="menu-title text-truncate" data-i18n="User">Gestion Etudiant</span></a>
                    <ul class="menu-content">

                        <li id="add_etudiant">
                            <a class="d-flex align-items-center" href="{{route('ManagerEtudiant.create')}}">
                                <i data-feather="plus"></i>
                                <span class="menu-item" data-i18n="List">
                                    Ajouter
                                </span>
                            </a>
                        </li>


                        <li id="list_etudiant">
                            <a class="d-flex align-items-center" href="{{route('ManagerEtudiant.index')}}">
                                <i data-feather="list"></i>
                                <span class="menu-item" data-i18n="Edit">
                                    List
                                </span>
                            </a>
                        </li>
                        <br>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
@endif


@if(auth()->user()->role == 'ETUDIANT')
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                    <span class="brand-logo" style="max-width: 40px; overflow: hidden;">
                        <img style="min-width: 45px;" src="<?= asset('app-assets/images/logo/iug.png') ?>">
                    </span>
                        <h2 class="brand-text text-secondary" style="padding-left: 1.4rem;font-size: 20px; padding-bottom: 10px;">Academia</h2>
                    </a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main mt-2" id="main-menu-navigation" data-menu="menu-navigation" style="font-size: 0.9rem !important;">

                <li id="home" class=" nav-item">
                    <a class="d-flex align-items-center" href="{{route('home')}}">
                        <i data-feather="home"></i>
                        <span class="menu-item" data-i18n="List"> Dashboard</span>
                    </a>
                </li>


                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='book'></i></i><span class="menu-title text-truncate" data-i18n="User">Mes cours</span></a>
                    <ul class="menu-content">

                        <li id="add_professeur">
                            <a class="d-flex align-items-center" href="#">
                                <i data-feather="book"></i>
                                <span class="menu-item" data-i18n="List">
                                    Aller cours
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>



            </ul>
        </div>
    </div>
@endif
