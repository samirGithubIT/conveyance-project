<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use App\Models\Conveyance;
use Illuminate\Http\Request;
use App\Models\ConveyanceVoucher;
use App\Http\Controllers\Controller;

class ConveyanceVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conveyance_vouchers = ConveyanceVoucher::all();
        return view ('backEnd.pages.conveyanceVoucher.index', compact('conveyance_vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employee_list = Employee::with('designation')->get();
        $conveyance_list = Conveyance::conveyanceList();
        // dd($employee_list);
        return view ('backEnd.pages.conveyanceVoucher.create', compact('employee_list','conveyance_list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // dd($request->all());

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

        return redirect()->to('/admin/conveyance-voucher')->with('success', 'A new Voucher created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $conveyance_voucher = ConveyanceVoucher::find($id);
        $conveyance_list = Conveyance::conveyanceList();
        $employee_list = Employee::with('designation')->get();

        return view ('backEnd.pages.conveyanceVoucher.edit', compact('conveyance_voucher','conveyance_list','employee_list'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // dd($request->all());
         $this->validate($request, [
            'employee_id' => 'required',
            'from_location' => 'required',
            'to_location' => 'required',
            'conveyance_id' => 'required',
            'amount' => 'required',

        ]);


        $conveyance_voucher = ConveyanceVoucher::find($id);
        $conveyance_voucher->employee_id = $request->employee_id;
        $conveyance_voucher->from_location = $request->from_location;
        $conveyance_voucher->to_location = $request->to_location;
        $conveyance_voucher->conveyance_id = $request->conveyance_id;
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

        return redirect()->to('/admin/conveyance-voucher')->with('warning', 'A new Voucher deleted successfully');
    }
}