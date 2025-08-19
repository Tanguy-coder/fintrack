@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Rapports</small></h5>

                    </div>
                    <div class="ibox-content">
                        <form method="Post" class="form-horizontal" action="{{ route('rapports.generer') }}" id="form">
                            @csrf
                          <x-input-select-multiple
                                label="Types"
                                name="types[]"
                                id="select2_demo_1"
                                :options="$types"
                                :displayField="['libelle']"
                                separator=" - "
                                status="success"
                                :required="true"
                            />
                            <x-text-input label="De" name="from_date" type="date" status="success" required="true"/>
                            <x-text-input label="A" name="to_date" type="date" status="success" required="true"/>
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
        $(document).ready(function() {
            // Initialize Chosen
            $('.chosen-select').chosen({
                width: "100%",
                allow_single_deselect: true
            });


        });
    </script>

@endsection
