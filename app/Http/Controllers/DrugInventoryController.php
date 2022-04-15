<?php

namespace App\Http\Controllers;


use App\Models\DrugInventory;
use Illuminate\Http\Request;

class DrugInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventory =  DrugInventory::all();
        return response()->json($inventory);
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
            'drug_id'=>'required',
            'quantity' => 'required',
            'batch_no' => 'required',
            'expiration_date'=> 'required',
        ]);

        DrugInventory::create($request->all());
        return "Record added";
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        //
        $inventory = DrugInventory::find($id);
        if (is_null($inventory))
        {
            return response()->json('Record not found', 404);
        }
        return response()->json([
            'message' => 'Record found',
            'Result' =>$inventory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DrugInventory  $drugInventory
     * @return \Illuminate\Http\Response
     */
    public function edit(DrugInventory $drugInventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $request->validate([
            'drug_id' => 'required',
            'quantity' => 'required',
            'batch_no' => 'required',
            'expiration_date' => 'required',
        ]);

       $entry = DrugInventory::find($id);
       if(is_null($entry))
       {
           return response()->json("Record not found", 404);
       }

        $entry->update($request->all());
        return response()->json([
            "message" => "Record updated",
            "Result" => $entry
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
        //
        DrugInventory::destroy($id);

        return response()->json('Record deleted');
    }
}
