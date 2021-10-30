<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){

        if(Auth::check()){
            return redirect()->route('user.index');
        }else{
            
            return view('login\login');
        }
        
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'user' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('user.index');
        }


        return back()->withErrors([
            'user' => 'The provided credentials do not match our records.',
        ]);
    }

    public function Logout() {
        Auth::logout();
        return redirect()->route('login');
    }



}
