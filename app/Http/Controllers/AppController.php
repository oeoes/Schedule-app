<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Carbon\Carbon;
use App\Room;
use App\Lecturer;

class AppController extends Controller
{
    // Showing index page with today's courses
    public function index()
    {
        $day = Carbon::now('Asia/Jakarta');
        $day_course = $day->format('l');

        $data = Course::where('day', $day_course)->with('lecturer', 'room')->get();
        
        return view('index')->with(['data' => $data, 'day_course' => $day_course]);
    }
    
    /*
    * For Api
    */
    
    // Getting today's courses asynchronously
    public function courseList()
    {
        $day = Carbon::now('Asia/Jakarta');
        $day_course = $day->format('l');

        $data = Course::where('day', $day_course)->with('lecturer', 'room')->orderBy('room_id')->get();
        return $data;
    }

    // Check status changes of courses (start time, finish time) asynchronously
    public function changeState()
    {
        $day = Carbon::now('Asia/Jakarta');
        $course = Course::where('time_begin', $day->toTimeString())->where('day', $day->format('l'))->get();
        $course1 = Course::where('time_finish', $day->toTimeString())->where('day', $day->format('l'))->get();

        // Update all courses status to default (queue / belum dimulai) when the time reaches 05.00 PM
        // Or when lab secretary closed
        if($day->toTimeString() == '22:41:00')
        {
            $lab_closed = Course::where('day', $day->format('l'))->get();

            foreach ($lab_closed as $c) {
                $c->status = 'queue';
                $c->save();
            }
            return response()->json(Course::where('day', $day->format('l'))->with('lecturer', 'room')->orderBy('room_id')->get());
        }

        // Update started course status to 'start'
        foreach ($course as $c) {
            $c->status = 'start';
            $c->save();
        }
        
        // Update finished course status to 'end'
        foreach ($course1 as $c) {
            $c->status = 'end';
            $c->save();
        }

        // Return data wheter started course or finished course available, 
        // but not if both of them are empty of false
        if(count($course) || count($course1))
        {
            return response()->json(Course::where('day', $day->format('l'))->with('lecturer', 'room')->orderBy('room_id')->get());
        }
    }

    // Getting lecturers list asynchronously
    public function apiLecturer()
    {
        $lec = Lecturer::orderBy('name')->orderBy('updated_at', 'DESC')->get();
        return $lec;
    }

    /*
    */

    // Sort room by room id and state(today) if today checkbox was checked,
    // otherwise just sort based on room_id
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

    // View lecturer page
    public function lecturer()
    {
        return view('lecturer');
    }
    
}
