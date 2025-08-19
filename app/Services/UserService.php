<?php

namespace App\Services;

use App\Gateway\UserRepositoryInterface;

class UserService
{
    /**
     * Create a new class instance.
     */
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserById($id)
    {
        return $this->userRepository->findById($id);
    }
    public function getAllUsers()
    {
        return $this->userRepository->getAll();
    }
    public function createUser($user)
    {
        return $this->userRepository->create($user);
    }
    public function updateUser($id, $user)
    {
        return $this->userRepository->update($id, $user);
    }
    public function deleteUser($id)
    {
        return $this->userRepository->delete($id);
    }


    public function getCreatePageData(): array
    {
        return [
            'roles' => $this->userRepository->getAllRoles(),
        ];
    }

}
