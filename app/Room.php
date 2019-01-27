<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;

class Room extends Model
{
    protected $fillable = ['room'];

    public function course()
    {
        return $this->hasMany(Course::class);
    }
}
