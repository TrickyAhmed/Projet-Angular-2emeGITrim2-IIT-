<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalRecordsTable extends Migration
{
    public function up()
    {
        Log::info('Creating medical_records table...'); // Add this line

        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->foreignId('doctor_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('appointment_id')->nullable()->constrained()->onDelete('set null');
            $table->text('diagnosis')->nullable();
            $table->text('prescription')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Log::info('Medical records table created.'); // Add this line
    }

    public function down()
    {
        Log::info('Dropping medical_records table...'); // Add this line

        Schema::dropIfExists('medical_records');

        Log::info('Medical records table dropped.'); // Add this line
    }
}
