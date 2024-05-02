<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use App\Models;

class MedicalRecordController extends Controller
{
    public function index()
    {
        $MedicalRecord = MedicalRecord::all();
        return response()->json($MedicalRecord, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'appointment_id' => 'required',
            'diagnosis' => 'required',
            'prescription' => 'required',
            'notes' => 'required',
            'created_at' => now(),
        ]);

        $MedicalRecord = new MedicalRecord();
        $MedicalRecord->fill($request->all());
        $MedicalRecord->save();
        return response()->json($MedicalRecord, 201);
    }

    public function show($id)
    {
        $MedicalRecord= MedicalRecord::where('id', $id)->get();
        return response()->json($MedicalRecord, 200);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'appointment_id' => 'required',
            'diagnosis' => 'required',
            'prescription' => 'required',
            'notes' => 'required',
            // Add any other validation rules here
        ]);
    
        // Find the medical record by its ID
        $medicalRecord = MedicalRecord::find($id);
    
        // Update the medical record with the validated data
        $medicalRecord->update($validatedData);
    
        // Return a success response
        return response()->json('Medical record updated successfully!');
    }
    

    public function destroy($id)
    {
        $MedicalRecord = MedicalRecord::find($id);
        $MedicalRecord->delete();
        return response()->json('Medical Record supprimée avec succés !');
    }
}
