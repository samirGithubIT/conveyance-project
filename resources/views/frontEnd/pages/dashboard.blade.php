@extends('frontEnd.layout.master')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center ">
            <div class="alert alert-dark text-dark shadow-lg" role="alert">
                <h3 class="alert-heading">You are logged in!</h3>
                <p class="mb-4">You have successfully logged into the system.</p>
                <button class="btn btn-outline-dark" 
                    onclick="
                        document.getElementById('Logout').submit();
                    ">Logout</button>  
            </div>
        
            <form action="{{ route('employee.logout') }}" method="POST" id="Logout" class="d-none">
                @csrf
            </form> 
        </div>
    </div>
</div>

@endsection