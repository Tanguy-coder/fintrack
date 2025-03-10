<?php

namespace App\Repositories;

use App\Models\Sortie;
use Illuminate\Database\Eloquent\Collection;

class RapportRepository implements RapportRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getDepensesParTypeEntreDates(string $dateDebut, string $dateFin, ?int $typeSortieId = null): Collection
    {
        $query = Sortie::whereBetween('date', [$dateDebut, $dateFin])
            ->with('typeSortie')
            ->with('caisse')
            ->with('user');

        if ($typeSortieId) {
            $query->where('type_sortie_id', $typeSortieId);
        }

        return $query->get();
    }
}
