<?php

namespace App\Http\Controllers\Admin;

use App\Models\Conveyance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConveyanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conveyances = Conveyance::all();
        return view ('backEnd.pages.conveyance.index',compact('conveyances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('backEnd.pages.conveyance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $conveyance = new Conveyance();
        $conveyance->name = $request->name;
        $conveyance->save();

        return redirect()->to('/admin/conveyance')->with('success', 'A new conveyance added successfully');
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
        $conveyance = Conveyance::find($id);
        return view ('backEnd.pages.conveyance.edit', compact('conveyance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $conveyance = Conveyance::find($id);
        $conveyance->name = $request->name;
        $conveyance->save();

        return redirect()->to('/admin/conveyance')->with('info', 'Your conveyance has updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Conveyance::find($id)->delete();

        return redirect()->to('/admin/conveyance')->with('warning', 'the conveyance has deleted successfully');
    }
}
