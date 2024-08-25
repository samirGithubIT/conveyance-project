<?php

namespace App\Http\Controllers\Admin;


use App\Models\Conveyance;
use Illuminate\Http\Request;
use App\Models\ConveyanceVoucher;
use App\Http\Controllers\Controller;
use App\Models\User;

class ConveyanceVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conveyance_vouchers = ConveyanceVoucher::with('user')->get();
        return view ('backEnd.pages.conveyanceVoucher.index', compact('conveyance_vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employee_list = User::with('designation')->get();
        $conveyance_list = Conveyance::conveyanceList();
        
        return view ('backEnd.pages.conveyanceVoucher.create', compact('employee_list','conveyance_list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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

        return redirect()->to('/admin/conveyance-voucher')->with('success', 'A new Voucher created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $conveyance_voucher = ConveyanceVoucher::with('user')->find($id);

        return view('backEnd.pages.conveyanceVoucher.show',compact('conveyance_voucher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $conveyance_voucher = ConveyanceVoucher::find($id);
        $conveyance_list = Conveyance::conveyanceList();
        $employee_list = User::with('designation')->get();

        return view ('backEnd.pages.conveyanceVoucher.edit', compact('conveyance_voucher','conveyance_list','employee_list'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $this->validate($request, [
            'from_location' => 'required',
            'to_location' => 'required',
            'conveyance_id' => 'required',
            'People with you' => 'required',
            'amount' => 'required',

        ]);


        $conveyance_voucher = ConveyanceVoucher::find($id);
        $conveyance_voucher->user_id = $request->user_id;
        $conveyance_voucher->from_location = $request->from_location;
        $conveyance_voucher->to_location = $request->to_location;
        $conveyance_voucher->conveyance_id = $request->conveyance_id;
        $conveyance_voucher->companions_count = $request->companions_count;
        $conveyance_voucher->amount = $request->amount;
        $conveyance_voucher->remarks = $request->remarks;
        $conveyance_voucher->save();

        return redirect()->to('/admin/conveyance-voucher')->with('info', 'A new Voucher created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ConveyanceVoucher::find($id)->delete();

        return redirect()->back()->with('warning', 'A  Voucher deleted successfully');
    }




    // for payment status
    public function StatusVoucher(Request $request){

        $conveyanceVoucher_id = $request->conveyanceVoucher_id; // see in show.blade.php
        $status = $request->status;

        $conveyance_voucher = ConveyanceVoucher::find($conveyanceVoucher_id); // conveyance voucher table er id 
        $conveyance_voucher->status = $status; 
        $conveyance_voucher->save(); 

        return redirect()->to('admin/conveyance-voucher')->with('success','payment ' .$status. 'successfully');
    }

    public function ApproveVoucher(Request $request){

        $conveyanceVoucher_id = $request->conveyanceVoucher_id; // see in show.blade.php
        $approval = $request->approval;

        $conveyance_voucher = ConveyanceVoucher::find($conveyanceVoucher_id); // conveyance voucher table er id 
        $conveyance_voucher->approval = $approval; 
        $conveyance_voucher->save(); 

        return redirect()->to('admin/conveyance-voucher')->with('success',$approval. 'successfully');
    }

    // for filtering

    public function SearchVoucher(Request $request){

        $user_id = $request->user_id;
        $status = $request->status;

        $conveyance_vouchers = ConveyanceVoucher::where(function($query) use($user_id, $status){

            // for user_id
            if(!empty($user_id)){
                $query->where('user_id', $user_id);
            }
            // for payment status
            if(!empty($status)){
                $query->where('status', $status);
            }

        })->get();

        return view ('backEnd.pages.conveyanceVoucher.index', compact('conveyance_vouchers')); //index er sathe match korte hobe
        
    }


}
