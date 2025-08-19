<?php

namespace App\Services;

use App\Gateway\TypeEntreeRepositoryInterface;

class TypeEntreeService
{
    /**
     * Create a new class instance.
     */
    public $repository;
    public function __construct(TypeEntreeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function getAll()
    {
        return $this->repository->getAll();
    }
    public function show(int $id)
    {
        return $this->repository->show($id);
    }
    public function store(array $data)
    {
        return $this->repository->store($data);
    }
    public function update(int $id, array $data)
    {        return $this->repository->update($id, $data);
    }
    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
