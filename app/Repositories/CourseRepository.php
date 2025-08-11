<?php

namespace App\Repositories;

use App\Repositories\Contract\BaseContract;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
class CourseRepository extends BaseRepository implements BaseContract
{
    public function __construct(protected Course $course)
    {
        parent::__construct($this->course);
    }
}