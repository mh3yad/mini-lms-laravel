<?php

namespace App\Services;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Repositories\CourseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CourseService
{

    public function __construct(protected CourseRepository $courseRepository)
    {

    }
    public function find(int $id): ?Model
    {
        return $this->courseRepository->find($id);
    }

    public function findAll(): Collection
    {
       return $this->courseRepository->findAll();
    }

    public function update(int $id,UpdateCourseRequest $request): bool
    {
        $data = $request->validated();
        return $this->courseRepository->update($id, $data);
    }

    public function create(StoreCourseRequest $request): Model
    {
        $data = $request->validated();
        return $this->courseRepository->create($data);
    }

    public function delete(int $id): bool
    {
        return $this->courseRepository->delete($id);
    }
}