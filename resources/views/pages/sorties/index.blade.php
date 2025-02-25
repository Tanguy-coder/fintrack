@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="float-right">
            <a href="{{ route('sorties.create') }}" class="btn btn-primary btn-xs ">
                <li class="fa fa-plus"></li> Ajouter
            </a>
        </div>
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
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($sorties as $sortie)
        <tr class="gradeX">
            <td>{{ $sortie->libelle }}</td>
            <td>{{ $sortie->montant }}
            <td>{{ $sortie->date }}
            <td>{{ $sortie->typeSortie->libelle }}
            <td>{{ $sortie->caisse->libelle }}
            <td>{{ $sortie->user->name }}</td>
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
    $title = 'Dashboard';
    $breadcrumb = [
        ['name' => 'App Views', 'url' => '#'],
        ['name' => 'Dépenses', 'url' => '']
    ];
@endphp

