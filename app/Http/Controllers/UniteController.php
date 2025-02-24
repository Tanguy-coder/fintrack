<?php

namespace App\Http\Controllers;

use App\Services\UniteService;
use Illuminate\Http\Request;

class UniteController extends Controller
{
    protected $uniteService;

    public function __construct(UniteService $uniteService)
    {
        $this->uniteService = $uniteService;
    }

    public function index()
    {
        $unites =  $this->uniteService->getAllUnites();
        return view('pages.unites.index', compact('unites'));
    }

    public function create()
    {
        return view('pages.unites.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'libelle' => 'required',
            'localisation' => 'required',
            'ref' => 'required',
        ]);

        $this->uniteService->createUnite($request->all());
        return redirect()->route('unites.index')->with('success', 'Unite created successfully');
    }

    public function edit($id)
    {
        $unite = $this->uniteService->getUniteById($id);
        return view('pages.unites.edit', compact('unite'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required',
            'localisation' => 'required',
            'ref' => 'required',
        ]);

        $this->uniteService->updateUnite( $id, $request->all());
        return redirect()->route('unites.index')->with('success', 'Unite updated successfully');
    }

    public function show($id)
    {
        dd($id);
        return redirect()->route('unites.index')->with('success', 'Unite updated successfully');
    }

}
