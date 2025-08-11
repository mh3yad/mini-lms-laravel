<?php

use App\Models\Course;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
interface BaseRepositoryContract
{
    /**
     * @param int $id
     * @return Model|null
     */
    public function find(int $id): ?Model;

    /**
     * @return Collection
     */
    public function findAll(): Collection;

    /**
     * @param int $id
     * @param array $data
     * @return Model
     */
    public function update(int $id, array $data): Model;

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}