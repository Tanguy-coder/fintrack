@extends('layouts.app')

@section('content')
<div class="ibox-content m-b-sm border-bottom">
    <form id="filterForm">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="type_sortie_id">Type de Sortie</label>
                    <select class="chosen-select" name="type_sortie_id" id="type_sortie_id">
                        <option value="">Toutes les opérations(Entrés/Dépenses)</option>
                        <option value="salaire">SALAIRES</option>
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
                    <!-- <div class="col-lg-12">
                        <h4>Total des dépenses : <span id="totalDepenses">0.00 FCFA</span></h4>
                    </div> -->
                </div>
                <table id="depensesTable" class="table table-striped table-bordered table-hover dataTables-example" data-page-size="15">
                    <thead>
                        <tr>
                            <th>Libelle</th>
                            <th>Montant</th>
                            <th>Date</th>
                            <th>Catégorie</th>
                            <th>Type</th>
                            <th>Auteur</th>
                        </tr>
                    </thead>
                    <tbody id="depensesTableBody"></tbody>
                    <tfoot>
                        <tr>
                            <th>Total</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
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

<div class="row" id="salairesSection" style="display: none;">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
                <div class="row">
                    <!-- <div class="col-lg-12">
                        <h4>Total des salaires : <span id="totalSalaires">0.00 FCFA</span></h4>
                    </div> -->
                </div>
                <table id="salairesTable" class="table table-striped table-bordered table-hover dataTables-example">
                    <thead>
                        <tr>
                            <th>Matricule</th>
                            <th>Nom & Prénom</th>
                            <th>Entite</th>
                            <th>Salaire brut</th>
                            <th>Cotisation Employé</th>
                            <th>Cotisation Employeur</th>
                            <th>Salaire net</th>
                            <th>Mois</th>
                            <th>Date</th>
                            <th>Mode de paiement</th>
                            <th>Référence de paiement</th>
                            <th>Observation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="salairesTableBody"></tbody>
                    <tfoot>
                        <tr>
                            <th>Total</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-scripts')
<script src="{{ asset('moment.min.js') }}"></script>
<script src="{{ asset('fr.min.js') }}"></script>
<script>
$(document).ready(function () {
    if ($('.chosen-select').length) {
        $('.chosen-select').chosen({
            width: "100%",
            no_results_text: "Aucun résultat trouvé"
        });
    }

    // helper pour nettoyer les valeurs
    function intVal(i) {
        if (typeof i === 'string') {
            return parseFloat(i.replace(/[^0-9.-]+/g,"")) || 0;
        }
        return typeof i === 'number' ? i : 0;
    }

    // Dépenses
    var table = $('#depensesTable').DataTable({
        pageLength: 10,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        language: { url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json' },
        buttons: [
            { extend: 'copy', text: 'Copier' },
            { extend: 'csv' },
            { extend: 'excel', title: 'Liste des dépenses', footer: true, exportOptions: { columns: [0,1,2,3,4,5] } },
            { extend: 'pdf', title: 'Liste des dépenses', footer: true, exportOptions: { columns: [0,1,2,3,4,5] } },
            { extend: 'print', text: 'Imprimer', footer: true }
        ],
        footerCallback: function (row, data, start, end, display) {
            var api = this.api();
            var total = api.column(1).data().reduce((a, b) => intVal(a) + intVal(b), 0);
            var pageTotal = api.column(1, { page: 'current'} ).data().reduce((a, b) => intVal(a) + intVal(b), 0);
            $(api.column(1).footer()).html(
                pageTotal.toLocaleString('fr-FR') +' FCFA (Total: '+ total.toLocaleString('fr-FR') +' FCFA)'
            );
        }
    });

    // Salaires
    var tableSalaires = $('#salairesTable').DataTable({
        pageLength: 10,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        language: { url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json' },
        buttons: [
            { extend: 'copy', text: 'Copier' },
            { extend: 'csv' },
            { extend: 'excel', title: 'Liste des salaires', footer: true, exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10,11] } },
            { extend: 'pdf', title: 'Liste des salaires', footer: true, exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10,11] } },
            { extend: 'print', text: 'Imprimer', footer: true }
        ],
        footerCallback: function (row, data, start, end, display) {
            var api = this.api();
            [3,4,5,6].forEach(function (colIndex) {
                var total = api.column(colIndex).data().reduce((a, b) => intVal(a) + intVal(b), 0);
                var pageTotal = api.column(colIndex, { page: 'current'} ).data().reduce((a, b) => intVal(a) + intVal(b), 0);
                $(api.column(colIndex).footer()).html(
                    pageTotal.toLocaleString('fr-FR') +' FCFA (Total: '+ total.toLocaleString('fr-FR') +' FCFA)'
                );
            });
        }
    });

    // Datepicker
    $('.input-group.date').datepicker({ format: 'dd/mm/yyyy', todayBtn: "linked", autoclose: true, language: 'fr' });

    function loadDepenses() {
        let dateDebut = $('#date_added').val().trim();
        let dateFin = $('#date_modified').val().trim();
        let typeDepenseId = $('#type_sortie_id').val();

        if (!dateDebut || !dateFin) { toastr.warning('Veuillez sélectionner les dates'); return; }

        $("#loader").show(); table.clear();

        $.ajax({
            url: "{{ url('/api/depenses') }}",
            type: "GET",
            data: { date_debut: dateDebut, date_fin: dateFin, type_depense_id: typeDepenseId },
            success: function (response) {
                let totalDepenses = 0;
                if (response.length > 0) {
                    response.forEach(depense => {
                        totalDepenses += parseFloat(depense.montant);
                        let type = depense.type_operation == 1 ? 'ENTREE' : 'SORTIE';
                        table.row.add([
                            depense.libelle,
                            parseFloat(depense.montant).toFixed(2),
                            new Date(depense.date).toLocaleDateString('fr-FR'),
                            depense.type_sortie.libelle,
                            type,
                            depense.user.nom
                        ]);
                    });
                }
                table.draw(); $("#totalDepenses").text(totalDepenses.toLocaleString('fr-FR') + " FCFA"); $("#loader").hide();
            },
            error: function () { toastr.error('Erreur lors du chargement des données'); $("#loader").hide(); }
        });
    }

    function loadSalaires() {
        let dateDebut = $('#date_added').val().trim();
        let dateFin = $('#date_modified').val().trim();
        if (!dateDebut || !dateFin) { toastr.warning('Veuillez sélectionner les dates'); return; }

        $("#loader").show(); tableSalaires.clear();

        $.ajax({
            url: "{{ route('rapports.getSalairesJson') }}",
            type: "GET",
            data: { date_debut: dateDebut, date_fin: dateFin },
            success: function (response) {
                let totalSalaires = 0;
                if (response && Array.isArray(response) && response.length > 0) {
                    response.forEach(salaire => {
                        totalSalaires += parseFloat(salaire.salaire_net) || 0;
                        let employeMatricule = (salaire.employe) ? `${salaire.employe.matricule}` : 'N/A';
                        let employeName = (salaire.employe) ? `${salaire.employe.nom} ${salaire.employe.prenom}` : 'N/A';
                        let entiteLibelle = (salaire.employe && salaire.assurance) ? salaire.assurance.nom : '-';

                        tableSalaires.row.add([
                            employeMatricule,
                            employeName,
                            entiteLibelle,
                            (parseFloat(salaire.salaire_brut) || 0).toFixed(2),
                            (parseFloat(salaire.cotisations_employe) || 0).toFixed(2),
                            (parseFloat(salaire.cotisations_employeur) || 0).toFixed(2),
                            (parseFloat(salaire.salaire_net) || 0).toFixed(2),
                            moment(salaire.mois).format('MMMM YYYY'),
                            moment(salaire.date_paiement).format('DD/MM/YYYY'),
                            salaire.mode_paiement || '-',
                            salaire.reference_paiement || '-',
                            salaire.notes || '-',
                            `<div class="btn-group">
                                <button class="btn btn-xs btn-outline btn-primary" onclick="printSalaire(${salaire.id})">
                                    <i class="fa fa-print"></i>
                                </button>
                            </div>`
                        ]);
                    });
                }
                tableSalaires.draw(); $("#totalSalaires").text(totalSalaires.toLocaleString('fr-FR') + " FCFA"); $("#loader").hide();
            },
            error: function () { toastr.error('Erreur lors du chargement des salaires'); $("#loader").hide(); }
        });
    }

    $('#type_sortie_id').change(function() {
        if ($(this).val() === 'salaire') {
            $('#depensesTable').closest('.ibox').hide();
            $('#salairesSection').show();
        } else {
            $('#salairesSection').hide();
            $('#depensesTable').closest('.ibox').show();
        }
    });

    $("#filterForm").submit(function (e) {
        e.preventDefault();
        if ($('#type_sortie_id').val() === 'salaire') { loadSalaires(); } else { loadDepenses(); }
    });

    $('#salairesSection').hide(); $('#type_sortie_id').trigger('change');
});

function printSalaire(id) {
    window.open(`/salaires/${id}/print`, '_blank');
}
</script>
@endsection
