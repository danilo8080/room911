<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\Employed;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index(){      

        return view('index');

    }

    public function fetchemployed(){
        $employeds = Employed::all();

        return response()->json([
            'employeds' => $employeds,
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'employedID' => 'required|integer',
            'department' => 'required|max:191',
            'lastName' => 'required|max:191',
            'middleName' => 'required|max:191',
            'firstName' => 'required|max:191',
            
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        else{
            $employed = new Employed;
            $employed->employedID = $request->input('employedID');
            $employed->department = $request->input('department');
            $employed->lastName = $request->input('lastName');
            $employed->middleName = $request->input('middleName');
            $employed->firstName = $request->input('firstName');
            $employed->Access = 1;
            $employed->save();
            return response()->json([
                'status' => 200,
                'message' => 'Employed Added Successfully',
            ]);
        }
        



    }
}
