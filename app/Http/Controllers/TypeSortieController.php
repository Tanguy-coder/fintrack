<?php

namespace App\Http\Controllers;

use App\Services\TypeSortieService;
use Illuminate\Http\Request;

class TypeSortieController extends Controller
{
    protected $typeSortieService;
    public function __construct(TypeSortieService $typeSortieService)
    {
        $this->typeSortieService = $typeSortieService;
    }

    public function index()
    {
        $typeSorties = $this->typeSortieService->getAllTypeSorties();
        return view('pages.typeSorties.index', compact('typeSorties'));
    }

    public function create()
    {
        $operation = $this->typeSortieService->getCreatePageData();
        return view('pages.typeSorties.create', compact('operation'));
    }

    public function getTypeSorties($type)
    {
        return response()->json($this->typeSortieService->getOperationByType($type));
    }

    public function store(Request $request)
    {
        $this->typeSortieService->createTypeSortie($request->all());
        return redirect()->route('typeSorties.index');
    }
    public function edit($id)
    {
        $typeSortie = $this->typeSortieService->getTypeSortieById($id);
        $operation = $this->typeSortieService->getCreatePageData();
        return view('pages.typeSorties.edit', compact('typeSortie', 'operation'));
    }
    public function update(Request $request, $id)
    {
        $this->typeSortieService->updateTypeSortie($id, $request->all());
        return redirect()->route('typeSorties.index');
    }
    public function destroy($id)
    {
        $this->typeSortieService->deleteTypeSortie($id);
        return redirect()->route('typeSorties.index');
    }

}
