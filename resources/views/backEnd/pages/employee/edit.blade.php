@extends('backEnd.layouts.masters')
@section('page-title', 'update your Employee')

@section('content')

<div class="containe">
    <div class="row">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
              
                    <h3>Edit Employee</h3>
                
            </div>
            <div class="card-body">
                <form action="{{ route('admin.employee.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
    
                    <div class="mb-3">
                        <label for="" class="form-label">Select Department</label>
                        <select name="department_id" id="department" class="form-select">
                            <option value="">-- SELECT --</option>
                            @foreach ( $department_list as $department_id => $name)
    
                            <option value="{{ $department_id }}"
    
                                @if ($employee->department_id == $department_id) 
                                selected 
                                @endif >{{ $name }}</option>
                                
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
    
                            <option value="{{ $designation_id }}"
    
                                @if ($employee->designation_id == $designation_id) 
                                selected 
                                @endif >{{ $designation_name }}</option>
                                
                            @endforeach
                        </select>
    
                        @error('designation_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" id="" class="form-control" value="{{ $employee->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Employee ID</label>
                        <input type="text" name="identity" id="" class="form-control" value="{{ $employee->identity }}">
                    </div>
    
                    <button type="submit" class="btn btn-primary">Update</button>
    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

{{-- @push('java')
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
@endpush --}}

@push('java')
    <script>
        $(function(){
 
            var departmentEL = $('#department')
            var designationEL = $('#designation')

            $(departmentEL).change(function(e){
                var department_id = e.target.value

                $.get('/data/department/' + department_id + '/designations' , function(data){
                        $(designationEL).html(data)
                })
            })

        })
    </script>
@endpush


