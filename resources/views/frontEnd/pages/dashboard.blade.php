@extends('frontEnd.layout.master')

@section('content')

   <div class="container">
            <h3>you are loged in!!</h3>

            <button class="btn btn-outline-primary my-4" 
                onclick="
                            document.getElementById('Logout').submit();
                            // alert('hello');
                        "  
             >Logout</button>  
        
        <form action="{{ route('logout') }}" method="POST"  id="Logout" class="d-none">
            @csrf
        </form> 
    
        {{-- <a class="btn btn-outline-primary"
                                onclick="
                                        event.preventDefault();
                                        document.getElementById('Logout').submit(); "
                            > <i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout </a>
        
                            <form action="{{ route('employee.logout') }}" method="post" class="d-none" id="Logout">
                            @csrf
                            </form> --}}

       
   </div>

@endsection