@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="float-right">
            <a href="{{ route('typeSorties.create') }}" class="btn btn-primary btn-xs ">
                <li class="fa fa-plus"></li> Ajouter
            </a>
        </div>
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Liste des types de dépenses</h5>
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
        @foreach ($typeSorties as $typeSortie)
        <tr class="gradeX">
            <td>{{ $typeSortie->libelle }}</td>
            </td>
            <td class="center">
                    <a href="{{ route('typeSorties.edit', $typeSortie->id) }}" class="btn btn-primary btn-xs">
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
    $title = 'typeSorties';
    $breadcrumb = [
        ['name' => 'App Views', 'url' => '#'],
        ['name' => 'typeSorties', 'url' => '']
    ];
@endphp

