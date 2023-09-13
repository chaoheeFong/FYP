@extends('layouts.app') <!-- If you have a layout template -->

@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kitty camp</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/kittycamp.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/scss" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/scss" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="sass/app.scss" rel="stylesheet" />
    </head>


<body>
    <div class="container">
        <h2>Booking Form</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('booking.form') }}" method="post">
            @csrf

            
<!-- Disabled input field for location -->
<div class="form-group">
        <label for="defaultLocation">Your Location</label>
        <input type="text" name="defaultLocation" id="defaultLocation" class="form-control" value="{{ $userLocation }}" disabled>
    </div>

            <div class="form-group">
        <label for="location">Suggested Branch Location</label>
        <select name="location" id="location" class="form-control" required>
        <option value="Sungai Long" {{ $userLocation == 'Sungai Long' ? 'selected' : '' }}>Sungai Long</option>
        <option value="Jalan Ampang" {{ $userLocation == 'Jalan Ampang' ? 'selected' : '' }}>Jalan Ampang</option>
        <option value="Batu Kawan" {{ $userLocation == 'Batu Kawan' ? 'selected' : '' }}>Batu Kawan</option>
        <option value="Mahkota Cheras" {{ $userLocation == 'Mahkota Cheras' ? 'selected' : '' }}>Mahkota Cheras</option>
        </select>
    </div>




            <div class="form-group">
                <label for="service_type">Service Type</label>
                <select name="service_type" id="service_type" class="form-control" required>
                    <option value="Cat boarding">Cat Boarding</option>
                    <option value="Cat grooming">Cat Grooming</option>
                    <option value="Vet medic">Vet Medic</option>
                </select>
            </div>

            <div class="form-group">
                <label for="number_of_cats">Number of Cats</label>
                <input type="number" name="number_of_cats" id="number_of_cats" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="breed">Breed</label>
                <input type="text" name="breed" id="breed" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="size">Size of Cat</label>
                <input type="text" name="size" id="size" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="booking_date">Date</label>
                <input type="date" name="booking_date" id="booking_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="booking_time">Time</label>
                <input type="time" name="booking_time" id="booking_time" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nights">Nights</label>
                <input type="number" name="nights" id="nights" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" class="form-control" rows="4"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Confirm Booking</button>
        </form>
    </div>

    <script>
    document.getElementById('changeLocation').addEventListener('click', function() {
        document.getElementById('location').removeAttribute('disabled');
    });
</script>
<script src="../js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
@endsection