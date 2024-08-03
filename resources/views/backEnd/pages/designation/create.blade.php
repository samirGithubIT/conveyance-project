@extends('backEnd.layouts.masters')
@section('page-title', 'Add Designation')

@section('content')

    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                  
                        <h3>Add a new Designation</h3>
                    
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.designation.store') }}" method="POST">
                        @csrf
        
                        <div class="mb-3">
                            <label for="" class="form-label">Select Department</label>
                            <select name="department_id" id="" class="form-select">
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
                            <label for="" class="form-label"> Enter Designation Name</label>
                            <input type="text" name="name" id="" class="form-control">
        
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <button type="submit" class="btn btn-primary">Add</button>
        
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection