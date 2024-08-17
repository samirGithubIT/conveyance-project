<?php

namespace App\Http\Controllers;

use App\Models\BillingDetail;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\ConveyanceVoucher;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    public function billingDetailForm(){

        $user = Auth::user();
        $conveyance = $user->ConveyanceVoucher;
        
        
        return view ('frontEnd.pages.billing_details', compact('conveyance'));
        
        // $billings = $user->billing->conveyanceVoucher;
        // return view ('frontEnd.pages.billing_details', compact('billings'));

    }
}
