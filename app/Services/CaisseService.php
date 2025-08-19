<?php

namespace App\Services;

use App\Gateway\CaisseRepositoryInterface;

class CaisseService
{
    /**
     * Create a new class instance.
     */
    protected $caisseRepository;

    public function __construct(CaisseRepositoryInterface $caisseRepository)
    {
        $this->caisseRepository = $caisseRepository;
    }

    public function getAllCaisse()
    {
        return $this->caisseRepository->getAll();
    }

    public function getById($id)
    {
        return $this->caisseRepository->getById($id);
    }

    public function store($request)
    {
        return $this->caisseRepository->createCaisse($request);
    }

    public function update($id, $request)
    {
        return $this->caisseRepository->update($id, $request);
    }

    public function delete($id)
    {
        return $this->caisseRepository->delete($id);
    }
}
