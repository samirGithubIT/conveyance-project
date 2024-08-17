@extends('frontEnd.layout.master')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center ">
            <div class="alert alert-dark text-dark shadow-lg" role="alert">
                <h3 class="alert-heading">You are logged in!</h3>
                <p class="mb-4">You have successfully logged into the system.</p>

                @if (Auth::check() && Auth::user()->adminSection())

                <div class="buttons d-flex">
                    <button class="btn btn-outline-dark me-3 ms-2" 
                    onclick="
                        document.getElementById('Logout').submit();
                        ">Logout</button>  
                        <form action="{{ route('employee.logout') }}" method="POST" id="Logout" class="d-none">
                            @csrf
                        </form> 

                      <a href="{{ url('http://127.0.0.1:8000/admin/dashboard') }}" class="btn btn-outline-dark">Admin</a>  
                </div>

                @else

                <div class="buttons">
                    <button class="btn btn-outline-dark" 
                    onclick="
                        document.getElementById('Logout').submit();
                        ">Logout</button>  
                        <form action="{{ route('employee.logout') }}" method="POST" id="Logout" class="d-none">
                            @csrf
                        </form> 
                </div>

                @endif
            </div>
        
        </div>
    </div>
</div>

@endsection