@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="float-right">
            <a href="{{ route('typeEntrees.create') }}" class="btn btn-primary btn-xs pull-right">
                <li class="fa fa-plus"></li> Ajouter
            </a>
        </div>
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Liste des types d'entrées</h5>
        </div>
        <div class="ibox-content">

            <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
        <tr>
            <th>Libellé</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($typeEntrees as $typeEntree)
        <tr class="gradeX">
            <td>{{ $typeEntree->libelle }}</td>
            </td>
            <td class="center">
                    <a href="{{ route('typeEntrees.edit', $typeEntree->id) }}" class="btn btn-primary btn-xs">
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
    $title = 'typeEntrees';
    $breadcrumb = [
        ['name' => 'App Views', 'url' => '#'],
        ['name' => 'typeEntrees', 'url' => '']
    ];
@endphp

