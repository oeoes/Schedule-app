<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;

class Lecturer extends Model
{
    protected $fillable = ['name', 'photo'];

    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
