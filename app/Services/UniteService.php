<?php

namespace App\Services;

use App\Repositories\UniteRepositoryInterface;

class UniteService
{
    protected $uniteRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(UniteRepositoryInterface $uniteRepository)
    {
        $this->uniteRepository = $uniteRepository;
    }

    public function getAllUnites()
    {
        return $this->uniteRepository->getAll();
    }
    public function getUniteById($id)
    {
        return $this->uniteRepository->findById($id);
    }
    public function createUnite($data)
    {
        return $this->uniteRepository->create($data);
    }
    public function updateUnite($id, $data)
    {
        return $this->uniteRepository->update($id, $data);
    }
    public function deleteUnite($id)
    {
        return $this->uniteRepository->delete($id);
    }


}
