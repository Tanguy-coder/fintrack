<?php

namespace App\Repositories;

use App\Gateway\TypeEntreeRepositoryInterface;
use App\Models\TypeEntree;

class TypeEntreeRepository implements TypeEntreeRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    protected $model;
    public function __construct()
    {
        $this->model = new TypeEntree();
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        return tap($this->show($id))->update($data);
    }

    public function delete($id)
    {
        return tap($this->show($id))->delete();
    }
}
