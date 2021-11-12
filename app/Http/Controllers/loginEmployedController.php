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
            if($employed->access){
                return redirect()->route('employed.dashboard');
            }
            else{
                return back()->withErrors([
                    'user' => 'Denied access.',
                ]);
            }
        }

        return back()->withErrors([
            'user' => 'The provided credentials do not match our records.',
        ]);
    }

    public function storeRecord($id){
        $employed = Employed::where('employedID',$id)->first();

        if($employed){
            $record = new Record;
            $record->employedID = $id;
            $record->hour = date(' H:i:s');
            $record->date = date('Y-m-d');
            $record->access = $employed->access;
            $record->save();
        }
        else{
            $record = new Record;
            $record->employedID = $id;
            $record->hour = date(' H:i:s');
            $record->date = date('Y-m-d');
            $record->access = 0;
            $record->save();
        }
    }
}
