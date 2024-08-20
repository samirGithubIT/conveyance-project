@extends('backEnd.layouts.masters')
@section('page-title', 'Add Employee')

@section('content')

    <div class="container">
        <div class="row">
           <div class="col-7 m-auto">
             <div class="card shadow-lg">
                <div class="card-header d-flex justify-content-between bg-success-subtle">
                  
                        <h3>Add a new Employee</h3>
                    
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.employee.store') }}" method="POST">
                        @csrf
        
                        <div class="mb-3">
                            <label for="" class="form-label"> Enter Employee Name</label>
                            <input type="text" name="name" id="" class="form-control">
        
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label"> Enter Employee Identity </label>
                            <input type="text" name="identity" id="" class="form-control">
        
                            @error('identity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Select Department</label>
                            <select name="department_id" id="department" class="form-select">
                                <option value="">-- SELECT --</option>
                                @foreach ( $department_list as $department_id => $name)
        
                                <option value="{{ $department_id }}">{{ $name }}</option>
                                    
                                @endforeach
                            </select>
        
                            @error('department_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Select Designation</label>
                            <select name="designation_id" id="designation" class="form-select">
                                <option value="">-- SELECT --</option>
                                @foreach ( $designation_list as $designation_id => $designation_name)
        
                                <option value="{{ $designation_id }}">{{ $designation_name }}</option>
                                    
                                @endforeach
                            </select>
        
                            @error('designation_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
        
                    </form>
                </div>
             </div>
           </div>
        </div>
    </div>

@endsection

@push('java')
    <script>
        $(function(){

           var departmentEl = $('#department')
           var designationEl = $('#designation')

           $(departmentEl).change(function(e){
            var dept_id = e.target.value

            $.get('/data/department/'+ dept_id +'/designations', function(data){
                $(designationEl).html(data)
            })
           })

        })
    </script>
@endpush
