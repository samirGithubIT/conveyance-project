@extends('backEnd.layouts.masters')
@section('page-title', 'Employees')

@section('content')

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
              
                    <h3>List of Employees</h3>
                    {{-- <a href="{{ route('admin.employee.create') }}" class="btn btn-outline-primary">Add a new Employee</a> --}}
                
            </div>
            <div class="card-body">
               
                <table class="table table-stripped table-hover">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Name</th>
                            <th>Employee ID</th>
                            <th>Designation</th>
                            <th>Department</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $employees as $employee )
                              <tr>
                                    <td>{{ $employee->id }}</td>     
                                    <td>{{ $employee->name }}</td>     
                                    <td>{{ $employee->identity }}</td>     
                                    <td>{{ $employee->designation->name }}</td>    
                                    <td>{{ $employee->designation->department->name }}</td>     
                                    <td>
                                        <div class="actions">
                                            <a href="{{ route('admin.employee.edit',$employee->id) }}" class="btn btn-outline-info">Edit</a>
                                            {{-- delete method --}}
                                            <a href="" class="btn btn-outline-danger"
                                                onclick="
                                                    event.preventDefault();
                                                    document.getElementById('deleteEmployee-{{ $employee->id }}').submit()
                                                "
                                            >Delete</a>
                                            
                                            <form action="{{ route('admin.employee.destroy' , $employee->id) }}" method="post" id="deleteEmployee-{{ $employee->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                             </tr>  
                        @endforeach
                    </tbody>
                </table>

                {{-- for paginate --}}
                {!! $employees->links() !!}
            </div>
        </div>
    </div>
</div>

@endsection