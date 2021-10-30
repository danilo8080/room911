<?php

namespace App\Http\Controllers;
use App\Models\Employed;
use Illuminate\Http\Request;
use App\Models\Record;

class loginEmployedController extends Controller
{
    public function login(){
        return view('loginEmployed/loginEmployed');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'user' => ['required'],
        ]);

        $id = $request->user;
        $employed = Employed::where('employedID',$id)->first();

        $this->storeRecord($id);

        if(!empty($employed)){
            return redirect()->route('employed.dashboard');
        }
        

        return back()->withErrors([
            'user' => 'The provided credentials do not match our records.',
        ]);
    }

    public function storeRecord($id){

        $record = new Record;
        $record->employedID = $id;
        $record->hour = date(' H:i:s');
        $record->date = date('Y-m-d');
        $record->save();
    }
}
