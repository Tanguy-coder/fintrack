<?php

namespace App\Services;

use App\Gateway\RapportRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class RapportService
{
    /**
     * Create a new class instance.
     */
    protected $rapportRepository;
    public function __construct(RapportRepositoryInterface $rapportRepository)
    {
        $this->rapportRepository = $rapportRepository;
    }

    public function genererRapportEntreDates(string $dateDebut, string $dateFin, ?int $typeDepenseId = null): Collection
    {
        return $depensesParType = $this->rapportRepository->getDepensesParTypeEntreDates($dateDebut, $dateFin, $typeDepenseId);

    }

    public function getSalairesBetweenDates(string $dateDebut, string $dateFin): Collection
    {
        return $this->rapportRepository->getSalairesEntreDates($dateDebut, $dateFin);
    }

    public function getDatasBetweenDates(array $type, string $dateDebut, string $dateFin)
    {
        return $this->rapportRepository->getDatasEntreDates($type, $dateDebut, $dateFin);
    }

    public function getRapportPageData()
    {
         $datas = collect([
                ['id' => 1, 'libelle' => 'ENTREES'],
                ['id' => 2, 'libelle' => 'SORTIES'],
                ['id' => 3, 'libelle' => 'SALAIRES'],
            ])->map(function ($item) {
                return (object) $item;
            });

            return $datas;
    }

}
