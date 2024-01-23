@extends("include.layoute")
@section('title',"Dashboard")
@section('content')
<div class="container-fluid">


    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Nombre du Produits</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col">
                                        {{ $nombreProduits }}
                                </div>
                                </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-tasks" aria-hidden="true"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Nombre de Maintenances</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col">
                                {{ $nombreMaintenances }}
                            </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-building" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Nombre de Bureaux
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col">
                                    {{ $nombreBureaux }}
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-desktop" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Quantité inférieure à 10 pour le nombre de produits : </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col">
                                {{$nombre_produits_en_moins_de_10}}
                            </div>
                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">
<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Demande par mois :</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="myAreaChart" class="mt-1"></canvas>
            </div>
        </div>
    </div>
</div>


        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Les categories</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart" data-categories="{{ json_encode($productsByCategory, JSON_HEX_APOS) }}"></canvas>
                    </div>
                    <div id="legend-container"></div>
                </div>

            </div>
        </div>
        <div class="row">
            
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
    <script>
        var demandesParMois = {!! json_encode($demandes_data, JSON_HEX_APOS) !!};
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.11.0/chart.min.js"></script>

</div>
@endsection
