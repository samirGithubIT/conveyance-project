@extends('backEnd.layouts.masters')
@section('page-title', 'Conveyances')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6 m-auto">
            <div class="card shadow-lg">
                <div class="card-header d-flex justify-content-between bg-light-subtle">
                  
                        <h3>List of Conveyance</h3>
                        <a href="{{ route('admin.conveyance.create') }}" class="btn btn-outline-primary">Add a new Conveyance</a>
                    
                </div>
                <div class="card-body">
                   
                    <table class="table table-stripped table-hover">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $conveyances as $conveyance)
                                <tr>
                                    <td>{{ $conveyance->id }}</td>
                                    <td>{{ $conveyance->name }}</td>
                                    <td>
                                        <div class="actions">
                                            <a href="{{ route('admin.conveyance.edit',$conveyance->id) }}" class="btn btn-outline-info">Edit</a>
                                            {{-- delete method --}}
                                            <a href="" class="btn btn-outline-danger"
                                                onclick="
                                                    event.preventDefault();
                                                    document.getElementById('deleteConveyance-{{ $conveyance->id }}').submit()
                                                "
                                            >Delete</a>
                                            
                                            <form action="{{ route('admin.conveyance.destroy' , $conveyance->id) }}" method="post" id="deleteConveyance-{{ $conveyance->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection