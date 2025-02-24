<?php

namespace App\Services;

use App\Repositories\TypeSortieRepositoryInterface;

class TypeSortieService
{
    protected $typeSortie;
    /**
     * Create a new class instance.
     */

    public function __construct(TypeSortieRepositoryInterface $typeSortie)
    {
        $this->typeSortie = $typeSortie;
    }

    public function getAllTypeSorties()
    {
        return $this->typeSortie->getAll();
    }
    public function getTypeSortieById($id)
    {
        return $this->typeSortie->findById($id);
    }
    public function createTypeSortie($data)
    {
        return $this->typeSortie->create($data);
    }
    public function updateTypeSortie($id, $data)
    {
        return $this->typeSortie->update($id, $data);
    }
    public function deleteTypeSortie($id)
    {
        return $this->typeSortie->delete($id);
    }

}
