<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Conveyance;
use Illuminate\Http\Request;
use App\Models\ConveyanceVoucher;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){

        // return Auth::user();
        return view('frontEnd.pages.home'); 
    }

    public function voucherForm(){

        $conveyance_list = Conveyance::conveyanceList();

        return view ('frontEnd.pages.voucher_entry', compact('conveyance_list'));
    }

    public function voucherFormStore(Request $request){
        
        

        $this->validate($request, [
            'created_at' => 'required',
            'from_location' => 'required',
            'to_location' => 'required',
            'conveyance_id' => 'required',
            'companions_count' => 'required',
            'amount' => 'required',

        ]);

        $voucher = new ConveyanceVoucher();
        $voucher->created_at = $request->created_at;
        $voucher->user_id = $request->user_id;
        $voucher->from_location = $request->from_location;
        $voucher->to_location = $request->to_location;
        $voucher->conveyance_id = $request->conveyance_id;
        $voucher->companions_count = $request->companions_count;
        $voucher->amount = $request->amount;
        $voucher->remarks = $request->remarks;
        $voucher->save();

        return redirect()->to('/billing-details')->with('success','Data Entry Completed');
    }

   
}
