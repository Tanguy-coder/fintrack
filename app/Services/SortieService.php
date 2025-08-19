<?php

namespace App\Services;

use App\Gateway\SortieRepositoryInterface;
use App\Models\Sortie;
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
            'operation' => collect([
                ['id' => 1, 'libelle' => 'ENTREE'],
                ['id' => 2, 'libelle' => 'DEPENSE'],

            ])->map(function ($item) {
                return (object) $item;
            })->toArray()
        ];
    }

    public function updateSortie(int $id, array $data): Sortie
    {
        return $this->sortieRepository->update($id, $data);
    }
}
