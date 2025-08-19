@extends('layouts.app')

@section('title', 'Résultats du Rapport')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Résultats du Rapport</h5>
                    </div>
                    <div class="ibox-content">
                        @if(isset($depenses) && $depenses->isNotEmpty())
                            <div class="table-responsive" id="table-depenses">
                                <h3 class="text-center">Dépenses</h3>
                                <button class="btn btn-primary btn-sm pull-right print-table" data-table="table-depenses">
                                    <i class="fa fa-print"></i> Imprimer
                                </button>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Numéro de Compte</th>
                                        <th>Libellé</th>
                                        <th>Montant</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $totalDepenses = 0; @endphp
                                    @foreach($depenses as $depense)
                                        @php $totalDepenses += $depense->montant; @endphp
                                        <tr>
                                            <td>{{ $depense->numero_compte }}</td>
                                            <td>{{ $depense->libelle }}</td>
                                            <td>{{ number_format($depense->montant, 2, ',', ' ') }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="2" class="text-right">Total</th>
                                        <th>{{ number_format($totalDepenses, 2, ',', ' ') }}</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        @endif

                        @if(isset($entrees) && $entrees->isNotEmpty())
                            <div class="table-responsive" id="table-entrees">
                                <h3 class="text-center">Entrées</h3>
                                <button class="btn btn-primary btn-sm pull-right print-table" data-table="table-entrees">
                                    <i class="fa fa-print"></i> Imprimer
                                </button>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Numéro de Compte</th>
                                        <th>Libellé</th>
                                        <th>Montant</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $totalEntrees = 0; @endphp
                                    @foreach($entrees as $entree)
                                        @php $totalEntrees += $entree->montant; @endphp
                                        <tr>
                                            <td>{{ $entree->numero_compte }}</td>
                                            <td>{{ $entree->libelle }}</td>
                                            <td>{{ number_format($entree->montant, 2, ',', ' ') }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="2" class="text-right">Total</th>
                                        <th>{{ number_format($totalEntrees, 2, ',', ' ') }}</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        @endif

                        @if(isset($salaires) && $salaires->isNotEmpty())
                            <div class="table-responsive" id="table-salaires">
                                <h3 class="text-center">Salaires</h3>
                                <button class="btn btn-primary btn-sm pull-right print-table" data-table="table-salaires">
                                    <i class="fa fa-print"></i> Imprimer
                                </button>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Mois</th>
                                        <th>Salaire Brut</th>
                                        <th>Cotisation Employeur</th>
                                        <th>Salaire Net</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $totalBrut = $totalCotisation = $totalNet = 0;
                                    @endphp
                                    @foreach($salaires as $salaire)
                                        @php
                                            $totalBrut += $salaire->salaire_brut;
                                            $totalCotisation += $salaire->cotisation_employeur;
                                            $totalNet += $salaire->salaire_net;
                                        @endphp
                                        <tr>
                                            <td>{{ $salaire->mois }}</td>
                                            <td>{{ number_format($salaire->salaire_brut, 2, ',', ' ') }}</td>
                                            <td>{{ number_format($salaire->cotisation_employeur, 2, ',', ' ') }}</td>
                                            <td>{{ number_format($salaire->salaire_net, 2, ',', ' ') }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th>{{ number_format($totalBrut, 2, ',', ' ') }}</th>
                                        <th>{{ number_format($totalCotisation, 2, ',', ' ') }}</th>
                                        <th>{{ number_format($totalNet, 2, ',', ' ') }}</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const printButtons = document.querySelectorAll('.print-table');
        const bootstrapCss = "{{ asset('css/bootstrap.css') }}"; // évalué par Blade

        printButtons.forEach(button => {
            button.addEventListener('click', function () {
                const tableId = this.dataset.table;
                const tableContainer = document.getElementById(tableId);
                if (tableContainer) {
                    const tableToPrint = tableContainer.querySelector('table');
                    const title = tableContainer.querySelector('h3').innerText;

                    const newWin = window.open('', title, 'height=600,width=800');

                    newWin.document.write('<html><head><title>' + title + '</title>');
                    newWin.document.write('<link href="' + bootstrapCss + '" rel="stylesheet">');
                    newWin.document.write('<style>body{padding:20px;}</style>');
                    newWin.document.write('</head><body>');
                    newWin.document.write('<h2>' + title + '</h2>');
                    newWin.document.write(tableToPrint.outerHTML);
                    newWin.document.write('</body></html>');

                    newWin.document.close();

                    setTimeout(() => {
                        newWin.print();
                        newWin.close();
                    }, 300);
                }
            });
        });
    });
</script>
@endsection
