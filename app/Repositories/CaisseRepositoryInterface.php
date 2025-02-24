<?php

namespace App\Repositories;

interface CaisseRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function createCaisse($data);
    public function update($id, $data);
    public function delete($id);

}
