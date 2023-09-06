@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>

<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kitty camp</title>
        <!-- Favicon-->
        <link rel="icon" type="image" href="assets/kittycamp.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/scss" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/scss" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="sass/app.scss" rel="stylesheet" />
</head>
<body id="booking">

    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
    <h2>Booking Details</h2>
    <!-- Show booking details here -->
    <a href="{{ route('booking.form') }}" class="btn btn-success">Booking Now!!</a>
     </div>
    </div>

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
                        <th>Action</th>
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
                            <a href="{{ route('booking.edit', $booking->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('booking.destroy', $booking->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</button>
                            </form>
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
