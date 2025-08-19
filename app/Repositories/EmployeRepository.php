<?php

namespace App\Repositories;

use App\Gateway\EmployeRepositoryinterface;

class EmployeRepository implements EmployeRepositoryinterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        // Initialization code if needed
    }

    /**
     * Get all employees.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return \App\Models\Employe::all();
    }

    /**
     * Find an employee by ID.
     *
     * @param int $id
     * @return \App\Models\Employe|null
     */
    public function findById($id)
    {
        return \App\Models\Employe::find($id);
    }

    /**
     * Create a new employee.
     *
     * @param array $data
     * @return \App\Models\Employe
     */
    public function create(array $data)
    {
        return \App\Models\Employe::create($data);
    }

    /**
     * Update an existing employee.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Employe
     */
    public function update($id, array $data)
    {
        $employe = $this->findById($id);
        if ($employe) {
            $employe->update($data);
        }
        return $employe;
    }
    /**
     * Delete an employee.
     *
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        $employe = $this->findById($id);
        if ($employe) {
            return $employe->delete();
        }
        return false;
    }
}
