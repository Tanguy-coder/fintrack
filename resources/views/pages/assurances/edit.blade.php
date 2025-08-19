@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edition de l'entité</small></h5>

                    </div>
                    <div class="ibox-content">
                        <form method="POST" class="form-horizontal" action="{{ route('assurances.update',$assurance->id) }}" id="form">
                            @csrf
                            @method('PUT')
                            <x-text-input label="nom" name="nom" status="success" required="true" value="{{ $assurance->nom }}"/>
                            <x-text-input label="Taux employé" name="rate_employe" status="success" required="true" value="{{ $assurance->rate_employe }}"/>
                            <x-text-input label="Taux employeur" name="rate_employeur" status="success" required="true" value="{{ $assurance->rate_employeur }}"/>
                            <x-text-input label="description" name="description" status="success" required="true" value="{{ $assurance->description }}"/>


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
    $title = 'Entités';
    $breadcrumb = [
        ['name' => 'App Views', 'url' => '#'],
        ['name' => 'Editer entité', 'url' => '']
    ];
@endphp
