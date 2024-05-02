<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'date_of_birth', 'gender', 'address', 'phone', 'email',
    ];

    public function medicalRecords()
    {
        return $this->hasMany('App\MedicalRecord');
    }

    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }
}
