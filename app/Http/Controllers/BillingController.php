<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\ConveyanceVoucher;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    public function billingDetailForm(){

        $user = Auth::user();
        $conveyance = $user->ConveyanceVoucher;

        // dd($conveyance);

        // for user ID

        // $payment_status = ConveyanceVoucher::where('user_id',Auth::user()->id)->get();
        //  $conveyance_status = ConveyanceVoucher::all();

        // return $conveyance;
        return view ('frontEnd.pages.billing_details', compact('conveyance'));


    }
}
