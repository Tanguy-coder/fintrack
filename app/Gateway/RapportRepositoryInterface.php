<?php

namespace App\Gateway;

use Illuminate\Database\Eloquent\Collection;

interface RapportRepositoryInterface
{
    public function getDepensesParTypeEntreDates(string $dateDebut, string $dateFin, ?int $typeDepenseId = null): Collection;
    public function getSalairesEntreDates(string $dateDebut, string $dateFin): Collection;
    public function getDepensesParTypeGroupeEntreDates(string $dateDebut, string $dateFin, ?int $typeDepenseId = null): Collection;
    public function getSalairesGroupeEntreDates(string $dateDebut, string $dateFin): Collection;
    public function getDatasEntreDates(array $type ,string $dateDebut, string $dateFin);

}
