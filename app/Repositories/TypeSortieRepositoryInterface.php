<?php

namespace App\Repositories;

interface TypeSortieRepositoryInterface
{
    public function getAll();
    public function findById($id);
    public function create($typeSortie);
    public function delete($id);
    public function update($id, $typeSortie);
}
