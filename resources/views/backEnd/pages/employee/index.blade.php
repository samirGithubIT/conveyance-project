@extends('backEnd.layouts.masters')
@section('page-title', 'Employees')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 m-auto">
            <div class="card shadow-lg">
                <div class="card-header d-flex justify-content-between bg-light-subtle">
                  
                        <h3>List of Employees</h3>
                        <a href="{{ route('admin.employee.create') }}" class="btn btn-outline-primary">Add a new Employee</a>
                    
                </div>
                <div class="card-body">
                   
                    <table class="table table-stripped table-hover">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Employee ID</th>
                                <th>Contact No.</th>
                                <th>Designation</th>
                                <th>Department</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $employees as $employee )
                                  <tr>
                                        <td>{{ $loop->index + 1 }}</td>     
                                        <td>{{ $employee->image }}</td>     
                                        <td>{{ $employee->name }}</td>     
                                        <td>{{ $employee->gender }}</td>     
                                        <td>{{ $employee->identity }}</td>     
                                        <td>{{ $employee->number }}</td>     
                                        <td>{{ $employee->designation->name ?? 'null'}}</td>    
                                        <td>{{ $employee->designation->department->name ?? 'null'}}</td>
                                        <td>{{ $employee->address ?? 'null' }}</td>       
                                        <td>
                                            <div class="actions">
                                                
                                                {{-- <a href="{{ route('admin.employee.edit',$employee->id) }}" class="btn btn-outline-info">Edit</a> --}}
    
                                                {{-- delete method --}}
                                                <a href="" class="btn btn-outline-danger"
                                                    onclick="
                                                        event.preventDefault();
                                                        Swal.fire({
                                                         title: '{{ session()->get('warning') }}',
                                                         text: 'You won\'t be able to revert this!',
                                                         icon: 'warning',
                                                         showCancelButton: true,
                                                         confirmButtonColor: '#3085d6',
                                                         cancelButtonColor: '#d33',
                                                         confirmButtonText: 'Yes, delete it!'
                                                           }).then((result) => {
                                                             if (result.isConfirmed) {
                                                                
                                                                document.getElementById('deleteEmployee-{{ $employee->id }}').submit();
                                                               
                                                                }
                                                            }); 
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection