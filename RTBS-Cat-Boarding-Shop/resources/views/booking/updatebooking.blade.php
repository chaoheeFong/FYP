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
    <h2>Edit Booking</h2>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('booking.update', ['id' => $booking->id]) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT method to update the booking -->
        <div class="form-group">
            <label for="location">Location:</label>
            <select class="form-control" name="location" id="location" required>
                <option value="Sungai Long" {{ $booking->location == 'Sungai Long' ? 'selected' : '' }}>Sungai Long</option>
                <option value="Subang" {{ $booking->location == 'Subang' ? 'selected' : '' }}>Subang</option>
                <option value="Shah Alam" {{ $booking->location == 'Shah Alam' ? 'selected' : '' }}>Shah Alam</option>
                <option value="Jalan Ampang" {{ $booking->location == 'Jalan Ampang' ? 'selected' : '' }}>Jalan Ampang</option>
            </select>
        </div>
        <!-- Add other form fields to update the booking -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Booking</button>
        </div>
    </form>
</div>

</body>
</html>

@endsection
