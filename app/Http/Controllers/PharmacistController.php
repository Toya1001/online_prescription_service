<?php

namespace App\Http\Controllers;

use App\Models\Pharmacist;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PharmacistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $entry = Pharmacist::all();

        return response()->json($entry);
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
        //
        $request->validate([
            'user_id'=> 'required',
            'employee_id' => 'required',
            'license_no' => 'required',
            'work_name' => 'required',
            'work_address' => 'required',
        ]);

        $result = Pharmacist::create($request->all());
        if ($result) {
            return response()->json([
                'message' => 'Record updated',
                'patient' => $result
            ]);
        }
        return response()->json('Error updating record');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pharmacist = Pharmacist::find($id);
        if($pharmacist)
        {
            return response()->json(['message' => 'Record found',
                'Patient' => $pharmacist
        ]);
        }
        return response()->json('Record not found', 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pharmacist  $pharmacist
     * @return \Illuminate\Http\Response
     */
    public function edit(Pharmacist $pharmacist)
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

        $request->validate([
            'user_id' => 'required',
            'employee_id' => 'required',
            'license_no' => 'required',
            'work_name' => 'required',
            'work_address' => 'required',
        ]);

        $pharmacist = Pharmacist::find($id);
        if(is_null($pharmacist)){
            return response()->json('Record not found', 404);
        }
        $pharmacist->update($request->all());
        return response()->json([
            'message' => 'Record Updated',
            'patient' => $pharmacist
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Prescription::destroy($id);
        return 204;
    }
    
}
