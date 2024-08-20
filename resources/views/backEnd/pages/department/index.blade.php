@extends('backEnd.layouts.masters')
@section('page-title', 'Departments')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-7 m-auto">
            <div class="card shadow-lg">
                <div class="card-header d-flex justify-content-between bg-light-subtle">
                  
                        <h3>List of Departments</h3>
                        <a href="{{ route('admin.department.create') }}" class="btn btn-outline-primary">Add a new Department</a>
                    
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
                            @foreach ( $departments as $department)
                                <tr>
                                    <td>{{ $department->id }}</td>
                                    <td>{{ $department->name }}</td>
                                    <td>
                                        <div class="actions">
                                            <a href="{{ route('admin.department.edit',$department->id) }}" class="btn btn-outline-info fs-6">Edit</a>

                                            {{-- delete method --}}
                                            <a href="" class="btn btn-outline-danger"
                                                onclick="
                                                    event.preventDefault();
                                                    document.getElementById('deleteDepartment-{{ $department->id }}').submit()
                                                "
                                            >Delete</a>
                                            
                                            <form action="{{ route('admin.department.destroy' , $department->id) }}" method="post" id="deleteDepartment-{{ $department->id }}">
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