@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="float-right">
            <a href="{{ route('caisses.create') }}" class="btn btn-primary btn-xs pull-right">
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
            <th>Libellé</th>
            <th>Solde</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($caisses as $caisse)
        <tr class="gradeX">
            <td>{{ $caisse->libelle }}</td>
            <td>{{ $caisse->solde }}
            </td>
            <td class="center">
                    <a href="{{ route('caisses.edit', $caisse->id) }}" class="btn btn-primary btn-xs">
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
    $title = 'Caisses';
    $breadcrumb = [
        ['name' => 'App Views', 'url' => '#'],
        ['name' => 'Caisses', 'url' => '']
    ];
@endphp

