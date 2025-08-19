@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="float-right">
            <a href="{{ route('assurances.create') }}" class="btn btn-primary btn-xs pull-right">
                <li class="fa fa-plus"></li> Ajouter
            </a>
        </div>
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Liste des entités</h5>
        </div>
        <div class="ibox-content">

            <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
        <tr>
            <th>Libellé</th>
            <th>Taux employé</th>
            <th>Taux employeur</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($assurances as $assurance)
        <tr class="gradeX">
            <td>{{ $assurance->nom }}</td>
            <td>{{ $assurance->rate_employe }} %
            <td>{{ $assurance->rate_employeur }} %
            <td>{{ $assurance->description }}
            </td>
            <td class="center">
                    <a href="{{ route('assurances.edit', $assurance->id) }}" class="btn btn-primary btn-xs">
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
    $title = 'Entités';
    $breadcrumb = [
        ['name' => 'App Views', 'url' => '#'],
        ['name' => 'assurances', 'url' => '']
    ];
@endphp

