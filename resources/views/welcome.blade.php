@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tableau de bord</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="widget style1 navy-bg">
                            <div class="row">
                                <div class="col-xs-2">
                                    <i class="fa fa-money fa-2x"></i>
                                </div>
                                <div class="col-xs-10 text-right">
                                    <span>Montant jour</span>
                                    <h3 class="font-bold">
                                        {{ number_format($depAuj, 2, ',', ' ') }} FCFA
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="widget style1 lazur-bg">
                            <div class="row">
                                <div class="col-xs-2">
                                    <i class="fa fa-money fa-2x"></i>
                                </div>
                                <div class="col-xs-10 text-right">
                                    <span>Montant mois</span>
                                    <h3 class="font-bold">
                                        {{ number_format($depMois, 2, ',', ' ') }} FCFA
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="widget style1 yellow-bg">
                            <div class="row">
                                <div class="col-xs-2">
                                    <i class="fa fa-money fa-2x"></i>
                                </div>
                                <div class="col-xs-10 text-right">
                                    <span>Montant Année</span>
                                    <h3 class="font-bold">
                                        {{ number_format($depAnnee, 2, ',', ' ') }} FCFA
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="widget style1 red-bg">
                            <div class="row">
                                <div class="col-xs-2">
                                    <i class="fa fa-money fa-2x"></i>
                                </div>
                                <div class="col-xs-10 text-right">
                                    <span>Montant total</span>
                                    <h3 class="font-bold">
                                        {{ number_format($depTotal, 2, ',', ' ') }} FCFA
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Graphique des dépenses par mois</h5>
                            </div>
                            <div class="ibox-content">
                                <div>
                                    <canvas id="depensesChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Liens rapides</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <a href="{{ route('rapports.index') }}" class="btn btn-primary btn-block">
                                            <i class="fa fa-file-text"></i> Voir les rapports
                                        </a>
                                    </div>
                                    <div class="col-lg-3">
                                        <a href="{{ route('sorties.create') }}" class="btn btn-success btn-block">
                                            <i class="fa fa-plus"></i> Ajouter une dépense
                                        </a>
                                    </div>
                                    <div class="col-lg-3">
                                        <a href="{{ route('users.index') }}" class="btn btn-info btn-block">
                                            <i class="fa fa-users"></i> Gérer les utilisateurs
                                        </a>
                                    </div>
                                    <div class="col-lg-3">
                                        <a href="{{ route('salaires.index') }}" class="btn btn-secondary btn-block">
                                            <i class="fa fa-plus"></i> Gérer les salaires
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
$(document).ready(function () {
    var ctx = document.getElementById('depensesChart').getContext('2d');
    var depensesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($chartLabels) !!},
            datasets: [{
                label: 'Dépenses par mois',
                data: {!! json_encode($chartData) !!},
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Mois'
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Montant (FCFA)'
                    }
                }
            }
        }
    });
});
</script>
@endsection
