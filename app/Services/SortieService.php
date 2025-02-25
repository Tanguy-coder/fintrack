<?php

namespace App\Services;

use App\Models\Sortie;
use App\Repositories\SortieRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SortieService
{
    /**
     * Create a new class instance.
     */
    protected $sortieRepository;

    public function __construct(SortieRepositoryInterface $sortieRepository)
    {
        $this->sortieRepository = $sortieRepository;
    }

    public function listSorties(): Collection
    {
        return $this->sortieRepository->getAll();
    }

    public function getSortieById(int $id): ?Sortie
    {
        return $this->sortieRepository->findById($id);
    }

    public function createSortie(array $data): Sortie
    {
        return $this->sortieRepository->create($data);
    }

    public function getCreatePageData(): array
    {
        return [
            'typesSortie' => $this->sortieRepository->getAllTypesSortie(),
            'caisses' => $this->sortieRepository->getAllCaisses(),
        ];
    }
}
