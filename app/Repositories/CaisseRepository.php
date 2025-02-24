<?php

namespace App\Repositories;

use App\Models\Caisse;

class CaisseRepository implements CaisseRepositoryInterface
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
        return Caisse::all();
    }

    public function getById($id)
    {
        return Caisse::find($id);
    }

    public function createCaisse($data)
    {
        return Caisse::create($data);
    }

    public function update($id, $data)
    {
        $caisse = Caisse::find($id);
        return $caisse->update($data);
    }

    public function delete($id)
    {
        return Caisse::destroy($id);
    }
}
