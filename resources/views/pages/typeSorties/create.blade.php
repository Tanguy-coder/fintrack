@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Enrégistrer une nouvelle caisse</small></h5>

                    </div>
                    <div class="ibox-content">
                        <form method="Post" class="form-horizontal" action="{{ route('typeSorties.store') }}" id="form">
                            @csrf
                            <x-text-input label="libelle" name="libelle" status="success" required="true"/>


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
