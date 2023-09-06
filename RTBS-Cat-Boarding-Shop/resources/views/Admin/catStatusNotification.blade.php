@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
    <div>
        <h1>Cat Status Notification</h1>
    </div>
    </div>
    <div>
        <body id="booking">
     <div class="container">

        @if (count($bookings) > 0)
            <table class="table">
                <thead>
                    <tr>
                    <th>Location Branch</th>
                        <th>Service Type</th>
                        <th>Number of Cats</th>
                        <th>Breed</th>
                        <th>Size of Cat</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Nights</th>
                        <th>Comment</th>
                        <th>Status</th>
                        <th colspan='2'>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                        <td>{{ $booking->location }}</td>
                            <td>{{ $booking->service_type }}</td>
                            <td>{{ $booking->number_of_cats }}</td>
                            <td>{{ $booking->breed }}</td>
                            <td>{{ $booking->size }}</td>
                            <td>{{ $booking->booking_date }}</td>
                            <td>{{ $booking->booking_time }}</td>
                            <td>{{ $booking->nights }}</td>
                            <td>{{ $booking->comment }}</td>
                            <td>{{ $booking->status }}</td>
                            <td>
                            <a href="{{ route('admin.booking.editStatus', $booking->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                            <a href="{{ route('admin.booking.editStatus', $booking->id) }}" class="btn btn-success">Send</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No bookings available.</p>
        @endif
    </div>
<script src="../js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
@endsection