<?php

namespace App\Http\Controllers;

use App\Models\ConveyanceVoucher;
use App\Models\Employee;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function billingDetailForm(){

        $conveyance = ConveyanceVoucher::all();

    //    return $Conveyance;
        return view ('frontEnd.pages.billing_details', compact('conveyance'));


    }
}
