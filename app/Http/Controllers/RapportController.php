<?php

namespace App\Http\Controllers;

use App\Services\RapportService;
use App\Services\TypeSortieService;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    protected $rapportService;
    protected $typeSortieService;

    public function __construct(RapportService $rapportService, TypeSortieService $typeSortieService)
    {
        $this->rapportService = $rapportService;
        $this->typeSortieService = $typeSortieService;
    }
    public function index()
    {
        $types = $this->typeSortieService->getAllTypeSorties();
        // dd($types);
        return view('pages.rapports.index',compact('types'));
    }

    public function getDepensesJson(Request $request)
    {
        $dateDebut = \Carbon\Carbon::createFromFormat('d/m/Y', $request->input('date_debut'))->format('Y-m-d');
        $dateFin = \Carbon\Carbon::createFromFormat('d/m/Y', $request->input('date_fin'))->format('Y-m-d');

        $typesortieId = $request->input('type_depense_id');
        $sorties = $this->rapportService->genererRapportEntreDates($dateDebut, $dateFin, $typesortieId);

        return response()->json($sorties);
    }

    public function getSalairesJson(Request $request)
    {
        $dateDebut = \Carbon\Carbon::createFromFormat('d/m/Y', $request->input('date_debut'))->format('Y-m-d');
        $dateFin = \Carbon\Carbon::createFromFormat('d/m/Y', $request->input('date_fin'))->format('Y-m-d');

        $salaires = $this->rapportService->getSalairesBetweenDates($dateDebut, $dateFin);

        return response()->json($salaires);
    }

    public function rapportGeneral()
    {
        // dd('ok');
        $types = $this->rapportService->getRapportPageData();
        return view('pages.rapports.general', compact('types'));
    }

    public function genererRapport(Request $request)
    {
        // dd($request->all());
        $types = $request->input('types', []);
        $dateDebut = $request->input('from_date');
        $dateFin = $request->input('to_date');

        $datas = $this->rapportService->getDatasBetweenDates($types, $dateDebut, $dateFin);
        // dd($datas);

        $depenses = $datas->get('depenses');
        $entrees = $datas->get('entrees');
        $salaires = $datas->get('salaires');

        $totalDepenses = $depenses->sum('montant');
        $totalEntrees = $entrees->sum('montant');
        $balance = $totalEntrees - $totalDepenses;

        return view('pages.rapports.result',[
                'depenses' => $depenses,
                'entrees'  => $entrees,
                'salaires' => $salaires,
                'totalDepenses' => $totalDepenses,
                'totalEntrees'  => $totalEntrees,
                'balance'       => $balance,
                'dateDebut'     => $dateDebut,
                'dateFin'       => $dateFin,
            ]);
    }
}
