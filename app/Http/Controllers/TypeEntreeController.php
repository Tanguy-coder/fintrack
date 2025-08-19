<?php

namespace App\Http\Controllers;

use App\Services\TypeEntreeService;
use Illuminate\Http\Request;

class TypeEntreeController extends Controller
{
    public $service;
    public function __construct(TypeEntreeService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        $typeEntrees = $this->service->getAll();
        return view('pages.typeEntrees.index', compact('typeEntrees'));
    }

    public function create()
    {
        return view('pages.typeEntrees.create');
    }

    public function getTypeEntrees()
    {
        return response()->json($this->service->getAll());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'libelle' => 'required|string|max:255',
        ]);
        $this->service->store($data);
        return redirect()->route('typeEntrees.index')->with('success', 'Type d\'entrée créé avec succès.');
    }

    public function edit($id)
    {
        $typeEntree = $this->service->show($id);
        return view('pages.typeEntrees.edit', compact('typeEntree'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'libelle' => 'required|string|max:255',
        ]);
        $this->service->update($id, $data);
        return redirect()->route('typeEntrees.index')->with('success', 'Type d\'entrée mis à jour avec succès.');
    }
    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('typeEntrees.index')->with('success', 'Type d\'entrée supprimé avec succès.');
    }
}
