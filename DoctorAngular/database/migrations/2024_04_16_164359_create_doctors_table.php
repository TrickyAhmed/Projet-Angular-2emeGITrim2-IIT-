<?php
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    public function up()
    {
        Log::info('Creating doctors table...'); // Add this line

        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('specialty')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });

        Log::info('Doctors table created.'); // Add this line
    }

    public function down()
    {
        Log::info('Dropping doctors table...'); // Add this line

        Schema::dropIfExists('doctors');

        Log::info('Doctors table dropped.'); // Add this line
    }
}
