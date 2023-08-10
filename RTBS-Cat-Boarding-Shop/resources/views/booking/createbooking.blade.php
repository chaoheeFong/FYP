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

    <h2>Booking</h2>
    <form action="{{ route('booking.submit') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="location">Location:</label>
            <select class="form-control" name="location" id="location" required>
                <option value="Sungai Long">Sungai Long</option>
                <option value="Subang">Subang</option>
                <option value="Shah Alam">Shah Alam</option>
                <option value="Jalan Ampang">Jalan Ampang</option>
            </select>
        </div>
        <div class="form-group">
            <label for="service_type">Service Type:</label>
            <select class="form-control" name="service_type" id="service_type" required>
                <option value="Cat Boarding">Cat Boarding</option>
                <option value="Cat Grooming">Cat Grooming</option>
                <option value="Vet Medic">Vet Medic</option>
            </select>
        </div>
        <div class="form-group">
            <label for="number_of_cats">Number of Cats:</label>
            <input type="number" class="form-control" name="number_of_cats" id="number_of_cats" required>
        </div>
        <div class="form-group">
            <label for="breed">Breed:</label>
            <input type="text" class="form-control" name="breed" id="breed">
        </div>
        <div class="form-group">
            <label for="size">Size of Cat:</label>
            <input type="text" class="form-control" name="size" id="size">
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" name="date" id="date" required>
        </div>
        <div class="form-group">
            <label for="time">Time:</label>
            <input type="time" class="form-control" name="time" id="time" required>
        </div>
        <div class="form-group">
            <label for="nights">Nights:</label>
            <input type="number" class="form-control" name="nights" id="nights" required>
        </div>
        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea class="form-control" name="comment" id="comment" rows="4"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit Booking</button>
        </div>
    </form>
</div>
<script src="../js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>

@endsection
