<?php

namespace App\Repository;

use App\Common\Tools\Setting;

interface EloquentRepositoryInterface
{
    public function load($object);
    public function all($columns = ['*']);
    public function paginate($perPage = Setting::PAGE_SIZE, $columns = ['*']);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
    public function find(int $id, $columns = ['*']);
    public function findBy($field, $value, $columns = ['*']);
}
