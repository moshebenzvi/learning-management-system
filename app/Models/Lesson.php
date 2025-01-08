<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    /** @use HasFactory<\Database\Factories\LessonFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['course_id', 'title', 'content'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    // A Lesson belongs to a Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // A Lesson has many users who have completed it
    public function completedByUsers()
    {
        return $this->belongsToMany(User::class, 'lesson_user');
    }
}
