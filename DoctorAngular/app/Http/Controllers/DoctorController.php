<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    public function index()
    {
        $Doctors = Doctor::all();
        return response()->json($Doctors, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'specialty' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $Doctor = new Doctor();
        $Doctor->fill($request->all());
        $Doctor->save();
        return response()->json($Doctor, 201);
    }

    public function show($id)
    {
        $Doctor= Doctor::where('id', $id)->get();
        return response()->json($Doctor, 200);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'specialty' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'updated_at' => now(),
        ]);
        $Doctor = Doctor::find($id);
        $Doctor->update($validatedData);
        return response()->json('Doctor modifié avec succés !');
    }

    public function destroy($id)
    {
        $appointment = Doctor::find($id);
        $appointment->delete();
        return response()->json('Doctor supprimée avec succés !');
    }
}
