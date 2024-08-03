<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view ('backEnd.pages.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $department_list = Department::departmentLists();
        $designation_list = Designation::designationList();

        return view ('backEnd.pages.employee.create', compact('department_list', 'designation_list'));

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());   
        $this->validate($request, [
            'name' => 'required',
            'identity' => 'required',
            'department_id' => 'required',
            'designation_id' => 'required',
        ]);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->identity = $request->identity;
        $employee->designation_id = $request->designation_id;
        $employee->department_id = $request->department_id;
        $employee->save();

        return redirect()->to('/admin/employee')->with('success', 'A new employee created successfully');

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
        $employee = Employee::find($id);
        // for relation
        $department_list = Department::departmentLists(); 
        $designation_list = Designation::designationList(); 
        
        return view ('backEnd.pages.employee.edit', compact('employee','department_list', 'designation_list'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'identity' => 'required',
            'department_id' => 'required',
            'designation_id' => 'required',
        ]);

        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->identity = $request->identity;
        $employee->designation_id = $request->designation_id;
        $employee->department_id = $request->department_id;
        $employee->save();

        return redirect()->to('/admin/employee')->with('success', 'A new employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::find($id)->delete();

        return redirect()->to('/admin/employee')->with('warning', 'current employee has deleted successfully');
    }
}