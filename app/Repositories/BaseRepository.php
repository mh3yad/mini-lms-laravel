<?php

namespace App\Repositories;

use App\Repositories\Contract\BaseContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseContract
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
        return $this->model::find($id);
    }

    /**
     * @return Collection
     */
    public function findAll(): Collection
    {
        return $this->model::all();
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        return $this->model->where('id',$id)->update($data);
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
        return $this->model->destroy($id);
    }
}