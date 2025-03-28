
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                <span class="brand-logo" style="max-width: 40px; overflow: hidden;">
                            <img style="min-width: 45px;" src="<?= asset('app-assets/images/logo/honowaTech.png') ?>">
                </span>
                    <h2 class="brand-text text-primary" style="padding-left: 1.4rem;font-size: 20px; padding-bottom: 10px;">HERP</h2>
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


            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='slack'></i><span class="menu-title text-truncate" data-i18n="User">Projets</span></a>
                <ul class="menu-content">

                    <li id="add_projet">
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather="list"></i>
                            <span class="menu-item" data-i18n="List">
                                Ajouter
                            </span>
                        </a>
                    </li>


                    <li id="list_projet">
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather="list"></i>
                            <span class="menu-item" data-i18n="Edit">
                                List
                            </span>
                        </a>
                    </li>
                    <br>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='layers'></i><span class="menu-title text-truncate" data-i18n="User">Tâches</span></a>
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
            </li>



        </ul>
    </div>
</div>
<!-- END: Main Menu-->

