<?php
use Illuminate\Support\Facades\Auth;

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Shop manager vous permet de gérer votre boutique de manière optimale. Par Honowa Technologies">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Herp</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    {{-- DATE PICKER --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    {{-- DATE PICKER --}}

    {{-- SELECT 2 --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    {{-- SELECT 2 --}}

    {{-- LES 2 PAGES STATS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- LES 2 PAGES STATS --}}

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-pickadate.css') }}">

    <!-- END: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/dashboard-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/charts/chart-apex.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- END: Custom CSS-->

    <style>
     body {
            font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        
    </style>

    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('app-assets/images/logo/honowaTech.png') }}">

    @yield('css')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="hover" data-menu="vertical-menu-modern" data-col="" <?php if(session()->has('message')){ ?> onload="success()" <?php } ?>>

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
        <div class="navbar-container d-flex content">
            <!-- change langue -->
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
            </div>
      
            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>

            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item dropdown dropdown-user" data-menu="dropdown">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name font-weight-bolder">{{Auth::user()->name}}</span>
                            <span class="user-status badge badge-light-dark round">{{Auth::user()->type}}</span>
                        </div>
                        <span data-toggle="tooltip" data-placement="bottom" title="options" class="avatar">
                            <span class="avatar-content bg-dark" style="width:37px; height:37px;">
                                @php
                                    $nom = get_initials(Auth::user()->name);
                                    echo "<span class='text-light'> $nom </span>"
                                @endphp
                            </span>
                            <span class="avatar-status-online"></span>
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="#"> <i class="mr-50" data-feather="user"></i> Profile</a>
                        <a class="dropdown-item" href="#"> <i class="mr-50" data-feather="settings"></i> Settings</a>

                        <form id="logout-form2" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" data-toggle="tooltip" data-placement="bottom" title="Disconnect" type="submit">
                                <i class="mr-50" data-feather="power"></i> Logout
                            </button>
                        </form>

                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-icon" id="logout-button" data-toggle="tooltip" data-placement="bottom" title="Disconnect" style="margin-bottom:0px !important;">
                                    <i class="redable" data-feather="power" style="width: 25px; height: 25px"></i>
                                </button>
                            </form>
                        </li>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="text-center" hidden id="spinner">
        <div class="col-12 text-center">
            <div class="spinner-border text-dark" role="status">
                <span class="sr-only"></span>
            </div>
        </div>
    </div>
    <!-- END: Header-->

    @include('includes/menu_comptes')

    <!-- BEGIN: Content-->
    @yield('contenu')
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
  
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    {{-- COMMONS JS --}}
    {{-- <script src="{{asset('app-assets/vendors/js/jquery/jquery.min.js')}}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- <script src="{{asset('app-assets/vendors/js/bootstrap/bootstrap.min.js')}}"></script> --}}
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/ui/jquery.sticky.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->
    {{-- COMMONS JS --}}

    {{-- DATEPICKER JS --}}
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page Vendor JS-->

    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <!-- END: Page Vendor JS-->
    {{-- DATEPICKER JS --}}

    <script src="{{ asset('app-assets/vendors/js/forms/cleave/cleave.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/cleave/addons/cleave-phone.cm.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-input-mask.js') }}"></script>

    {{-- SELECT 2 JS --}}
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-select2.js') }}"></script>
    {{-- SELECT 2 JS --}}

    {{-- MODALES SWEET ALERS --}}
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    {{-- MODALES SWEET ALERS --}}

    {{-- DATATABLE  --}}
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    {{-- DATATABLE  --}}

    <!-- BEGIN: Page Vendor JS-->
    {{-- <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('app-assets/js/scripts/extensions/ext-component-sweet-alerts.js') }}"></script> --}}
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <!-- END: Theme JS-->

    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>

    {{-- <script src="{{ asset('print.min.js') }}"></script> --}}

    @yield('javascript')
    <script>
        document.getElementById('logout-button').addEventListener('click', function(event) {
            event.preventDefault(); // Empêche le comportement par défaut du lien

            Swal.fire({
                icon: 'warning',
                title: 'You are about to log out',
                text: 'Are you sure you want to continue ?',
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
                reverseButtons: false, // Garde le bouton de confirmation à droite
                customClass: {
                    cancelButton: 'btn btn-secondary ml-2',
                    confirmButton: 'btn btn-primary ml-2'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    // Soumettre le formulaire de déconnexion
                    document.getElementById('logout-form').submit();
                }
            });
        });

        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })

        const element = document.querySelector('body');

        function hasVerticalScrollbar(element) {
            return element.scrollHeight > element.clientHeight;
        }

        if (!hasVerticalScrollbar(element)) {
            footer.classList.remove('footer-hidden');
        }
        
        window.addEventListener('scroll', function() {
            const footer = document.querySelector('footer');
            const windowHeight = window.innerHeight;
            const documentHeight = document.documentElement.scrollHeight;
            const scrollTop = window.scrollY;

            if (scrollTop + windowHeight >= documentHeight) {
                footer.classList.remove('footer-hidden');
                footer.classList.remove('footer-fixed');
                footer.classList.add('footer-relative');
            }
        });

        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
            
            @if(session()->has('message'))
                toastr['success'](
                    "{!!session()->get('message')!!}",
                    'Succès',
                    {
                        closeButton: true,
                        tapToDismiss: true
                    }
                );
            @endif
        })
        
        function confirmation(message = 'Confirmer ?',id_form = undefined) {
            Swal.fire({
                icon: 'warning',
                html: '<h4 class="text-center my-1">'+message+'<h4>',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: true, // Don't autofocus the confirm button
                confirmButtonText: feather.icons['check'].toSvg({ class: 'font-medium-2' }),
                cancelButtonText: feather.icons['x'].toSvg({ class: 'font-medium-2' }),
                allowOutsideClick: true,
                customClass: {
                    confirmButton: 'btn btn-success mx-auto my-1',
                    cancelButton: 'btn btn-danger mx-auto my-1'
                },
                showClass: {
                    popup: 'animate__animated animate__bounceIn'
                },
                buttonsStyling: false,
                preConfirm: (result) => {
                    return result.isConfirmed;
                }
            })
            .then((result) => {
                if (result.isConfirmed) {
                    if (id_form != undefined) {
                        $('#'+id_form).submit();
                    }
                }
            });
        }
    </script>
</body>
<!-- END: Body-->

</html>