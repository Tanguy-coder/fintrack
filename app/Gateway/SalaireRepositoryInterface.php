<?php

namespace App\Gateway;

interface SalaireRepositoryInterface
{
    public function getAllSalaires();

    public function getSalaireById($id);

    public function createSalaire(array $data);

    public function updateSalaire($id, array $data);

    public function deleteSalaire($id);

    public function getSalairesByEmployeId($employeId);
    
    public function printSalairesReceipts($token);
}
