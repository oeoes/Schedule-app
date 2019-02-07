<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Carbon\Carbon;
use App\Lecturer;

class DashboardController extends Controller
{
    // Create random colors for background course list
    public $colors = [
        'bg-navy', 'bg-blue', 'bg-aqua', 'bg-teal', 'bg-olive', 'bg-green', 'bg-lime', 'bg-yellow', 'bg-orange', 'bg-red',
        'bg-maroon', 'bg-fuchsia', 'bg-purple', 'bg-gray'
    ];

    // Protecting for authenticated admin
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function lecturer()
    {
        return view('dashboard.lecturer');
    }

    // Api
    public function apiLecturer()
    {
        $lec = Lecturer::orderBy('state')->orderBy('updated_at', 'DESC')->get();
        return $lec;
    }

    public function apiLecturerSetState($id)
    {
        $le = Lecturer::find($id);
        if($le->state == 'available'){
            $le->state = 'unavailable';
            $le->save();
        }else{
            $le->state = 'available';
            $le->save();
        }

        $lec = Lecturer::find($id);

        return response()->json($lec);
    }

    public function addLecturer($lecturer_name)
    {
        Lecturer::create(['name' => $lecturer_name]);
        $baru = Lecturer::orderBy('state')->orderBy('updated_at', 'DESC')->get();

        return response()->json($baru);
    }

    public function home()
    {
        $lec = Lecturer::orderBy('id')->get();
        $data = Course::with('lecturer', 'room')->orderBy('room_id')->get();
        return view('dashboard.home')->with(['data' => $data, 'colors' => $this->colors, 'lecturer' => $lec]);
    }

    public function addCourse()
    {
        Course::create([
            'course_name' => request('course_name'),
            'lecturer_id' => request('lecturer_id'),
            'initial' => request('initial'),
            'day' => request('day'),
            'time_begin' => request('time_begin'),
            'time_finish' => request('time_finish'),
            'sks' => request('sks'),
            'room_id' => request('room_id'),
        ]);

        session()->flash('message', 'Success! Data berhasil ditambahkan');
        return back();
    }

    public function sortCourse()
    {
        $data = Course::with('lecturer', 'room')->where('day', request('hari'))->orderBy('room_id')->get();
        $lec = Lecturer::orderBy('id')->get();

        return view('dashboard.home')->with([
                'data' => $data, 
                'hari' => request('hari'),
                'lecturer' => $lec, 
                'colors' => $this->colors
            ]);
    }

    public function updateCourse()
    {
        $course = Course::find(request('id'));

        $course->course_name = request('course_name');
        $course->initial = request('initial');
        $course->lecturer_id = request('lecturer_id');
        $course->day = request('day');
        $course->time_begin = request('time_begin');
        $course->time_finish = request('time_finish');
        $course->sks = request('sks');
        $course->room_id = request('room_id');
        $course->status = request('status');

        $course->save();
        session()->flash('message', 'Data berhasil diperbarui');

        return back();
    }

    public function deleteCourse($id)
    {
        Course::find($id)->delete();

        session()->flash('message', 'Data berhasil dihapus.');

        return back();
    }
}
