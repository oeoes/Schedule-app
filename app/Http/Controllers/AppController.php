<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Carbon\Carbon;

class AppController extends Controller
{
    // Create random colors for background course list
    public $colors = [
        'bg-navy', 'bg-blue', 'bg-aqua', 'bg-teal', 'bg-olive', 'bg-green', 'bg-lime', 'bg-yellow', 'bg-orange', 'bg-red',
        'bg-maroon', 'bg-fuchsia', 'bg-purple', 'bg-gray'
    ];

    public function index()
    {
        $day = Carbon::now();
        // $day_course = $day->format('l');
        $day_course = 'monday';

        $data = Course::where('day', $day_course)->with('lecturer', 'room')->get();
        
        return view('index')->with(['data' => $data, 'day_course' => $day_course, 'colors' => $this->colors]);
    }  

    public function sortRoom($id)
    {       
        $data = Course::where('room_id', $id)->with('lecturer', 'room')->get();
        $room = Course::where('room_id', $id)->with('lecturer', 'room')->first();

        return view('index')->with(['data' => $data, 'myroom' => $room, 'colors' => $this->colors]);
    }

    
}
