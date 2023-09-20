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

        <form action="{{ route('booking.form') }}" method="post">
            @csrf

            

<div class="form-group">
        <label for="defaultLocation">Your Location</label>
        <input type="text" name="defaultLocation" id="defaultLocation" class="form-control" value="{{ $userLocation }}" disabled>
    </div>

    <div class="form-group">
    <label for="location">Select Branch Location</label>
    <select name="location" id="location" class="form-control" required>
        @foreach($suggestedLocations as $code => $location)
            <option value="{{ $location }}" {{ $userLocation == $location ? 'selected' : '' }}>{{ $location }}</option>
        @endforeach
        <optgroup label="Other Locations">
            <option value="Perlis Branch" {{ $userLocation == 'Perlis Branch' ? 'selected' : '' }}>Perlis Branch</option>
            <option value="Kedah Branch" {{ $userLocation == 'Kedah Branch' ? 'selected' : '' }}>Kedah Branch</option>
            <option value="Penang Branch" {{ $userLocation == 'Penang Branch' ? 'selected' : '' }}>Penang Branch</option>
            <option value="Kelantan Branch" {{ $userLocation == 'Kelantan Branch' ? 'selected' : '' }}>Kelantan Branch</option>
            <option value="Terengganu Branch" {{ $userLocation == 'Terengganu Branch' ? 'selected' : '' }}>Terengganu Branch</option>
            <option value="Pahang Branch" {{ $userLocation == 'Pahang Branch' ? 'selected' : '' }}>Pahang Branch</option>
            <option value="Perak Branch" {{ $userLocation == 'Perak Branch' ? 'selected' : '' }}>Perak Branch</option>
            <option value="Cameron Highlands Branch" {{ $userLocation == 'Cameron Highlands Branch' ? 'selected' : '' }}>Cameron Highlands Branch</option>
            <option value="Selangor Branch" {{ $userLocation == 'Selangor Branch' ? 'selected' : '' }}>Selangor Branch</option>
            <option value="Frasers Hill Branch" {{ $userLocation == 'Frasers Hill Branch' ? 'selected' : '' }}>Frasers Hill Branch</option>
            <option value="KL Branch" {{ $userLocation == 'KL Branch' ? 'selected' : '' }}>KL Branch</option>
            <option value="Putrajaya Branch" {{ $userLocation == 'Putrajaya Branch' ? 'selected' : '' }}>Putrajaya Branch</option>
            <option value="Selangor Branch" {{ $userLocation == 'Selangor Branch' ? 'selected' : '' }}>Selangor Branch</option>
            <option value="Genting Highlands Branch" {{ $userLocation == 'Genting Highlands Branch' ? 'selected' : '' }}>Genting Highlands Branch</option>
            <option value="Sembilan Branch" {{ $userLocation == 'Sembilan Branch' ? 'selected' : '' }}>Sembilan Branch</option>
            <option value="Melaka Branch" {{ $userLocation == 'Melaka Branch' ? 'selected' : '' }}>Melaka Branch</option>
            <option value="Johor Branch" {{ $userLocation == 'Johor Branch' ? 'selected' : '' }}>Johor Branch</option>
            <option value="Labuan Branch" {{ $userLocation == 'Labuan Branch' ? 'selected' : '' }}>Labuan Branch</option>
            <option value="Sabah Branch" {{ $userLocation == 'Sabah Branch' ? 'selected' : '' }}>Sabah Branch</option>
            <option value="Sarawak Branch" {{ $userLocation == 'Sarawak Branch' ? 'selected' : '' }}>Sarawak Branch</option>
        </optgroup>
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