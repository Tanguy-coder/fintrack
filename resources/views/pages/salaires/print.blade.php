<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Fiche de paie</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
    :root {
      --border:#111;
      --muted:#555;
      --tiny:11px;
      --small:12px;
      --base:13px;
      --title:16px;
    }

    * { box-sizing:border-box; }
    html, body { margin:0; padding:0; font-family: "Segoe UI", Roboto, Arial, sans-serif; color:#000; }
    body { background:#fff; }

    .sheet {
      width: 210mm;      /* A4 */
      min-height: 297mm; /* A4 */
      padding: 14mm 16mm;
      margin: 0 auto;
      page-break-after: always;
    }

    .header {
      display:flex;
      align-items:flex-start;
      justify-content:space-between;
      border-bottom:1px solid var(--border);
      padding-bottom:8px;
      margin-bottom:10px;
    }

    .org-block {
      max-width:60%;
      line-height:1.15;
      font-size: var(--small);
    }
    .org-name { font-weight:700; font-size: var(--title); text-transform: uppercase; }
    .org-sub { color: var(--muted); }

    .logo {
      width: 90px; height: 90px;
      border:1px solid var(--border);
      display:flex; align-items:center; justify-content:center;
      font-size: var(--tiny); color:var(--muted);
    }

    .sheet-title { font-weight:700; font-size: var(--title); text-transform: uppercase; border:1px solid var(--border); padding:6px 10px; letter-spacing: .5px; }
    .ref { font-size: var(--small); }

    .twocols { display: grid; grid-template-columns: 1.2fr 1fr; gap: 10px; margin-bottom: 8px; }
    .box { border:1px solid var(--border); padding:8px; }
    .kv { display:grid; grid-template-columns: 140px 1fr; gap:6px 10px; font-size: var(--base); }
    .kv .k { color: var(--muted); }
    .kv .v { font-weight:600; }
    .mono { font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace; }

    .amount-letters { border:1px solid var(--border); padding:6px 8px; margin-top:6px; font-size: var(--base); }

    table { width:80%; border-collapse:collapse; margin-top:10px; font-size: var(--base); }
    th, td { border:1px solid var(--border); padding:4px 6px; text-align:center; vertical-align:middle; }
    thead th { background:#f6f6f6; font-weight:700; }
    .tfoot td { font-weight:700; }
    .note { font-size: var(--tiny); color: var(--muted); }

    .sign-row { display:flex; gap: 20px; margin-top: 16px; width: 100%; }
    .sign-box { border:1px dashed var(--border); padding: 14px 10px 28px; flex:1; position:relative; }
    .sign-title { position:absolute; top: -10px; left:10px; background:#fff; padding:0 6px; font-size: var(--small); color: var(--muted); }

    @media print {
      @page { size: A4; margin: 10mm; }
      .no-print { display:none !important; }
      .sheet { padding:0; page-break-after: always; }
      body { background:#fff; }
    }

    .actions { margin: 10px 0 0; }
    .bottom-section { display: grid; grid-template-columns: 1.2fr 1fr; gap: 20px; margin: 16px 0; }
    .billetage-table { width: 100%; border-collapse: collapse; font-size: var(--base); }
    .billetage-table th, .billetage-table td { border: 1px solid var(--border); padding: 1px 2px; text-align: center; height: 16px; }

    .copy-label { font-weight:700; font-size:14px; margin-bottom:6px; text-align:center; color:#333; }
    .separator { margin:16px 0; text-align:center; color:var(--muted); }
  </style>
</head>
<body>

@foreach($salaires as $salaire)
<div class="sheet">
  @foreach(['Copie client', 'Copie caissier'] as $copy)
  <div class="copy-label">{{ $copy }}</div>

  <!-- En-tête -->
  <div class="header">
    <div class="org-block">
      <div class="org-name">{{ $organisation->nom ?? 'COLLEGE ADELE' }}</div>
      <div class="org-sub">
        BP : {{ $organisation->bp ?? '788 Kara' }}<br>
        Tel : {{ $organisation->tel ?? 'Bur: (+228) 92168217' }} <br>
        Email : {{ $organisation->adresse ?? 'college.adele@yahoo.com' }}
      </div>
    </div>
    <div class="logo">
        <img src="{{ asset('img/Tel .png') }}" alt="Logo" style="max-width:100%; max-height:100%;" />
    </div>
  </div>

  <!-- Titre + Référence -->
  <div class="title-line">
    <div class="sheet-title" style="text-align: center; background-color: black; color:white">BULLETIN DE PAIE DU MOIS DE {{ $salaire->getFrencDateAttribute() }}</div>
    <div class="ref mono">
      N° {{ now()->year.'-0'. $salaire->id ?? 'A07RET202504802778' }}
    </div>
  </div>

  <!-- Deux colonnes -->
  <div class="twocols">
    <div class="box">
      <div class="kv">
        <div class="k">Nom & Prénoms</div>
        <div class="v">{{ $salaire->employe->full_name ?? 'ORDINAIRE' }}</div>

        <div class="k">N° Matricule</div>
        <div class="v mono">{{ $salaire->employe->matricule ?? '251323040A070338101' }}</div>

        <div class="k">Salaire brut</div>
        <div class="v"> {{ number_format($salaire->salaire_brut,0, ' ',' ' )}}</div>
        <div class="k">Retenue CNSS ({{ $salaire->assurance->rate_employe.'%' }})</div>
        <div class="v"> {{ number_format($salaire->cotisations_employe ,0, ' ',' ' ) }}</div>
        {{-- <div class="k">Salaire brut</div>
        <div class="v"> {{ number_format($salaire->salaire_brut,0, ' ',' ' ) }}</div> --}}

        <div class="k">Salaire Net</div>
        <div class="v mono">{{ number_format($salaire->salaire_net,0, ' ',' ' ) }} FCFA</div>
      </div>

      <div class="amount-letters">
        <strong>Montant en lettres : </strong>
        {{ $salaire->getAmountToWordAttribute() }}
      </div>
    </div>

    <div class="box">
      <div class="kv">
        <div class="k">Date Paiement</div>
        <div class="v">{{\Carbon\Carbon::parse($salaire->date_paiement)->format('d/m/Y')}}</div>

        <div class="k">Imprimé le</div>
        <div class="v">{{ now()->format('d/m/Y') }} à {{ now()->format('H:i') }}</div>

        <div class="k">Imprimé par</div>
        <div class="v">{{ Auth::user()->full_name ?? '' }}</div>

        <div class="k">Mode de paiement</div>
        <div class="v">{{ $salaire->mode_paiement_libelle ?? 'Espèces' }}</div>

        <div class="k">Référence</div>
        <div class="v">{{ $salaire->reference_paiement ?? 'A07RET202504802778' }}</div>
      </div>
    </div>
  </div>

  <div class="bottom-section">
    <div class="sign-row">
      <div class="sign-box">
        <div class="sign-title">Caissier(ère)</div>
        <div class="note">{{ Auth::user()->full_name }}</div>
      </div>
      <div class="sign-box">
        <div class="sign-title">Bénéficiaire</div>
        <div class="note">Nom & signature</div>
      </div>
    </div>


  </div>

  <div class="note">Document généré par {{ config('app.name', 'Application') }}</div>
  <div class="separator">*****************************************************************************************************</div>
  @endforeach
</div>
@endforeach

{{-- <div class="actions no-print">
  <button onclick="window.print()">Imprimer</button>
</div> --}}
<script>
  window.addEventListener('load', function() {
      // Lancer l'impression automatiquement
      window.print();

      // Après impression ou annulation, revenir à l'index des salaires
      window.onafterprint = function() {
          window.location.href = "{{ route('salaires.index') }}";
      };
  });
</script>
</body>
</html>
