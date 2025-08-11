<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'teacher_id',
    ];


    public function sessions(): HasMany
    {
       return $this->hasMany(CourseSession::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class,'teacher_id');
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'student_course','course_id','student_id');
    }
}
