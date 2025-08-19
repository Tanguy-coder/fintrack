@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Enrégistrer une nouvelle entité</h5>

                    </div>
                    <div class="ibox-content">
                        <form method="Post" class="form-horizontal" action="{{ route('assurances.store') }}" id="form">
                            @csrf
                            <x-text-input label="Nom" name="nom" status="success" required="true"/>
                            <x-text-input label="Taux employé" name="rate_employe" status="success" required="true"/>
                            <x-text-input label="Taux employeur" name="rate_employeur" sta   tus="success" required="true"/>
                            <x-text-input label="Description" name="description" status="success" required="true"/>"
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
    $title = 'entités';
    $breadcrumb = [
        ['name' => 'App Views', 'url' => '#'],
        ['name' => 'Nouvelle entité', 'url' => '']
    ];
@endphp
