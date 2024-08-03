@extends('backEnd.layouts.masters')
@section('page-title', 'Designations')

@section('content')

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
              
                    <h3>List of Designation</h3>
                    <a href="{{ route('admin.designation.create') }}" class="btn btn-outline-primary">Add a new Designation</a>
                
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
                                <td>{{ $designation->id }}</td>
                                <td>{{ $designation->department->name }}</td>
                                <td>{{ $designation->name }}</td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('admin.designation.edit',$designation->id) }}" class="btn btn-outline-info">Edit</a>
                                        {{-- delete method --}}
                                        <a href="" class="btn btn-outline-danger"
                                            onclick="
                                                event.preventDefault();
                                                document.getElementById('deleteDesignation-{{ $designation->id }}').submit()
                                            "
                                        >Delete</a>
                                        
                                        <form action="{{ route('admin.designation.destroy' , $designation->id) }}" method="post" id="deleteDesignation-{{ $designation->id }}">
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
                {!! $designations->links() !!}
            </div>
        </div>
    </div>
</div>

@endsection