<?php

namespace App\Http\Controllers;

use App\Models\MedicalHistory;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $history = MedicalHistory::with('patient')->get();
        return response()->json($history);
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
            'allergies' => 'required',
            'health_conditions' => 'required',
            'pregnant_nursing' => 'required',
        ]);

        $result = MedicalHistory::create($request->all());
        if (!empty($result)) {
            return response()->json([
                'message' => 'Record updated',
                'patient' => $result
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  mixed  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $history = MedicalHistory::find($id);
        if ($history) {
            return response()->json([
                'message' => 'Record found',
                'Patient' => $history
            ]);
        }
        return response()->json('Record not found', 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalHistory  $medicalHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalHistory $medicalHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        //
        $request->validate([
            'patient_id' => 'required',
            'allergies' => 'required',
            'health_conditions' => 'required',
            'pregnant_nursing' => 'required',
        ]);
        $history = MedicalHistory ::find($id);
        if (is_null($history)) {
            return response()->json('Record not found', 404);
        }
        $history->update($request->all());
        return response()->json([
            'message' => 'Record Updated',
            'patient' => $history
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
        //
        MedicalHistory::destroy($id);
        return 204;
    }
}
