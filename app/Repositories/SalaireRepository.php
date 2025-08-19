<?php

namespace App\Repositories;

use App\Gateway\SalaireRepositoryInterface;
use App\Models\Assurance;
use App\Models\Employe;
use Illuminate\Support\Str;


class SalaireRepository implements SalaireRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new \App\Models\Salaire();
    }

    public function getAllSalaires()
    {
        return $this->model->all();
    }

    public function getSalaireById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function createSalaire(array $data)
    {

        $token = Str::random(32) ?? null;
        $employes = Employe::where('actif', true)->get();
        for ($i=0; $i < count($employes); $i++) {
            $salaire_employe = $employes[$i]->salaire;
            $assurance = Assurance::find($data['assurance_id']);
            $data['employe_id'] = $employes[$i]->id;
            $data['salaire_brut'] = $salaire_employe;
            $data['cotisations_employe'] = $assurance->rate_employe * $salaire_employe/ 100;
            $data['cotisations_employeur'] = $assurance->rate_employeur * $salaire_employe / 100;
            $data['salaire_net'] = $salaire_employe - $data['cotisations_employe'];
            $data['token'] = $token;
            // dd($data);
            $this->model->create($data);
        }

        return $token;
    }

    public function updateSalaire($id, array $data)
    {
        $salaire = $this->getSalaireById($id);
        $salaire->update($data);
        return $salaire;
    }

    public function deleteSalaire($id)
    {
        $salaire = $this->getSalaireById($id);
        return $salaire->delete();
    }

    public function getSalairesByEmployeId($employeId)
    {
        return $this->model->where('employe_id', $employeId)->get();
    }

    public function printSalairesReceipts($token)
    {
        return $this->model->with('employe', 'assurance')->where('token', $token)->get();
    }
}

