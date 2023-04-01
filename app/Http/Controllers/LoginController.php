<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!(auth()->attempt($credential))) {
            return back()->withInput()->with('error', 'Invalid login credentials !');
        } else {
            return redirect()->route('dashboard');
        }
    }
}
