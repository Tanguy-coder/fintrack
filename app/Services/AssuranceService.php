<?php

namespace App\Services;

use App\Gateway\AssuranceRepositoryInterface;

class AssuranceService
{
    /**
     * Create a new class instance.
     */
    public $service;
    public function __construct(AssuranceRepositoryInterface $service)
    {
        $this->service = $service;
    }
    public function getAll(){
        return $this->service->findAll();
    }

    public function findById($id)
    {
        return $this->service->find($id);
    }

    public function create($attributes)
    {
        // dd($attributes);
        return $this->service->create($attributes);
    }

    public function update($id, $attributes)
    {
        return $this->service->update($id, $attributes);
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }

}
