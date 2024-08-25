@extends('backEnd.layouts.masters')
@section('page-title', 'Designations')

@section('content')

<div class="container">
    <div class="row">
       <div class="col-7 m-auto">
        <div class="card shadow-lg">
            <div class="card-header d-flex justify-content-between bg-light-subtle">
              
                    <h3>List of Designation</h3>
                    <button type="button" class="btn btn-outline-primary btn-sm mb-3" data-toggle="modal" data-target="#addDesignationModal">
                        Add Designation
                       </button>
                
            </div>
            <div class="card-body">
               
                <table class="table table-stripped table-hover">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Department</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $designations as $designation)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $designation->department->name }}</td>
                                <td>{{ $designation->name }}</td>
                                <td>
                                    <div class="actions">
                                        <button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#editDesignationModal{{ $designation->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        {{-- delete method --}}
                                        <button href="" class="btn btn-outline-danger btn-sm"
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
                                                                
                                                                document.getElementById('deleteDesignation-{{ $designation->id }}').submit();
                                                               
                                                                }
                                                            }); 
                                            "  ><i class="fas fa-trash"></i></button>
                                        
                                        <form action="{{ route('admin.designation.destroy' , $designation->id) }}" method="post" id="deleteDesignation-{{ $designation->id }}" style="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            {{-- edit Designation --}}

                            <div class="modal fade" id="editDesignationModal{{ $designation->id }}" tabindex="-1" aria-labelledby="editDesignationModalLabel{{ $designation->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <form action="{{ route('admin.designation.update', $designation->id) }}" method="post">
                                        @csrf
                                        @method("PUT")

                                        <div class="modal-header">
                                        <h5 class="modal-title fs-5" id="editDesignationModalLabel{{ $designation->id }}"> <i class=" bx bx-windows"></i>Edit Designation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
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
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-outline-info">Save changes</button>
                                        </div>
                                      </form> 
                                  </div>
                                </div>
                              </div>

                        @endforeach
                    </tbody>
                </table>

                {{-- for paginate --}}
                {!! $designations->links() !!}
            </div>
        </div>
       </div>
    </div>
</div>

@include('backEnd.pages.designation.create')

@endsection