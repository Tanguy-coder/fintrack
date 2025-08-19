<?php

namespace App\Gateway;

interface EmployeRepositoryinterface
{
    /**
     * Get all employees.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll();

    /**
     * Find an employee by ID.
     *
     * @param int $id
     * @return \App\Models\Employe|null
     */
    public function findById($id);

    /**
     * Create a new employee.
     *
     * @param array $data
     * @return \App\Models\Employe
     */
    public function create(array $data);

    /**
     * Update an existing employee.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Employe
     */
    public function update($id, array $data);

    /**
     * Delete an employee.
     *
     * @param int $id
     * @return bool
     */
    public function delete($id);
}
