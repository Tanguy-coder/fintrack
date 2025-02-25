<?php

namespace App\Http\Controllers;

use App\Services\SortieService;
use Illuminate\Http\Request;

class SortieController extends Controller
{
    protected $sortieService;

    public function __construct(SortieService $sortieService)
    {
        $this->sortieService = $sortieService;
    }

    public function index()
    {
        $sorties = $this->sortieService->listSorties();
        return view('pages.sorties.index', compact('sorties'));
    }

    public function create()
    {
        $data = $this->sortieService->getCreatePageData();
        // dd($data);
        return view('pages.sorties.create',$data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'libelle' => 'required',
            'type_sortie_id' => 'required',
            'user_id' => 'required',
            'caisse_id' => 'required',
            'date' => 'required',
            'montant' => 'required',
        ]);

        // dd($data);

        $this->sortieService->createSortie($data);
        return redirect()->route('sorties.index');
    }
}
