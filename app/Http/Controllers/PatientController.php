<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patient = Patient::with('user', 'medicalHistory', 'pPrescriptions')->get();
        return response()->json($patient);
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
            'user_id' => 'required',
            'mx_no' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'trn' => 'required',
            'city' => 'required',
            'parish' => 'required',
            'address' => 'required',
            'tel_no' => 'required'
        ]);

        $patient = Patient::create($request->all());
        if ($patient) {
            return response()->json([
                'message' => 'Record updated',
                'patient' => $patient
            ]);
        }
        return response()->json('Error updating record');
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

        $patient = Patient::find($id);
        if (is_null($patient)) {
            return response()->json('Record not found', 404);
        }
        return response()->json([
            'message' => 'Record found',
            'Patient' => $patient
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $request->validate([
            'user_id' => 'required',
            'mx_no' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'trn' => 'required',
            'city' => 'required',
            'parish' => 'required',
            'address' => 'required',
            'tel_no' => 'required'
        ]);

        $patient = Patient::find($id);
        if(is_null($patient))
        {
            return response()->json('Record not found'. 404);
        }
        
        $patient->update($request->all());
        return response()->json([
           'message' => 'Record Updated',
           'patient' => $patient
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Patient::destroy($id);
        return 204;
    }
}
