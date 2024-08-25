<?php

namespace App\Http\Controllers\admin;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $designations = Designation::paginate(5);
        $department_list = Department::departmentLists();  // for relation
        return view ('backEnd.pages.designation.index', compact('designations','department_list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $department_list = Department::departmentLists();
        return view ('backEnd.pages.designation.create', compact('department_list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'department_id' => 'required'
        ]);

        $designation = new Designation();
        $designation->name = $request->name;
        $designation->department_id = $request->department_id;
        $designation->save();

        return redirect()->to('/admin/designation')->with('success', 'A new designation added successfully');

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
        $designation = Designation::find($id);
        $department_list = Department::departmentLists();  // for relation
        
        return view ('backEnd.pages.designation.edit', compact('designation','department_list'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $this->validate($request, [
            'name' => 'required',
        ]);

        $designation = Designation::find($id);
        $designation->name = $request->name;
        $designation->department_id = $request->department_id;
        $designation->save();

        return redirect()->to('/admin/designation')->with('info', 'Your designation has updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Designation::find($id)->delete();

        return redirect()->to('/admin/designation')->with('warning', 'the designation has deleted successfully');
    }
}
