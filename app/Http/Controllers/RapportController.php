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
        // dd($request->all());
        $dateDebut = date('Y-m-d',strtotime($request->input('date_debut')));
        $dateFin = \Carbon\Carbon::createFromFormat('d/m/Y', $request->input('date_fin'))->format('Y-m-d');
        $typesortieId = $request->input('type_depense_id');

        // dd($dateDebut, $dateFin, $typesortieId);

        $sorties = $this->rapportService->genererRapportEntreDates($dateDebut, $dateFin, $typesortieId);

        // dd($sorties);
        return response()->json($sorties);

    }
}
