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
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Total des dépenses : <span id="totalDepenses">0.00 FCFA</span></h4>
                    </div>
                </div>
                <table id="depensesTable" class="table table-striped table-bordered table-hover dataTables-example" data-page-size="15">
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
    // Initialiser DataTables
    var table = $('#depensesTable').DataTable({
        pageLength: 10,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json'
        },
        buttons: [
            { extend: 'copy', text: 'Copier' },
            { extend: 'csv' },
            {
                extend: 'excel',
                title: 'Liste des dépenses',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5,6 ]
                }
            },
            {
                extend: 'pdf',
                title: 'Liste des dépenses',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            },
            {
                extend: 'print',
                text: 'Imprimer',
                customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');
                    $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                }
            }
        ]
    });

    // Initialiser le datepicker
    $('.input-group.date').datepicker({
        format: 'dd/mm/yyyy',
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        language: 'fr'
    });

    function loadDepenses() {
        let dateDebut = $('#date_added').val().trim();
        let dateFin = $('#date_modified').val().trim();
        let typeDepenseId = $('#type_sortie_id').val();

        if (!dateDebut || !dateFin) {
            toastr.warning('Veuillez sélectionner les dates');
            return;
        }

        $("#loader").show();
        table.clear();

        $.ajax({
            url: "{{ url('/api/depenses') }}",
            type: "GET",
            data: {
                date_debut: dateDebut,
                date_fin: dateFin,
                type_depense_id: typeDepenseId
            },
            success: function (response) {
                let totalDepenses = 0;

                if (response.length > 0) {
                    response.forEach(depense => {
                        totalDepenses += parseFloat(depense.montant);
                        table.row.add([
                            depense.libelle,
                            depense.montant.toFixed(2),
                            new Date(depense.date).toLocaleDateString('fr-FR'),
                            depense.type_sortie.libelle,
                            depense.caisse.libelle,
                            depense.user.nom
                        ]);
                    });
                }

                table.draw();
                $("#totalDepenses").text(totalDepenses.toFixed(2) + " €");
                $("#loader").hide();
            },
            error: function (xhr) {
                console.error("AJAX error", xhr.responseText);
                toastr.error('Erreur lors du chargement des données');
                $("#loader").hide();
            }
        });
    }

    $("#filterForm").submit(function (e) {
        e.preventDefault();
        loadDepenses();
    });

    // Chargement initial des données
    loadDepenses();
});
</script>
@endsection
