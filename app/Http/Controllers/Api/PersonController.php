<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $person = Person::all();
        return response()->json([
            'status'=>true,
            'message'=>'Data Berhasil Ditemukan',
            'data'=>$person
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'name' => 'required',
           'email' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                $validator->errors()
            ],422);
        }
        $person = person::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Person created successfully',
            'data' => $person
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $person = Person::findOrFail($id);
        return response()->json(
            [
                    'status' => true,
                    'message' => 'Person created successfully',
                    'data' => $person
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
         ]);
         if ($validator->fails()) {
             return response()->json([
                 'status' => false,
                 'message' => 'Validation error',
                 $validator->errors()
             ],422);
         }
         $person = Person::findOrFail($id);
         $person->update($request->all());
         return response()->json([
             'status' => true,
             'message' => 'Person created perbaiki',
             'data' => $person
         ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $person = Person::findOrFail($id);
        $person->delete();
        return response()->json([
            'status' => true,
            'message' => 'Person del',
            
        ],204);
    }
}
