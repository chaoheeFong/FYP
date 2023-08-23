@extends('layouts.admin') <!-- Assuming 'layouts.admin' is the name of your main layout -->

@section('content')
    <h1>Dashboard</h1>
    <p>Welcome to the admin dashboard of the Cat Boarding App!</p>
    
    <div class="info-box">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Total Booking </h4>
                <p class="card-text">{{ $bookingCount }}</p>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Total Feedback </h4>
                <p class="card-text">{{ $feedbackCount }}</p>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Total User </h4>
                <p class="card-text">{{ $userCount }}</p>
            </div>
        </div>
    </div>
@endsection
