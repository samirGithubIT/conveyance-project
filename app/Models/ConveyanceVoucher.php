<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConveyanceVoucher extends Model
{
    use HasFactory;

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function conveyance(){
        return $this->belongsTo(Conveyance::class);
    }
}
