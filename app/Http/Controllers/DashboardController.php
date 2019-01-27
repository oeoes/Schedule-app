<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Carbon\Carbon;

class DashboardController extends Controller
{
    // Create random colors for background course list
    public $colors = [
        'bg-navy', 'bg-blue', 'bg-aqua', 'bg-teal', 'bg-olive', 'bg-green', 'bg-lime', 'bg-yellow', 'bg-orange', 'bg-red',
        'bg-maroon', 'bg-fuchsia', 'bg-purple', 'bg-gray'
    ];

    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function home()
    {
        $data = Course::with('lecturer', 'room')->get();
        return view('dashboard.home')->with(['data' => $data, 'colors' => $this->colors]);
    }

    public function addCourse()
    {
        Course::create([
            'course_name' => request('course_name'),
            'lecturer_id' => request('lecturer_id'),
            'day' => request('day'),
            'time' => request('time'),
            'sks' => request('sks'),
            'room_id' => request('room_id'),
        ]);

        session()->flash('message', 'Success! Data berhasil ditambahkan');
        return back();
    }

    public function sortCourse()
    {
        $hari = request('hari');
        $data = Course::with('lecturer', 'room')->where('day', request('hari'))->get();

        return view('dashboard.home')->with(['data' => $data, 'hari' => $hari, 'colors' => $this->colors]);
    }

    public function updateCourse()
    {
        $course = Course::find(request('id'));

        $course->course_name = request('course_name');
        $course->initial = request('initial');
        $course->lecturer_id = request('lecturer_id');
        $course->day = request('day');
        $course->time = request('time');
        $course->sks = request('sks');
        $course->room_id = request('room_id');

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
