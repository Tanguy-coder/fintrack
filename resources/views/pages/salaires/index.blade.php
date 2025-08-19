@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="float-right mb-1">
            <a href="{{ route('salaires.create') }}" class="btn btn-primary btn-xs pull-right">
                <li class="fa fa-plus"></li> Ajouter
            </a>
        </div>
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Salaires</h5>
        </div>
        <div class="ibox-content">

            <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
        <tr>
            <th>Matricule</th>
            <th>Nom & Prénom</th>
            <th>Entite</th>
            <th>Salaire brut</th>
            <th>Cotisation Employé</th>
            <th>Cotisation Employeur</th>
            <th>Salaire net</th>
            <th>Mois</th>
            <th>Date</th>
            <th>Mode de paiement</th>
            <th>Référence de paiement</th>
            <th>Observation</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($salaires as $salaire)
        <tr class="gradeX">
            <td>{{ $salaire->employe->matricule }}</td>
            <td>{{ $salaire->employe->getFullNameAttribute() }}</td>
            <td>{{ $salaire->assurance->nom }}</td>
            <td>{{ number_format($salaire->salaire_brut, 2) }}</td>
            <td>{{ number_format($salaire->cotisations_employe, 2) }}</td>
            <td>{{ number_format($salaire->cotisations_employeur, 2) }}</td>
            <td>{{ number_format($salaire->salaire_net, 2) }}</td>
            <td>{{ $salaire->date_to_mois() }}</td>
            <td>{{ $salaire->date_paiement }}</td>
            <td>{{ $salaire->mode_paiement_libelle  }}</td>
            <td>{{ $salaire->reference_paiement }}</td>
            <td>{{ $salaire->note }}</td>

            <td class="center">
                    <a href="#" class="btn btn-primary btn-xs">
                        <li class="fa fa-edit"></li>
                    </a>
                    <a href="{{ route('salaires.print', $salaire->token) }}" class="btn btn-success btn-xs">
                        <li class="fa fa-print"></li>
                    </a>
            </td>
        </tr>
        @endforeach

        </tbody>
        </table>
            </div>


        </div>
    </div>

</div>
@endsection

@php
    $title = 'Dashboard';
    $breadcrumb = [
        ['name' => 'App Views', 'url' => '#'],
        ['name' => 'Salaires', 'url' => '']
    ];
@endphp

