<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Carbon\Carbon;

class ScheduleNewVersion extends Controller
{
    public function home()
    {
        return view('new-version.all-course');
    }

    public function lab301()
    {
        $day = Carbon::now('Asia/Jakarta');
        $day_course = $day->format('l');

        $data = Course::where(['day' => $day_course, 'room_id' => 1])->where('status', '!=', 'end')->with('lecturer', 'room')->orderBy('sesi')->limit(2)->get();
        if(count($data) > 1){
            $data[0]["next_course"] = $data[1]->course_name;
            $data[0]["next_time_begin"] = $data[1]->time_begin;
            $data[0]["next_time_finish"] = $data[1]->time_finish;
        }        

        return response()->json([$data[0]]);
    }

    public function lab301Cek()
    {
        $day = Carbon::now('Asia/Jakarta');
        $day_course = $day->format('l');

        $data = Course::where(['day' => $day_course, 'room_id' => 1])->where('status', '!=', 'end')->with('lecturer', 'room')->orderBy('sesi')->limit(2)->get();
        if(count($data) > 1){
            $data[0]["next_course"] = $data[1]->course_name;
            $data[0]["next_time_begin"] = $data[1]->time_begin;
            $data[0]["next_time_finish"] = $data[1]->time_finish;
        }        

        return response()->json([$data[0]]);
    }

    public function lab302()
    {
        $day = Carbon::now('Asia/Jakarta');
        $day_course = $day->format('l');

        $data = Course::where(['day' => $day_course, 'room_id' => 2])->where('status', '!=', 'end')->with('lecturer', 'room')->orderBy('sesi')->limit(2)->get();
        if(count($data) > 1){
            $data[0]["next_course"] = $data[1]->course_name;
            $data[0]["next_time_begin"] = $data[1]->time_begin;
            $data[0]["next_time_finish"] = $data[1]->time_finish;
        }        

        return response()->json([$data[0]]);
    }

    public function lab302Cek()
    {
        $day = Carbon::now('Asia/Jakarta');
        $day_course = $day->format('l');

        $data = Course::where(['day' => $day_course, 'room_id' => 2])->where('status', '!=', 'end')->with('lecturer', 'room')->orderBy('sesi')->limit(2)->get();
        if(count($data) > 1){
            $data[0]["next_course"] = $data[1]->course_name;
            $data[0]["next_time_begin"] = $data[1]->time_begin;
            $data[0]["next_time_finish"] = $data[1]->time_finish;
        }        

        return response()->json([$data[0]]);
    }

    public function lab303()
    {
        $day = Carbon::now('Asia/Jakarta');
        $day_course = $day->format('l');

        $data = Course::where(['day' => $day_course, 'room_id' => 3])->where('status', '!=', 'end')->with('lecturer', 'room')->orderBy('sesi')->limit(2)->get();
        if(count($data) > 1){
            $data[0]["next_course"] = $data[1]->course_name;
            $data[0]["next_time_begin"] = $data[1]->time_begin;
            $data[0]["next_time_finish"] = $data[1]->time_finish;
        }        

        return response()->json([$data[0]]);
    }

    public function lab303Cek()
    {
        $day = Carbon::now('Asia/Jakarta');
        $day_course = $day->format('l');

        $data = Course::where(['day' => $day_course, 'room_id' => 3])->where('status', '!=', 'end')->with('lecturer', 'room')->orderBy('sesi')->limit(2)->get();
        if(count($data) > 1){
            $data[0]["next_course"] = $data[1]->course_name;
            $data[0]["next_time_begin"] = $data[1]->time_begin;
            $data[0]["next_time_finish"] = $data[1]->time_finish;
        }        

        return response()->json([$data[0]]);
    }
}
