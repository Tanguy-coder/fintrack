<?php

namespace App\Repositories;

use App\Models\TypeSortie;

class TypeSortieRepository implements TypeSortieRepositoryInterface
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
        return TypeSortie::all();
    }

    public function findById($id)
    {
        return TypeSortie::find($id);
    }

    public function create($data)
    {
        return TypeSortie::create($data);
    }
    public function update($id, $data)
    {
        $typeSortie = TypeSortie::find($id);
        return $typeSortie->update($data);
    }
    public function delete($id)
    {
        return TypeSortie::destroy($id);
    }

}
