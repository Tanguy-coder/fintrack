@extends('layouts.app')

@section('content')
<div class="ibox-content m-b-sm border-bottom">
    <form id="filterForm">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="type_sortie_id">Type de Sortie</label>
                    <select class="chosen-select" name="type_sortie_id" id="type_sortie_id">
                        <option value="">Sélectionner</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->libelle }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="date_added">Date début</label>
                    <div class="input-group date">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input id="date_added" name="date_debut" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="date_modified">Date fin</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input id="date_modified" name="date_fin" type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <x-primary-button type="submit" title="Search" class="pull">
            Filtrer
        </x-primary-button>
    </form>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
                <table class="table table-striped table-bordered table-hover dataTables-example" data-page-size="15">
                    <thead>
                        <tr>
                            <th>Libelle</th>
                            <th>Montant</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Caisse</th>
                            <th>Auteur</th>
                        </tr>
                    </thead>
                    <tbody id="depensesTableBody">
                        <!-- Les données AJAX seront insérées ici -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <ul class="pagination pull-right"></ul>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <div id="loader" style="display: none; text-align: center;">
                    <i class="fa fa-spinner fa-spin fa-2x"></i> Chargement...
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-scripts')
<script>
$(document).ready(function () {
    console.log("Document ready");
    function loadDepenses() {
        console.log("loadDepenses called");

        let dateDebut = $('#date_added').val().trim();
        let dateFin = $('#date_modified').val().trim();
        let typeDepenseId = $('#type_sortie_id').val();

        if (!dateDebut || !dateFin) {
            console.error("Missing required fields");
            return;
        }

        $("#loader").show();
        $("#depensesTableBody").html("");

        $.ajax({
            url: "{{ url('/api/depenses') }}",
            type: "GET",
            data: {
                date_debut: dateDebut,
                date_fin: dateFin,
                type_depense_id: typeDepenseId
            },
            success: function (response) {
                console.log("AJAX success", response);

                let rows = "";
                if (response.length > 0) {
                    response.forEach(depense => {
                        rows += `
                            <tr>
                                <td>${depense.libelle}</td>
                                <td>${depense.montant.toFixed(2)} €</td>
                                <td>${depense.date}</td>
                                <td>${depense.type_sortie.libelle}</td>
                                <td>${depense.caisse.libelle}</td>
                                <td>${depense.auteur}</td>
                            </tr>
                        `;
                    });
                } else {
                    rows = `<tr><td colspan="6" class="text-center">Aucune dépense trouvée</td></tr>`;
                }
                $("#depensesTableBody").html(rows);
                $("#loader").hide();
            },
            error: function (xhr) {
                console.error("AJAX error", xhr.responseText);
                $("#depensesTableBody").html(`<tr><td colspan="6" class="text-center text-danger">Erreur lors du chargement des données</td></tr>`);
                $("#loader").hide();
            }
        });
    }

    $("#filterForm").submit(function (e) {
        e.preventDefault();  // Cette ligne empêche le rafraîchissement de la page
        console.log("Form submitted");
        loadDepenses();  // Charge les données sans recharger la page
    });

    loadDepenses();  // Chargement initial des données
});
</script>
@endsection
