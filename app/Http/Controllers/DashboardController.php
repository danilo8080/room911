<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\Employed;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function __construct()
    {        
        $this->middleware('auth');
    }

    public function index(){      

        return view('index');

    }

    public function fetchemployed(Request $request){
        $searchID = $request->input('searchID');
        $searchDepartment = $request->input('searchDepartment');
        $searchName = $request->input('searchName');
        $searchLastName = $request->input('searchLastName');
        
        
        $employeds = DB::table('employeds')->where('deleted_at',null)
                                            ->where('employedID','like',"$searchID%")
                                            ->where('lastName','like',"$searchLastName%")
                                            ->when($searchDepartment, function ($query, $searchDepartment) {
                                                $query->where('department','like',"%$searchDepartment%");
                                            })
                                            ->when($searchName, function ($query, $searchName) {
                                                    $query->where('firstName','like',"$searchName%")
                                                            ->orWhere('middleName','like',"$searchName%");
                                            })->get();

        
        

        return response()->json([
            'employeds' => $employeds,
        ]);
    }

    public function store(Request $request){
        
        $validator = Validator::make($request->all(),[
            'employedID' => 'required|integer|unique:employeds',
            'department' => 'required|max:191',
            'lastName' => 'required|max:191',
            'middleName' => 'required|max:191',
            'firstName' => 'required|max:191',
            'access' => 'required|boolean',
            
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
            $employed->Access = $request->input('access');;
            $employed->save();
            return response()->json([
                'status' => 200,
                'message' => 'Employed Added Successfully',
            ]);
        }
    }


    public function edit($id){
        $employed = Employed::where('employedID','=',$id)->first();
        if($employed){
            return response()->json([
                'status' => 200,
                'employed' => $employed,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Employed not found',
            ]);
        }
    }

    public function update(Request $request, $id){

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
            $employed = Employed::where('employedID','=',$id)->first();

            if($employed){
                $employed->department = $request->input('department');
                $employed->lastName = $request->input('lastName');
                $employed->middleName = $request->input('middleName');
                $employed->firstName = $request->input('firstName');
                $employed->update();
                
                return response()->json([
                    'status' => 200,
                    'message' => 'Employed Update Successfully',
                ]);
            }
            else{
                return response()->json([
                    'status' => 404,
                    'message' => 'Employed not found',
                ]);
            }
            
        }
    }


    public function delete($id)
    {
        $employed = Employed::where('employedID','=',$id)->first();

        if($employed){
            $employed->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Employed Delete Successfully',
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Employed not found',
            ]);
        }
    }

    public function access($id)
    {
        $employed = Employed::where('employedID','=',$id)->first();
        if($employed->access){
            $employed->access = 0;
        }else{
            $employed->access = 1;
        }
        $employed->update();
        return response()->json([
            'status' => 200,
            'message' => 'Employed Update Successfully',
        ]);
    }

    
}
