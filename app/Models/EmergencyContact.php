<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    use HasFactory;

    public function Proximity(){
        return $this->belongsTo(Proximity::class, "proximity", 'id');
    }
}
