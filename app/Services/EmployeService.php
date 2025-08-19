<?php

namespace App\Services;

use App\Gateway\EmployeRepositoryinterface;

class EmployeService
{
    public EmployeRepositoryinterface $employeRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(EmployeRepositoryinterface $employeRepository)
    {
        $this->employeRepository = $employeRepository;
    }
    public function getAllEmployes()
    {
        return $this->employeRepository->getAll();
    }
    public function getEmployeById($id)
    {
        return $this->employeRepository->findById($id);
    }
    public function createEmploye(array $data)
    {
        return $this->employeRepository->create($data);
    }
    public function updateEmploye($id, array $data)
    {
        return $this->employeRepository->update($id, $data);
    }
}
