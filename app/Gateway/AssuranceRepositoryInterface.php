<?php

namespace App\Gateway;

use App\Models\Assurance;

interface AssuranceRepositoryInterface
{
    public function find($id);
    public function findAll();
    public function create($assurance);
    public function update($id, $assurance);
    public function delete($id);
}
