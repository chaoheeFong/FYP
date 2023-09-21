@extends('layouts.admin')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details & Actions</title>
    <style>
        .booking-details-container {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .booking-details-content {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .booking-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .booking-card-header {
    background-color: #007bff;
    color: #ffffff;
    font-size: 1.5em; /* Increased font size */
    font-weight: bold;
    border-radius: 10px 10px 0 0;
}

        .booking-card-body {
            padding: 20px;
        }

        .button-container {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
    flex-wrap: wrap; /* Allow buttons to wrap onto a new line if needed */
}

.action-button {
    background-color: #28a745;
    border: none;
    color: #ffffff;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 5px; /* Reduced margin */
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.4s;
}

        .action-button:hover {
            background-color: #218838;
        }

        .button-label {
    font-size: 1em; /* Adjusted font size */
    margin-bottom: 0;
    display: block; /* Make labels block elements for better alignment */
    text-align: center; /* Center align labels */
    margin-bottom: 5px; /* Adjusted margin */
}
    </style>
</head>
<body>
<div class="booking-details-container">
    <div class="booking-details-content">
        <h1 class="mb-4">Booking Information</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="booking-card">
                    <div class="booking-card-header">Details</div>
                    <div class="booking-card-body">
                        <strong>Location Branch:</strong> {{ $booking->location }}<br>
                        <strong>Service Type:</strong> {{ $booking->service_type }}<br>
                        <strong>Number of Cats:</strong> {{ $booking->number_of_cats }}<br>
                        <strong>Breed:</strong> {{ $booking->breed }}<br>
                        <strong>Size of Cat:</strong> {{ $booking->size }}<br>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="booking-card">
                    <div class="booking-card-header">Dates & Status</div>
                    <div class="booking-card-body">
                        <strong>Date:</strong> {{ $booking->booking_date }}<br>
                        <strong>Time:</strong> {{ $booking->booking_time }}<br>
                        <strong>Nights:</strong> {{ $booking->nights }}<br>
                        <strong>Comment:</strong> {{ $booking->comment }}<br>
                        <strong>Status:</strong> {{ $booking->status }}<br>
                    </div>
                </div>
            </div>
        </div>

        <div class="button-container">
        <div>
            <form method="get" action="{{ route('comingToCentre', ['bookingId' => $booking->id]) }}">
                @csrf
            <button id="comingToCentre" class="action-button" type="submit">Coming to Centre</button>
            </form>
        </div>
        <div>
            <form method="get" action="{{ route('bath', ['bookingId' => $booking->id]) }}">
                @csrf
            <button id="bath" class="action-button" type="submit">Bath</button>
            </form>
        </div>
        <div>
            <form method="get" action="{{ route('received', ['bookingId' => $booking->id]) }}">
                @csrf
            <button id="received" class="action-button" type="submit">received</button>
            </form>
        </div>
        <div>
            <form method="get" action="{{ route('feed', ['bookingId' => $booking->id]) }}">
                @csrf
            <button id="feed" class="action-button" type="submit">feed</button>
            </form>
        </div>
        <div>
            <form method="get" action="{{ route('complete', ['bookingId' => $booking->id]) }}">
                @csrf
            <button id="complete" class="action-button" type="submit">completed</button>
            </form>
        </div>
        </div>
    </div>
</div>
</body>
</html>

@endsection
