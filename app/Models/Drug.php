<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;

    protected $fillable = [
        'drug_name',
        'generic_name',
        'description',
    ];

    public function drugInventory(){
        return $this->hasOne(DrugInventory::class);
    }

    public function drugPrescriptions(){
        return $this->hasMany(Prescription::class);
    }
}
