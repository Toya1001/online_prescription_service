<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'drug_id',
        'dosage',
        'quantity',
        'directions',
        'duration',
        'repeat',
    ];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    
    public function drugs()
    {
        return $this->belongsTo(Drug::class, 'drug_id');
    }
}
