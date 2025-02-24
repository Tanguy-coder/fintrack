@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edition de l'unité</small></h5>

                    </div>
                    <div class="ibox-content">
                        <form method="POST" class="form-horizontal" action="{{ route('unites.update',$unite->id) }}" id="form">
                            @csrf
                            @method('PUT')
                            <x-text-input label="Nom de l'unité" name="libelle" status="success" value="{{ $unite->libelle }}" required="true"/>
                            <x-text-input label="Localisation" status="success" name="localisation" value="{{ $unite->localisation }}" required="true"/>
                            <x-text-input label="Ref" status="success" name="ref" value="{{ $unite->ref }}" required="true"/>

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
    $title = 'Unités';
    $breadcrumb = [
        ['name' => 'App Views', 'url' => '#'],
        ['name' => 'Editer unité', 'url' => '']
    ];
@endphp
