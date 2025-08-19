<?php

namespace App\Http\Controllers;

use App\Models\Salaire;
use Illuminate\Http\Request;

class SalaireController extends Controller
{
    protected $salaireService;

    public function __construct(\App\Services\SalaireService $salaireService)
    {
        $this->salaireService = $salaireService;
    }

    public function index()
    {
        $salaires = $this->salaireService->getAllSalaires();
        return view('pages.salaires.index', compact('salaires'));
    }

    public function create()
    {
        $data = $this->salaireService->getCreatePageData();
        return view('pages.salaires.create', $data);
    }

    public function getCotisations(Request $request)
    {
        return $this->salaireService->getCotisations($request->assurance_id);
    }

   public function store(Request $request)
{
    $request['mois'] = \Carbon\Carbon::parse($request->mois)->format('Y-m-d');

    $existingSalaire = Salaire::where('mois', $request->mois)->first();

    if ($existingSalaire) {
        return redirect()->back()->with('error', 'Salaire pour ce mois existe déjà.');
    }

    $token = $this->salaireService->createSalaire($request->all());

    return redirect()->route('salaires.print', $token)
        ->with('success', 'Salaire créé avec succès.');
}


    public function print($token)
    {
        $salaires = $this->salaireService->printSalairesReceipts($token);
        // dd($salaires);
        if ($salaires->isEmpty()) {
            return redirect()->back()->with('error', 'Aucun salaire trouvé pour ce token.');
        }
        return view('pages.salaires.print', compact('salaires'));
    }
    public function edit($id)
    {
        $salaire = $this->salaireService->getSalaireById($id);
        return view('pages.salaires.edit', compact('salaire'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'employe_id' => 'required',
            'montant' => 'required',
            'date' => 'required|date',
        ]);

        $this->salaireService->updateSalaire($id, $data);
        return redirect()->route('salaires.index');
    }

    public function destroy($id)
    {
        $this->salaireService->deleteSalaire($id);
        return redirect()->route('salaires.index');
    }
}
