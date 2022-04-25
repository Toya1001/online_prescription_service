<?php

namespace App\Http\Controllers;

use App\Models\Drug;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drug = Drug::with('drugInventory', 'drugPrescriptions' )->get();
         return response()->json($drug);
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
            'drug_name'=> 'required',
            'generic_name' => 'required',
            'description' => 'required',
        ]);

        $drug =  Drug::create($request->all());
        return response()->json([
            'message' => 'Record Added',
            'drug' => $drug
        ]);
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
        $entry = Drug::find($id);
       if ($entry){
           return response()->json([
               'message' => 'Record located',
                'drug' => $entry
           ]);
       }
       return response()->json('Data not found', 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function edit(Drug $drug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int     $iid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validation([
            'drug_name' => 'required',
            'generic_name' => 'required',
            'description' => 'required',
        ]);

       $entry = Drug::find($id);

       if(is_null($entry)){
           return response()->json('Record not found', 404);
       }

       $entry->update($request->all());
       return response()->json([
           'message' => 'Record Updated',
           'drug' => $entry
       ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        Drug::destroy($id);
        return "Record Deleted";
    }
}
