@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="float-right mb-1">
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-xs pull-right">
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
            <th>Nom & Prénom</th>
            <th>Email</th>
            <th>Username</th>
            <th>Rôle</th>
            <th>contact</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
        <tr class="gradeX">
            <td>{{ $user->nom.' '.$user->prenom }}</td>
            <td>{{ $user->email }}
            <td>{{ $user->username }}
            <td>{{ $user->role->name }}
            <td>{{ $user->contact }}
            <td>f</td>
            <td class="center">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-xs">
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

