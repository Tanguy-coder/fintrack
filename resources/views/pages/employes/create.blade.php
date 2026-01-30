@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Enrégistrer un nouvel employé</h5>

                    </div>
                    <div class="ibox-content">
                        <form method="POST" class="form-horizontal" action="{{ route('employes.store') }}" id="form">
                            @csrf
                            <x-text-input label="Matricule" name="matricule" status="success" required="true"/>
                            <x-text-input label="Nom" name="nom" status="success" required="true"/>
                            <x-text-input label="Prénom" name="prenom" status="success" required="true"/>
                            <x-text-input label="Email" name="email" type="email" status="success" :required="false" />
                            <x-text-input label="Téléphone" name="telephone" type="tel" status="success" required="true"/>
                            <x-text-input label="Poste" name="poste" status="success" required="true"/>
                            <x-text-input label="Salaire" name="salaire" status="success" required="true" type="number"/>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <x-primary-button type="submit" class="demo1">
                                        Enrégistrer
                                    </x-primary-button>
                                    <x-secondary-button type="reset">
                                        Effacer
                                    </x-secondary-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@php
    $title = 'Employés';
    $breadcrumb = [
        ['name' => 'App Views', 'url' => '#'],
        ['name' => 'Nouvel employé ', 'url' => '']
    ];
@endphp
