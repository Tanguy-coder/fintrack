<?php

namespace App\Gateway;

use App\Models\Sortie;
use Illuminate\Database\Eloquent\Collection;

interface SortieRepositoryInterface
{
    public function getAll(): Collection;
    public function findById(int $id): ?Sortie;
    public function create(array $data): Sortie;
    public function update(int $id, array $data): Sortie;
    public function getAllTypesSortie(): Collection;
    public function getAllCaisses(): Collection;

}
