@extends('backEnd.layouts.masters')
@section('page-title', 'update your Designation')

@section('content')

<div class="containe">
    <div class="row">
        <div class="col-7 m-auto">
            <div class="card shadow-lg">
                <div class="card-header d-flex justify-content-between bg-light-subtle">
                  
                        <h3>Edit Designation</h3>
                    
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.designation.update', $designation ->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
        
                        <div class="mb-3">
                            <label for="" class="form-label">Select Department</label>
                            <select name="department_id" id="" class="form-select">
                                <option value="">-- SELECT --</option>
                                @foreach ( $department_list as $department_id => $name)
        
                                <option value="{{ $department_id }}"
        
                                    @if ($designation->department_id == $department_id) 
                                    selected 
                                    @endif >{{ $name }}</option>
                                    
                                @endforeach
                            </select>
        
                            @error('department_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" id="" class="form-control" value="{{ $designation->name }}">
                        </div>
        
                        <button type="submit" class="btn btn-primary">Update</button>
        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection