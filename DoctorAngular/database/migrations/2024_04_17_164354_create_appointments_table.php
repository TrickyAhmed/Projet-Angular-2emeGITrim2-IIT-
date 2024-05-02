<?php
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Log::info('Creating appointments table...'); // Add this line

        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
            $table->dateTime('appointment_date');
            $table->string('reason')->nullable();
            $table->enum('status', ['Scheduled', 'Cancelled', 'Completed'])->default('Scheduled');
            $table->timestamps();
        });

        Log::info('Appointments table created.'); // Add this line
    }

    public function down()
    {
        Log::info('Dropping appointments table...'); // Add this line

        Schema::dropIfExists('appointments');

        Log::info('Appointments table dropped.'); // Add this line
    }
}
