@extends('frontEnd.layout.master')

@section('content')

<div class="container mt-5 p-5 bg-light rounded-lg shadow-lg">
        <h3 class="text-center text-primary mb-4">🌟 Welcome to Raj IT 🌟</h3>
    
        <p class="text-center lead text-muted">
            Discover a world of innovation and excellence at Raj IT. We are dedicated to delivering top-notch IT solutions that empower your business.
        </p>
    
        <h5 class="text-center mt-5 text-secondary">
            Welcome, <strong class="text-info">{{ Auth::user()->name ?? 'User' }}</strong>! 🎉
        </h5>
    
        @if ( Auth::user())
        <div class="info d-flex justify-content-center align-items-center my-5 p-4 bg-white rounded shadow-sm hover-shadow transition">
            <h4 class="text-dark mb-0 me-3">📋 For your details:</h4>
            <a href="{{ route('billing-details') }}" class="btn btn-info text-white py-2 px-4 rounded-pill">Click Me!</a>
        </div>
    
        <div class="create d-flex justify-content-center align-items-center p-4 bg-white rounded shadow-sm hover-shadow transition">
            <h4 class="text-dark mb-0 me-3">💼 Enter your voucher:</h4>
            <a href="{{ route('voucher.form') }}" class="btn btn-info text-white py-2 px-4 rounded-pill">Click here</a>
        </div>
    </div>
        @endif

@endsection