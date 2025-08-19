<?php

namespace App\Gateway;

interface TypeEntreeRepositoryInterface
{
    public function getAll();

    public function show(int $id);

    public function store(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);
}
