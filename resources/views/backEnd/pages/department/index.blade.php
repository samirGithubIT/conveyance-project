@extends('backEnd.layouts.masters')
@section('page-title', 'Departments')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-7 m-auto">
            <div class="card shadow-lg">
                <div class="card-header d-flex justify-content-between bg-light-subtle">

                    <h3>List of Departments</h3>
                    <button type="button" class="btn btn-outline-primary btn-sm mb-3" data-toggle="modal" data-target="#addDepartmentModal">
                     Add Department
                    </button>

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
                            @foreach ($departments as $department)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $department->name }}</td>
                                    <td>
                                        <div class="actions">
                                            <button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#editDepartmentModal{{ $department->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-outline-danger btn-sm" onclick="
                                                event.preventDefault();
                                                Swal.fire({
                                                    title: 'Are you sure?',
                                                    text: 'You won\'t be able to revert this!',
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Yes, delete it!'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById('deleteDepartment-{{ $department->id }}').submit();
                                                    }
                                                });
                                            ">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            <form action="{{ route('admin.department.destroy', $department->id) }}" method="post" id="deleteDepartment-{{ $department->id }}" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Edit Department Modal -->
                                <div class="modal fade" id="editDepartmentModal{{ $department->id }}" tabindex="-1" role="dialog" aria-labelledby="editDepartmentModalLabel{{ $department->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="POST" action="{{ route('admin.department.update', $department->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editDepartmentModalLabel{{ $department->id }}"><i class="fas fa-edit"></i> Edit Department</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="name"><i class=" bx bx-building-house"></i>Name</label>
                                                        <input type="text" name="name" value="{{ $department->name }}" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-outline-info"><i class="fas fa-save"></i> Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    @include('backEnd.pages.department.create')

@endsection
