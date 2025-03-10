@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="float-right">
            <a href="{{ route('unites.create') }}" class="btn btn-primary btn-xs pull-right">
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
            <th>Nom de l'unité</th>
            <th>Localisation</th>
            <th>Reférences</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($unites as $unite)
        <tr class="gradeX">
            <td>{{ $unite->libelle }}</td>
            <td>{{ $unite->localisation }}
            </td>
            <td>{{ $unite->ref }}</td>
            <td class="center">
                    <a href="{{ route('unites.edit', $unite->id) }}" class="btn btn-primary btn-xs">
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
    $title = 'Unités';
    $breadcrumb = [
        ['name' => 'App Views', 'url' => '#'],
        ['name' => 'unités', 'url' => '']
    ];
@endphp

