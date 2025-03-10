<?php

namespace App\Services;

use App\Repositories\RapportRepositoryInterface;
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

}
