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
        $day = Carbon::now('Asia/Jakarta');
        $day_course = $day->format('l');
        // $day_course = 'monday';

        $data = Course::where('day', $day_course)->with('lecturer', 'room')->get();
        
        return view('index')->with(['data' => $data, 'day_course' => $day_course, 'colors' => $this->colors]);
    }
    
    /*
    * For Api
    */
    public function courseList()
    {
        $day = Carbon::now('Asia/Jakarta');
        $day_course = $day->format('l');
        // $day_course = 'monday';

        $data = Course::where('day', $day_course)->with('lecturer', 'room')->orderBy('room_id')->get();
        return $data;
    }

    public function sortRoom($id, $state)
    {
        $day = Carbon::now('Asia/Jakarta');
        $day_course = $day->format('l');
        
        if($state == 'false'){
            return Course::where('room_id', $id)->with('lecturer', 'room')->get();
        }
        else{
            return Course::where(['room_id' => $id, 'day' => $day_course])->with('lecturer', 'room')->get();
        }
    }

    
}
