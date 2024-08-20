@extends('backEnd.layouts.masters')
@section('page-title', 'update your Conveyance')

@section('content')

<div class="row">
    <div class="col-6 m-auto">
        <div class="card shadow-lg">
            <div class="card-header d-flex justify-content-between bg-light-subtle">
              
                    <h3>Edit Conveyance</h3>
                
            </div>
            <div class="card-body">
                <form action="{{ route('admin.conveyance.update', $conveyance->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
    
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" id="" class="form-control" value="{{ $conveyance->name }}">
                    </div>
    
                    <button type="submit" class="btn btn-primary">Update</button>
    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection