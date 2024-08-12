<?php

namespace App\Http\Controllers;

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

        $employee_list = Employee::with('designation')->get();
        $conveyance_list = Conveyance::conveyanceList();

        return view ('frontEnd.pages.voucher_entry', compact('employee_list','conveyance_list'));
    }

    public function voucherFormSubmit(Request $request){
        
        $this->validate($request, [
            'date' => 'required',
            'employee_id' => 'required',
            'from_location' => 'required',
            'to_location' => 'required',
            'conveyance_id' => 'required',
            'amount' => 'required',

        ]);

        $voucher = new ConveyanceVoucher();
        $voucher->date = $request->date;
        $voucher->employee_id = $request->employee_id;
        $voucher->from_location = $request->from_location;
        $voucher->to_location = $request->to_location;
        $voucher->conveyance_id = $request->conveyance_id;
        $voucher->amount = $request->amount;
        $voucher->remarks = $request->remarks;
        $voucher->save();

        return redirect()->to('/billing-details')->with('success','Data Entry Completed');
    }
}
