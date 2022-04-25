<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class usersData extends Controller
{
    //
    function list()
    {
        $results = User::all();
        return response()->json($results);
    }
 
    function show($id)
    {
        $result = User::find($id);
        return response()->json($result);
    }

    function store(Request $request)
    {
        $rules = array(
            "fname"=> "required|string|min:2",
            "lname"=>"required|string|min:2",
            "email"=>"required|email",
            "password"=>"required|min:8"
        );
        
        $valid = Validator::make($request->all(), $rules);
            if ($valid->fails()){
                return $valid->errors();
            }
        $result = User::create($request->all());
        if($result)
        {
            return ["Result" => "Data has been saved"];
        }
        return ["Result" => "Data has not been saved"];

       
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $rules = array(
            "fname" => "required|string|min:2",
            "lname" => "required|string|min:2",
            "email" => "required|email",   
            "password" => "required|min:8"
        );

        $valid = Validator::make($request->all(), $rules);
        if ($valid->fails()) {
            return $valid->errors();
        }

       $result = $user->update($request->all());
       if ($result){
            return ["Result" => "Data has been updated"];
       }
        return ["Result" => "Error updating Record"];
        
    }

    
        public function search($word) 
        {
            $search = User::where('lname','like', '%'.$word . '%')
            ->orWhere('fname', 'like', '%'. $word. '%')
            ->orWhere('email','like', '%'. $word. '%')
            ->get();
            return $search;
        }

        public function destroy($id)
        {
            User::find($id)->delete();
            return "Record deleted";
        }
    
}
