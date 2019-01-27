<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginAuth()
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

        return redirect()->route('home.dashboard');
    }

    public function logout()
    {
        auth()->logout();
        return back();
    }
}
