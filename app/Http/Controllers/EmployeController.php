<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Services\EmployeService;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public EmployeService $service;
    public function __construct(EmployeService $employeService)
    {
        $this->service = $employeService;
    }
    public function index(){
        $employes = $this->service->getAllEmployes();
        return view('pages.employes.index',compact('employes'));
    }

    public function create(){
        return view('pages.employes.create');
    }

    public function store(Request $request){
        $employes = $this->service->createEmploye($request->all());
        return redirect()->route('employes.index');
    }

    public function edit($id){
        $employe = $this->service->getEmployeById($id);
        return view('pages.employes.edit',compact('employe'));
    }

    public function update($id, Request $request){
        // dd($request->all());
        $employe = $this->service->updateEmploye($id, $request->all());
        return redirect()->route('employes.index');
    }


}
