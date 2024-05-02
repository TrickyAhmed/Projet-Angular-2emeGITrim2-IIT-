<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\PatientController;

Route::get('/doctors', [DoctorController::class, 'index']);
Route::post('/doctors', [DoctorController::class, 'store']);
Route::get('/doctors/{id}', [DoctorController::class, 'show']);
Route::put('/doctors/{id}', [DoctorController::class, 'update']);
Route::delete('/doctors/{id}', [DoctorController::class, 'destroy']);


//Route for Patienr
Route::get('/Appointment', [AppointmentController::class, 'index']);
Route::post('/Appointment', [AppointmentController::class, 'store']);
Route::get('/Appointment/{id}', [AppointmentController::class, 'show']);
Route::put('/Appointment/{id}', [AppointmentController::class, 'update']);
Route::delete('/Appointment/{id}', [AppointmentController::class, 'destroy']);


//Route for Avis
Route::get('/MedicalRecord', [MedicalRecordController::class, 'index']);
Route::post('/MedicalRecord', [MedicalRecordController::class, 'store']);
Route::get('/MedicalRecord/{id}', [MedicalRecordController::class, 'show']);
Route::put('/MedicalRecord/{id}', [MedicalRecordController::class, 'update']);
Route::delete('/MedicalRecord/{id}', [MedicalRecordController::class, 'destroy']);


//Route for Avis
Route::get('/Patient', [PatientController::class, 'index']);
Route::get('/Patient/{id}', [PatientController::class, 'show']);
Route::post('/Patient', [PatientController::class, 'store']);
Route::put('/Patient/{id}', [PatientController::class, 'update']);
Route::delete('/Patient/{id}', [PatientController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
