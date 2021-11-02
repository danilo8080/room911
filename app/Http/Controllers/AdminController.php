<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        return view('admin.admin');
    }

    public function fetchadmin(){
        $admins = User::all();

        return response()->json([
            'admins' => $admins,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        else{
            $admin = new User;
            $admin->user = $request->input('user');
            $admin->password = Hash::make($request->input('password'));
            $admin->save();
            return response()->json([
                'status' => 200,
                'message' => 'Administrator Added Successfully',
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::find($id);
        if($admin){
            return response()->json([
                'status' => 200,
                'admin' => $admin,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Administrator not found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'user' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }

        else{
            $admin = User::find($id);

            if($admin){
                $admin->user = $request->input('user');
                if(!empty($request->input('password'))){
                    $admin->password = Hash::make($request->input('password'));
                }
                $admin->update();
                
                return response()->json([
                    'status' => 200,
                    'message' => 'Administrator Update Successfully',
                ]);
            }
            else{
                return response()->json([
                    'status' => 404,
                    'message' => 'Administrator not found',
                ]);
            }
            
        }
    }

    
    public function delete($id)
    {
        $admin = User::find($id);

        if($admin){
            $admin->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Administrator Delete Successfully',
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Administrator not found',
            ]);
        }
    }
}
