@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="float-right mb-1">
            <a href="{{ route('employes.create') }}" class="btn btn-primary btn-xs pull-right">
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
            <th>Matricule</th>
            <th>Nom & Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Poste</th>
            <th>Salaire</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($employes as $employe)
        <tr class="gradeX">
            <td>{{ $employe->matricule }}</td>
            <td>{{ $employe->getFullNameAttribute() }}</td>
            <td>{{ $employe->email }}
            <td>{{ $employe->telephone }}
            <td>{{ $employe->poste }}
            <td>{{ $employe->salaire }}
            <td>{{ $employe->etat = true ? 'Actif' : 'inactif'}}
            <td class="center">
                    <a href="{{ route('employes.edit', $employe->id) }}" class="btn btn-primary btn-xs">
                        <li class="fa fa-edit"></li>
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
        ['name' => 'Employés', 'url' => '']
    ];
@endphp

