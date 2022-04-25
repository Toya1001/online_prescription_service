<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prescription = Prescription::with('patient','doctor', 'drugs')->get();

        return response()->json($prescription);
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
        $request->validate([
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'drug_id' => 'required',
            'dosage' => 'required',
            'quantity' => 'required',
            'directions' => 'required',
            'duration' => 'required',
            'repeat' => 'required',

        ]);

        $result = Prescription::create($request->all());
        if ($result) {
            return response()->json([
                'message' => 'Record updated',
                'patient' => $result
            ]);
        }

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
        $prescription = Prescription::find($id);
        if ($prescription) {
            return response()->json([
                'message' => 'Record found',
                'Patient' => $prescription
            ]);
        }
        return response()->json('Record not found', 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
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
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'drug_id' => 'required',
            'dosage' => 'required',
            'quantity' => 'required',
            'directions' => 'required',
            'duration' => 'required',
            'repeat' => 'required',

        ]);
        $result =Prescription::find($id);
        if (is_null($result)) {
            return response()->json('Record not found', 404);
        }
        $result->update($request->all());
        return response()->json([
            'message' => 'Record Updated',
            'prescription' => $result
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        //
    }
}
