<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return $appointments;
    }


    public function store(Request $request)
    {
        $appointment = new Appointment();
        $appointment->fill($request->all());
        $appointment->save();
        
        return response()->json($appointment, 200);
    }
    

    public function show($id)
    {
    $appointment= Appointment::find($id);
    return $appointment;
    }

    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'appointment_date' => 'required',
            'reason' => 'required',
            'status' => 'required',
            'updated_at' => now(),
        ]);
        $appointment = Appointment::find($id);
        $appointment->update($validatedData);
        return response()->json('Appointment modifié avec succés !');    }

    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        return response()->json('Appointment supprimée avec succés !');
    }
}
