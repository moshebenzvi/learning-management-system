<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'title', 'description'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

   // A Course belongs to a User (Instructor)
   public function instructor()
   {
       return $this->belongsTo(User::class, 'user_id');
   }

   // A Course has many lessons
   public function lessons()
   {
       return $this->hasMany(Lesson::class);
   }

   // A Course has many enrolled users
   public function enrolledUsers()
   {
       return $this->belongsToMany(User::class, 'course_user');
   }
}
