<?php

namespace App\Http\Controllers;

use App\Models\Assurance;
use App\Services\AssuranceService;
use Illuminate\Http\Request;

class AssuranceController extends Controller
{
    public AssuranceService $service;
    public function __construct(AssuranceService $assurance){
        $this->service = $assurance;
    }

    public function index()
    {
        $assurances = $this->service->getAll();
        return view('pages.assurances.index', compact('assurances'));
    }

    public function create()
    {
        return view('pages.assurances.create');
    }

    public function store(Request $request)
    {
        $assurance = $this->service->create($request->all());
        return redirect()->route('assurances.index');
    }



    public function edit($id)
    {
        $assurance = $this->service->findById($id);
        return view('pages.assurances.edit', compact('assurance'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());    
        $this->service->update($id, $request->all());
        return redirect()->route('assurances.index');
    }
}
