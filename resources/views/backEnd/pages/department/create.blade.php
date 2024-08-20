@extends('backEnd.layouts.masters')
@section('page-title', 'Add Departments')

@section('content')

<div class="row">
  <div class="col-6 m-auto">
    <div class="card shadow-lg">
        <div class="card-header d-flex justify-content-between bg-success-subtle">
          
                <h3>Add a new Department</h3>
            
        </div>
        <div class="card-body">
            <form action="{{ route('admin.department.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
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