@extends('backEnd.layouts.masters')
@section('page-title', 'Transports')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6 m-auto">
            <div class="card shadow-lg">
                <div class="card-header d-flex justify-content-between bg-light-subtle">
                  
                        <h3>List of Transport </h3>
                        <button type="button" class="btn btn-outline-primary btn-sm mb-3" data-toggle="modal" data-target="#addConveyanceModal">
                            Add Tranport
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
                            @foreach ( $conveyances as $conveyance)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $conveyance->name }}</td>
                                    <td>
                                        <div class="actions">

                                            <button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#editConveyanceModal{{ $conveyance->id }}">
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
                                                                
                                                                document.getElementById('deleteConveyance-{{ $conveyance->id }}').submit();
                                                               
                                                                }
                                                            }); 
                                                   
                                                "
                                            ><i class="fas fa-trash"></i></button>
                                            
                                            <form action="{{ route('admin.conveyance.destroy' , $conveyance->id) }}" method="post" id="deleteConveyance-{{ $conveyance->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                {{-- edit conveyance  --}}

                                <div class="modal fade" id="editConveyanceModal{{ $conveyance->id }}" tabindex="-1" aria-labelledby="editConveyanceModalLabel{{ $conveyance->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <form action="{{ route('admin.conveyance.update', $conveyance->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                        
                                        <div class="modal-header">
                                          <h5 class="modal-title fs-5" id="editConveyanceModalLabel{{ $conveyance->id }}">Edit Conveyance</h1>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                          <div class="form-group">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Name</label>
                                                <input type="text" name="name" id="" class="form-control" value="{{ $conveyance->name }}">
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
                </div>
            </div>
        </div>
    </div>
</div>

{{-- add Conveyance --}}
@include('backEnd.pages.conveyance.create')

@endsection