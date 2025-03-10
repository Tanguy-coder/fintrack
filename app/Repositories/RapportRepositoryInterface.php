<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface RapportRepositoryInterface
{
    public function getDepensesParTypeEntreDates(string $dateDebut, string $dateFin, ?int $typeDepenseId = null): Collection;

}
