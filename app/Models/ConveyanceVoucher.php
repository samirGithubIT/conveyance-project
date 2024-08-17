<?php

namespace App\Models;

use App\Models\User;
use App\Models\BillingDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConveyanceVoucher extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function conveyance(){
        return $this->belongsTo(Conveyance::class);
    }

    // public function billing(){
    //     return $this->hasOne(BillingDetail::class);
    // }


}
