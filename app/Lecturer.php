<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;

class Lecturer extends Model
{
    protected $fillable = ['name'];

    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
