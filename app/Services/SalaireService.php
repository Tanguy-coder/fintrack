<?php

namespace App\Services;

use App\Gateway\AssuranceRepositoryInterface;
use App\Gateway\EmployeRepositoryinterface;
use App\Gateway\SalaireRepositoryInterface;

class SalaireService
{
    /**
     * Create a new class instance.
     */
    public $repository;
    public $assuranceRepository;
    public $employesRepository;
    public function __construct(SalaireRepositoryInterface $repository,
                                 AssuranceRepositoryInterface $assuranceRepository,
                                 EmployeRepositoryinterface $employesRepository)
    {
        $this->repository = $repository;
        $this->assuranceRepository = $assuranceRepository;
        $this->employesRepository = $employesRepository;
    }

    public function getAllSalaires()
    {
        return $this->repository->getAllSalaires();
    }

    public function getSalaireById($id)
    {
        return $this->repository->getSalaireById($id);
    }

    public function getCreatePageData()
    {
            $modesPaiements = collect([
                ['id' => 1, 'libelle' => 'Virement bancaire'],
                ['id' => 2, 'libelle' => 'Chèque'],
                ['id' => 3, 'libelle' => 'Espèces'],
                ['id' => 4, 'libelle' => 'Mobile Money']
            ])->map(function ($item) {
                return (object) $item;
            });
        return [
            'employes' => $this->employesRepository->getAll(),
            'assurances' => $this->assuranceRepository->findAll(),
            'modesPaiements'=> $modesPaiements
        ];
    }

    public function getCotisations($assuranceId)
    {
        $assurance = $this->assuranceRepository->find($assuranceId);
        if (!$assurance) {
            throw new \Exception('Assurance not found');
        }
       return response()->json([
        'cotisations_employe' => $assurance->rate_employe,
        'cotisations_employeur' => $assurance->rate_employeur
    ]);
    }

    public function createSalaire(array $data)
    {
        return $this->repository->createSalaire($data);
    }

    public function updateSalaire($id, array $data)
    {
        return $this->repository->updateSalaire($id, $data);
    }

    public function deleteSalaire($id)
    {
        return $this->repository->deleteSalaire($id);
    }

    public function getSalairesByEmployeId($employeId)
    {
        return $this->repository->getSalairesByEmployeId($employeId);
    }

    public function printSalairesReceipts($token)
    {
        return $this->repository->printSalairesReceipts($token);
    }

}
