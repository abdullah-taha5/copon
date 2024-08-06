<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface GlobalContract
{
    public function getPaginatedRows(int $count, string $search = '');

    public function getRowById(int $id);

    public function getAllRows();

    public function store(array $data);

    public function update(array $data, Model $model);

    public function delete(Model $model);

    public function deleteGroup(array $IDs);
}
