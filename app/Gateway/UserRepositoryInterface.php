<?php

namespace App\Gateway;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function getAll():Collection;
    public function findById($id): ?User;
    public function create($user): User;
    public function update($id, $user);
    public function delete($id);
    public function getAllRoles() : Collection;
}
