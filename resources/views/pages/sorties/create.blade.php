@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Enrégistrer une nouvelle sortie</small></h5>

                    </div>
                    <div class="ibox-content">
                        <form method="POST" class="form-horizontal" action="{{ route('sorties.store') }}" id="form">
                            @csrf
                            <x-text-input label="user_id" name="user_id" status="success" value="1" type="hidden"/>
                            <x-text-input label="libelle" name="libelle" status="success" required="true"/>
                            <x-input-select label="Type de Sortie" name="type_sortie_id" :options="$typesSortie->pluck('libelle', 'id')" :selected="old('type_sortie_id')" />
                            <x-input-select label="Caisse" name="caisse_id" :options="$caisses->pluck('libelle', 'id')" :selected="old('caisse_id')" />
                            <x-text-input label="Date" status="success" name="date" required="true" type="date"/>
                            <x-text-input label="montant" status="success" name="montant" required="true" type="number"/>


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
        ['name' => 'Nouvelle unité', 'url' => '']
    ];
@endphp
