<?php

namespace App\Repositories;

use App\Models\Unite;

class UniteRepository implements UniteRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function getAll()
    {
        return Unite::all();
    }


    public function findById(int $id)
    {
        return Unite::findOrFail($id);
    }


    public function delete(int $id)
    {
        return Unite::findOrFail($id)->delete();
    }


    public function create(array $data)
    {
        return Unite::create($data);
    }

    public function update(int $id, array $data)
    {
        $unite = Unite::findOrFail($id);
        $unite->update($data);
        return $unite;
    }
}
