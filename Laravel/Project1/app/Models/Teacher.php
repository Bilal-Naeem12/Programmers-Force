<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
   protected $fillable = [
        'name', 'email', 'specialization'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
