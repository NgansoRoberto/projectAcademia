@extends('layouts_comptes.app')

@section('contenu')

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class=" float-left mb-0">Statistiques générales</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">


                 <!-- Line Chart Card -->
                 <div class="row">
                    <div class="col-lg-6 col-sm-6  col-12">
                        <div class="card">
                            <div class="card-header align-items-start pb-0">
                                <div>
                                    <h2 class="font-weight-bolder">
                                        {{-- {{ formatMontant($recettes) }}  --}} 0 XAF
                                    </h2>
                                    <h3 class="card-text">Recette totale</h3>
                                </div>
                                <div class="avatar bg-light-success p-50">
                                    <div class="avatar-content">
                                        <i data-feather="dollar-sign" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 20px"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6  col-12">
                        <div class="card">
                            <div class="card-header align-items-start pb-0">
                                <div>
                                    <h2 class="font-weight-bolder">
                                        {{-- {{ $nombre_ventes }} --}} 0
                                    </h2>
                                    <h3 class="card-text">Nombre ventes</h3>
                                </div>

                                <div class="avatar bg-light-warning p-50">
                                    <div class="avatar-content">
                                        <i data-feather="dollar-sign" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 20px"></div>
                        </div>
                    </div>

                </div>
                <!--/ Line Chart Card -->


                <div class="row match-height">

                    <!-- Goal Overview Card -->
                    <a href="#" class="col-lg-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title"> Statistiques stock </h4>
                                <i data-feather="slack" class="font-medium-3 text-muted cursor-pointer"></i>
                            </div>
                            <div class="card-body p-0">
                                {{-- <br><br>
                                <center><h2>{{ $nbre_bouteilles_en_stock }} Elements en stock</h2></center>
                                <br><br> --}}
                                <div class="row border-top text-center mx-0">
                                    <div class="col-6 border-right py-1 text-warning">
                                        <p class="card-text mb-0">Produits </p>
                                        <h3 class="font-weight-bolder text-warning mb-0">
                                            {{-- {{$nombre_de_vins}} --}}
                                        </h3>
                                    </div>
                                    <div class="col-6 py-1">
                                        <p class="card-text mb-0 text-success"> Marques </p>
                                        <h3 class="font-weight-bolder mb-0 text-success">
                                            {{-- {{ $nombre_de_marques }} --}}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!--/ Goal Overview Card -->

                    <!-- Transaction Card -->
                    <div class="col-lg-6 col-12">
                        <div class="card card-transaction">
                            <div class="card-header">
                                <h4 class="card-title">Statistiques sur les ventes</h4>
                                <div class="dropdown chart-dropdown">
                                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-toggle="dropdown"></i>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Hier</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Ce mois</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Mois précédent</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">


                                <div class="transaction-item">
                                    <div class="media">
                                        <div class="avatar bg-light-danger rounded">
                                            <div class="avatar-content">
                                                <i data-feather="alert-triangle" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="transaction-title">Le meilleur commercial</h6>
                                            <small>plus gros C.A (chiffre d'affaire)</small>
                                        </div>
                                    </div>
                                    <div class="font-weight-bolder text-danger">
                                       ...
                                    </div>
                                </div>
                                <div class="transaction-item">
                                    <div class="media">
                                        <div class="avatar bg-light-success rounded">
                                            <div class="avatar-content">
                                                <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="transaction-title">La meilleure vente</h6>
                                            <small>la vente qui a fait entrer le plus d'argent</small>
                                        </div>
                                    </div>
                                    <div class="font-weight-bolder text-success">
                                        ...
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Transaction Card -->
                </div>



            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
@section('javascript')


<script>

        @if(session()->has('toast'))
            toastr['{{ session('toast.type') }}']('{{ session('toast.message') }}', 'Connecter', {
                closeButton: true,
                tapToDismiss: false,
                rtl: false
            });
        @endif
    // document.getElementById('home').className += 'active'
</script>
@endsection
