@extends('layouts.app') <!-- If you have a layout template -->

@section('content')
    <div class="container">
        <h2>Booking Confirmation</h2>

        <div class="card">
            <div class="card-body">
                <h3>Booking Summary</h3>
                <p><strong>Location:</strong> {{ $booking->location }}</p>
                <p><strong>Service Type:</strong> {{ $booking->service_type }}</p>
                <!-- Display other booking details -->
                
                <form action="{{ route('booking.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="location" value="{{ $booking->location }}">
                    <input type="hidden" name="service_type" value="{{ $booking->service_type }}">
                    <!-- Include other hidden fields with values -->
                    <button type="submit" class="btn btn-primary">Confirm Booking</button>
                </form>
            </div>
        </div>
    </div>
@endsection