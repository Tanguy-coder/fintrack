<?php

namespace App\Http\Controllers;

use App\Services\CaisseService;
use Illuminate\Http\Request;

class CaisseController extends Controller
{
    protected $caisseService;

    public function __construct(CaisseService $caisseService)
    {
        $this->caisseService = $caisseService;
    }

    public function index()
    {
        $caisses = $this->caisseService->getAllCaisse();
        return view('pages.caisses.index', compact('caisses'));
    }

    public function create()
    {
        return view('pages.caisses.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->caisseService->store($request->all());
        return redirect()->route('caisses.index');
    }

    public function edit($id)
    {
        $caisse = $this->caisseService->getById($id);
        return view('pages.caisses.edit', compact('caisse'));
    }

    public function update(Request $request, $id)
    {
        $this->caisseService->update( $id,$request->all());
        return redirect()->route('caisses.index');
    }
}
