@extends('frontEnd.layout.master')

@section('content')

        <h3> Welcome to Raj IT </h3>

        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur necessitatibus cupiditate, vero nostrum sit quis animi ipsa amet commodi fugit.</p>


        <h5 style="margin-top: 30px">welcome --<strong>{{ Auth::user()->name ?? 'user'}}</strong></h5>

       <div class="info d-flex my-5">
                <h4 style="margin-top: 7px">For your details :</h4>
                <a href="{{ route('billing-details') }}" class="btn btn-outline-info ms-3">Click Me!</a>
       </div>

        <div class="create d-flex">
                <h4 style="margin-top: 7px">Enter your voucher :</h4>
                <a href="{{ route('voucher.form') }}" class="btn btn-outline-info ms-3"> Click here </a>
        </div>

       

@endsection