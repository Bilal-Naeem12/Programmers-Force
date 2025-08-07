<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{ use HasFactory;
  protected $fillable = [
        'name', 'email', 'phone', 'course_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function attendanceRecords()
    {
        return $this->hasMany(Attendance::class);
    }







    public function user()
{
    return $this->morphOne(User::class, 'userable');
}

}
