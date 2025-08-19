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
                            <x-text-input label="N° Compte" name="numero_compte" status="success" :required="true"/>
                            <x-text-input label="libelle" name="libelle" status="success" :required="true"/>
                            <x-input-select label="Type d'operation" id="operation" name="type" :options="$operation" :displayField="['libelle']" :selected="old('type_operation')" :required="true" />

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

@section('extra-scripts')
<script>
$(document).ready(function () {
    // Initialize Chosen for all selects with the class
    if ($('.chosen-select').length) {
        $('.chosen-select').chosen({
            width: "100%",
            no_results_text: "Aucun résultat trouvé"
        });
    }
});
</script>
@endsection
