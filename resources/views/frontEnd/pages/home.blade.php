@extends('frontEnd.layout.master')

@section('content')

        <h3> Welcome to Raj IT </h3>

        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur necessitatibus cupiditate, vero nostrum sit quis animi ipsa amet commodi fugit.</p>


        <h5 style="margin-top: 30px">welcome {{ Auth::user()->name ?? 'user'}}</h5> <br>
        <h2>For your details :</h2> <a href="{{ route('billing-details') }}" class="btn btn-primary">Click Me!</a>

@endsection