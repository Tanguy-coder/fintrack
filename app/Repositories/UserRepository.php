<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAll(): Collection
    {
        return User::all();
    }
    public function findById($id): ?User
    {
        return User::find($id);
    }
    public function create($user): User
    {
        return User::create($user);
    }
    public function update($id, $user)
    {
        return User::find($id)->update($user);
    }
    public function delete($id)
    {
        return User::destroy($id);
    }


    public function getAllRoles(): Collection
    {
        return Role::all();
    }


}
