<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor = Doctor::all();
        return response()->json($doctor);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $rules = array(
            'user_id' => 'required',
            'license_no' => 'required',
            'work_name' => 'required',
            'work_address' => 'required'
        );

        $valid = Validator::make($request->all(), $rules);
        if ($valid->fails()) {
            return $valid->errors();
        }
        $result = Doctor::create($request->all());
        if ($result) {
            return ["Result" => "Data has been saved"];
        }
        return ["Result" => "Data has not been saved"];
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $doctor =  Doctor::findOrFail($id);
        if (is_null($doctor)){
            return response()->json('Record not found', 404);
        }
        return response()->json([
            'message' => 'Record located',
            'Doctor' => $doctor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $entry = Doctor::find($id);
        if (is_null($entry)){
            return response()->json('Record not found', 404);
        }
        $entry->update($request->all());
        
        return  response()->json([
            "message" => "Update successful",
            'doctor' => $entry
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Doctor::destroy($id);
        return "Entry deleted";
    }
}
