@extends('backEnd.layouts.masters')
@section('page-title', 'Add Conveyance')

@section('content')

<div class="row">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
          
                <h3>Add a new Conveyance</h3>
            
        </div>
        <div class="card-body">
            <form action="{{ route('admin.conveyance.store') }}" method="POST">
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

@endsection