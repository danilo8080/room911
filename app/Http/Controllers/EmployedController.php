<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployedController extends Controller
{

    public function dashboard(){
        return view('loginEmployed/dashboard');
    }

}
