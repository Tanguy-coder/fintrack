@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Liste des unités</h5>
        </div>
        <div class="ibox-content">

            <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
        <tr>
            <th>Libelle</th>
            <th>Montant</th>
            <th>Date</th>
            <th>Type</th>
            <th>Caisse</th>
            <th>Auteur</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($sorties as $sortie)
        <tr class="gradeX">
            <td>{{ $sortie->libelle }}</td>
            <td>{{ number_format($sortie->montant, 2, ',', ' ') }} F CFA</td>
                                <td>{{ \Carbon\Carbon::parse($sortie->date)->format('d/m/Y') }}</td>
            <td>{{ $sortie->typeSortie->libelle }}
            <td>{{ $sortie->caisse->libelle }}
            <td>{{ $sortie->user->name }}</td>

        </tr>
        @endforeach

        </tfoot>
        </table>
            </div>


        </div>
    </div>

</div>
@endsection

@php
    $title = 'Rappoort des dépenses';
    $breadcrumb = [
        ['name' => 'Fintrack', 'url' => '#'],
        ['name' => 'Rapport', 'url' => '']
    ];
@endphp

