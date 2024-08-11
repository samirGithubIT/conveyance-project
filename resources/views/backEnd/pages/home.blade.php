@extends('backEnd.layouts.masters')
@section('page-title', 'Home')

@section('content')

    {{-- wallet boxs --}}
    @include('backEnd.inc.boxs')

    <div class="page-buttons ms-3 my-3">
        <div class="card">
            <div class="card-header">
                <h3>There`s all you need</h3>
            </div>
            <div class="card-body">
                <div class="links">
                    <a href="{{ route('admin.department.index') }}" class="btn btn-outline-secondary">Departments</a>
                    <a href="{{ route('admin.designation.index') }}" class="btn btn-outline-secondary  mx-2">Designation</a>
                    <a href="{{ route('admin.employee.index') }}" class="btn btn-outline-secondary">Employee</a>
                    <a href="{{ route('admin.conveyance.index') }}" class="btn btn-outline-secondary mx-2">Conveyance</a>
                </div>
            </div>
        </div>
        <footer>
            <h2>footer</h2>
        </footer>
    </div>


@endsection
