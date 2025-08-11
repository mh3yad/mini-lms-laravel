<?php

namespace App\Repositories;

use BaseContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class Base implements BaseContract
{
    /**
     * @param Model $model
     */
    public function __construct(protected Model $model)
    {

    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * @return Collection
     */
    public function findAll(): Collection
    {
        return $this->model->get();
    }

    /**
     * @param int $id
     * @param array $data
     * @return Model
     */
    public function update(int $id, array $data): Model
    {
        return $this->model->where('id', $id)->update($data);
    }

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
       return $this->model->delete($id);
    }
}