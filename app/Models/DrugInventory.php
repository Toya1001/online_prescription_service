<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugInventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'drug_id',
        'quantity',
        'batch_no',
        'expiration_date'
    ];

    public function drug()
    {
        return $this->belongsTo(Drug::class);
    }
    
}
