@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="float-right">
            <a href="{{ route('sorties.create') }}" class="btn btn-primary btn-xs pull-right">
                <li class="fa fa-plus"></li> Ajouter
            </a>
        </div>
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Liste des opérations</h5>
        </div>
        <div class="ibox-content">

            <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
        <tr>
            <th>N° Compte</th>
            <th>Libelle</th>
            <th>Montant</th>
            <th>Date</th>
            <th>Caégorie</th>
            <th>Type</th>
            {{-- <th>Caisse</th> --}}
            <th>Auteur</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($sorties as $sortie)
        <tr class="gradeX">
            <td>{{ $sortie->typeSortie->numero_compte }}</td>
            <td>{{ $sortie->libelle }}</td>
            <td>{{ $sortie->montant }}
            <td>{{ \Carbon\Carbon::parse($sortie->date)->format('d/m/Y') }}</td>
            <td>{{ $sortie->typeSortie->libelle }}
            <td>{{ $sortie->typeSortie->getTypeOperationAttribute()->where('id',$sortie->type_operation)->first()->libelle }}</td>
            <td>{{ $sortie->user->nom .' '. $sortie->user->prenom }}</td>
            <td class="center">
                    <a href="{{ route('sorties.edit', $sortie->id) }}" class="btn btn-primary btn-xs">
                        <li class="fa fa-edit"></li>
                    </a>
            </td>
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
    $title = 'Opérations';
    $breadcrumb = [
        ['name' => 'App Views', 'url' => '#'],
        ['name' => 'Opérations', 'url' => '']
    ];
@endphp

