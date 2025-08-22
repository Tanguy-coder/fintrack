@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edition de l'unité</h5>

                    </div>
                    <div class="ibox-content">
                        <form method="POST" class="form-horizontal" action="{{ route('employes.update',$employe->id) }}" >
                            @csrf
                            @method('PUT')
                            <x-text-input label="Matricule" name="matricule" status="success" required="true" value="{{ $employe->matricule }}"/>
                            <x-text-input label="Nom" name="nom" status="success" required="true" value="{{ $employe->nom }}"/>
                            <x-text-input label="Prénom" name="prenom" status="success" required="true" value="{{ $employe->prenom }}"/>
                            <x-text-input label="Email" name="email" status="success" :required="false" type="email" value="{{ $employe->email }}"/>
                            <x-text-input label="Téléphone" name="telephone" status="success" required="true" value="{{ $employe->telephone }}"/>
                            <x-text-input label="Poste" name="poste" status="success" required="true" value="{{ $employe->poste }}"/>
                            <x-text-input label="Salaire" name="salaire" status="success" required="true" type="number" value="{{ $employe->salaire }}"/>
                            <x-input-checkbox id="is_active" name="actif" checked="true" label="Status"/>

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
        ['name' => 'Editer Employé', 'url' => '']
    ];
@endphp
