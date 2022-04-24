<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'allergies',
        'health_conditions',
        'pregnant_nursing',

    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
