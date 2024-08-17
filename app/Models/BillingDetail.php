<?php

namespace App\Models;

use App\Models\User;
use App\Models\ConveyanceVoucher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillingDetail extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    // public function conveyanceVoucher(){
    //     return $this->belongsTo(ConveyanceVoucher::class);
    // }


}
