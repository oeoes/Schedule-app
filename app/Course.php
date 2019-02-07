<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lecturer;
use App\Room;

class Course extends Model
{
    protected $fillable = ['course_name', 'initial', 'lecturer_id', 'room_id', 'day', 'time_begin', 'time_finish', 'sks', 'status'];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
