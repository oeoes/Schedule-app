<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecturer;
use App\User;
use App\Course;
use Carbon\Carbon;

class UserController extends Controller
{
    public function lecturerHome()
    {
        $day = Carbon::now('Asia/Jakarta');
        $day_course = $day->format('l');

        $data = Course::where(['day' => $day->format('l'), 'lecturer_id' => auth()->user()->lecturer->id])->where('status', '!=', 'end')->with('lecturer', 'room')->orderBy('time_begin')->first();
        $list = Course::where(['day' => $day->format('l'), 'lecturer_id' => auth()->user()->lecturer->id])->where('status', '!=', 'end')->with('lecturer', 'room')->orderBy('time_begin')->get();
        return view('new-version.dosen-page')->with(['data' => $data, 'list' => $list]);
    }

    public function lecturerLogin()
    {
        return view('dosen-auth.login');
    }

    public function lecturerAuth()
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = request(['username', 'password']);

        if(!auth()->attempt($credentials))
        {
            return back()->withErrors('Invalid Credentials');
        }

        return redirect()->route('lecturer.home');
    }

    public function lecturerSignup()
    {
        return view('dosen-auth.signup');
    }

    public function lecturerSignupAuth()
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required|min:5'
        ]);

        $user = User::create([
            'username' => request('username'),
            'password' => bcrypt(request('password')),
            'role' => 'dosen'
        ]);
        auth()->login($user);

        return redirect()->route('claim');
    }

    public function claim()
    {
        $lec = Lecturer::all();
        return view('dosen-auth.claim')->with('lecturer', $lec);
    }

    public function claimLecturer($id)
    {
        $lec = Lecturer::find($id);
        $lec->user_id = auth()->user()->id;
        $lec->is_claimed = 'y';
        $lec->save();

        $user = User::find(auth()->user()->id);
        $user->pick_account = 1;
        $user->save();

        return redirect()->route('lecturer.home');
    }

    public function startCourse($id)
    {
        $c = Course::find($id);
        $c->status = 'start';
        $c->save();

        return back();
    }

    public function stopCourse($id)
    {
        $c = Course::find($id);
        $c->status = 'end';
        $c->save();

        return back();
    }  
}
