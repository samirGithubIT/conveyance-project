<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ConveyanceVoucher;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    public function billingDetailForm(){

        $user = Auth::user();
        $conveyance = $user->ConveyanceVoucher;
        
        
        return view ('frontEnd.pages.billing_details', compact('conveyance'));

    }

    
    public function voucherFormSearch(Request $request){
        
        $status = $request->status;

        $userId = Auth::id(); // Get the ID of the currently logged-in user

        $conveyance = ConveyanceVoucher::where('user_id', $userId)->where(function($query) use($status){
            if(!empty($status)){
                $query->where('status', $status);
            }
        })->get();

        return view ('frontEnd.pages.billing_details', compact('conveyance'));
    }

    public function viewPdf()
    {

        $userId = Auth::id();
        $vouchers = ConveyanceVoucher::where('user_id', $userId)->with('user')->get();

        // return $user_id;

        $data = [
            
            'vouchers' => $vouchers,
        ];

        $pdf = PDF::loadView('pdf.document', $data);

        return $pdf->stream('document.pdf');
    }

}

