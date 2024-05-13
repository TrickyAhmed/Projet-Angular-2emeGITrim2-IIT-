<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models;
use App\Http\Resources\PatientResource;

class PatientController extends Controller
{
    public function index()
    {
        $Patient = Patient::all();
        return response()->json($Patient, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $Patient = new Patient();
        $Patient->fill($request->all());
        $Patient->save();
        return response()->json($Patient, 201);
    }

    public function show($id)
    {
        $patient = Patient::find($id);
        return $patient;
    }
    

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
    
        $Patient = Patient::find($id);
    
        if (!$Patient) {
            // Patient with the given ID was not found
            return response()->json(['error' => 'Patient not found'], 404);
        }
    
        $Patient->update($validatedData);
    
        return response()->json('Patient record updated successfully!');
    }
    

    public function destroy( $id)
    {
        $Patient = Patient::find($id);
        $Patient->delete();
        return response()->json('Patient Record supprimée avec succés !');
    }
}
