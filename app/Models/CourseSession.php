<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseSession extends Model
{
    protected $fillable = [
        'course_id,',
        'title',
        'scheduled_at,',
        'duration_minutes',
    ];
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
