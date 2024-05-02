<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'specialty', 'phone', 'email',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
