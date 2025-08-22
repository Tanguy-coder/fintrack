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
                        <form method="POST" class="form-horizontal" action="{{ route('salaires.store') }}" id="form">
                            @csrf
                             {{-- <x-input-select
                                label="Employé"
                                name="employe_id"
                                id="employe_id"
                                :options="$employes"
                                :displayField="['matricule','nom', 'prenom']"
                                separator=" "
                                status="success"
                                required="true"
                            /> --}}

                            <x-input-select
                                label="Assurance"
                                name="assurance_id"
                                id="assurance_id"
                                :options="$assurances"
                                :displayField="['nom']"
                                status="success"
                                :required="true"
                            />
                            <x-text-input
                                label="Mois"
                                name="mois"
                                type="month"
                                status="success"
                                :required="true"
                            />

                            <x-text-input
                                label="Date de paiement"
                                name="date_paiement"
                                type="date"
                                status="success"
                                :required="true"
                            />

                            <x-input-select
                                label="Mode de paiement"
                                name="mode_paiement"
                                :options="$modesPaiements"
                                :displayField="['libelle']"
                                separator=" "
                                status="success"
                                :required="true"
                            />

                            <x-text-input
                                label="Référence du paiement"
                                name="reference_paiement"
                                status="success"
                                :required="false"
                            />

                            <x-text-area-input
                                label="Commentaire"
                                name="notes"
                                status="success"
                                rows="3"
                            />

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

@section('extra-scripts')
    <script>
        $(document).ready(function() {
            // Initialize Chosen
            $('.chosen-select').chosen({
                width: "100%",
                no_results_text: "Aucun résultat trouvé"
            });
        });
    </script>
{{-- <script>
$(document).ready(function() {
    // Declare variables in a wider scope
    let tauxEmploye = 0;
    let tauxEmployeur = 0;

    // Initialize Chosen
    $('.chosen-select').chosen({
        width: "100%",
        no_results_text: "Aucun résultat trouvé"
    });

    function calculateSalaryDetails() {
        // Get salary value
        let salaireBrut = parseFloat($('input[name="salaire_brut"]').val()) || 0;

        // Calculate contributions
        let montantCotisationEmploye = (salaireBrut * tauxEmploye) / 100;
        let montantCotisationEmployeur = (salaireBrut * tauxEmployeur) / 100;

        // Calculate net salary
        let salaireNet = salaireBrut - montantCotisationEmploye;

        // Update all fields
        $('input[name="salaire_net"]').val(salaireNet.toFixed(2));
        $('input[name="cotisations_employe"]').val(montantCotisationEmploye.toFixed(2));
        $('input[name="cotisations_employeur"]').val(montantCotisationEmployeur.toFixed(2));

        // Debug log
        console.log({
            salaireBrut,
            tauxEmploye,
            tauxEmployeur,
            montantCotisationEmploye,
            montantCotisationEmployeur,
            salaireNet
        });
    }

    // Listen for insurance selection changes
    $('select[name="assurance_id"]').on('change', function() {
        let assuranceId = $(this).val();
        console.log('Assurance ID:', assuranceId);

        if (assuranceId) {
            // Show loader
            let loader = $('<i class="fa fa-spinner fa-spin"></i>');
            $('input[name="cotisations_employe"], input[name="cotisations_employeur"]')
                .prop('disabled', true)
                .closest('.form-group')
                .append(loader);

            // AJAX call to get rates
            $.ajax({
                url: "{{ route('assurances.getCotisations') }}",
                type: 'GET',
                data: { assurance_id: assuranceId },
                success: function(response) {
                    // Update rates
                    tauxEmploye = parseFloat(response.cotisations_employe);
                    tauxEmployeur = parseFloat(response.cotisations_employeur);

                    // Recalculate if there's a salary
                    if ($('input[name="salaire_brut"]').val()) {
                        calculateSalaryDetails();
                    }
                },
                error: function(xhr) {
                    console.error('Erreur:', xhr.responseText);
                    toastr.error('Erreur lors de la récupération des cotisations');
                },
                complete: function() {
                    loader.remove();
                    $('input[name="cotisations_employe"], input[name="cotisations_employeur"]')
                        .prop('disabled', false);
                }
            });
        }
    });

    // Listen for salary changes
    $('input[name="salaire_brut"]').on('input', calculateSalaryDetails);
});
</script> --}}
@endsection
