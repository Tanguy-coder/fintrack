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
                            {{-- {{ dd($typesSortie) }} --}}
                            @csrf
                            <x-text-input label="user_id" name="user_id" status="success" value="1" type="hidden"/>
                            <x-text-input label="libelle" name="libelle" status="success" required="true"/>
                            <x-input-select label="Type d'operation" id="operation" name="type_operation" :options="$operation" :displayField="['libelle']" :selected="old('type_operation')" />
                            <x-input-select label="Type de Sortie" id="type_sortie_id" name="type_sortie_id" :options="$typesSortie"  :displayField="['numero_compte']" :selected="old('type_sortie_id')" />
                            {{-- <x-input-select label="Caisse" name="caisse_id" :options="$caisses->pluck('libelle', 'id')" :selected="old('caisse_id')" /> --}}
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

    // Delegated event for dependent dropdowns
    $(document).on('change', '#operation', function() {
        var selectedValue = $(this).val();
        var typesSortieSelect = $('#type_sortie_id');

        if (selectedValue) {
            var endpoint = '{{ route("typesSorties.getTypeSorties", ["id" => "__id__"]) }}'.replace('__id__', selectedValue);

            if (selectedValue == 2) { // Assuming 1 is for 'Sortie de fond'
                  endpoint = '{{ route("typesSorties.getTypeSorties", ["id" => "__id__"]) }}'.replace('__id__', selectedValue);
            } else if (selectedValue == 1) { // Assuming 2 is for 'Entree de fond'
                endpoint = '{{ route("typesSorties.getTypeSorties", ["id" => "__id__"]) }}'.replace('__id__', selectedValue);
            }else{
                typesSortieSelect.empty().prop('disabled', true);
                typesSortieSelect.append('<option value="">Sélectionnez un type</option>');
                typesSortieSelect.trigger("chosen:updated");
                return;
            }

            if (endpoint) {
                typesSortieSelect.empty().prop('disabled', true);
                typesSortieSelect.append('<option value="">Chargement...</option>');
                typesSortieSelect.trigger("chosen:updated");

                $.ajax({
                    url: endpoint,
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        typesSortieSelect.empty().prop('disabled', false);
                        if (response.length === 0) {
                            typesSortieSelect.append('<option value="">Aucun type disponible</option>');
                        } else {
                            $.each(response, function(key, value) {
                                typesSortieSelect.append('<option value="' + value.id + '">' + value.numero_compte +'---' + value.libelle + '</option>');
                            });
                        }
                        typesSortieSelect.trigger("chosen:updated");
                    },
                    error: function(xhr, status, error) {
                        console.error('Ajax error:', {xhr, status, error});
                        typesSortieSelect.empty().prop('disabled', false);
                        typesSortieSelect.append('<option value="">Erreur de chargement</option>');
                        typesSortieSelect.trigger("chosen:updated");
                    }
                });
            }
        }
    });
});
</script>
@endsection
