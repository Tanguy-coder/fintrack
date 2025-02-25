<?php

namespace App\Repositories;

use App\Models\Caisse;
use App\Models\Sortie;
use App\Models\TypeSortie;
use Illuminate\Database\Eloquent\Collection;

class SortieRepository implements SortieRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAll(): Collection
    {
        return Sortie::with(['typeSortie', 'user', 'caisse'])->get();
    }

    public function findById(int $id): ?Sortie
    {
        return Sortie::with(['typeSortie', 'user', 'caisse'])->find($id);
    }

    public function create(array $data): Sortie
    {
        return Sortie::create($data);
    }

    public function getAllTypesSortie(): Collection
    {
        return TypeSortie::all();
    }

    public function getAllCaisses(): Collection
    {
        return Caisse::all();
    }
}
