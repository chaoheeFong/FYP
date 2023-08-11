@extends('layouts.app') <!-- If you have a layout template -->

@section('content')
<body>
    <div class="container">
        <h2>Booking Form</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('booking.submit') }}" method="post">
            @csrf

            <div class="form-group">
            <label for="location">Location</label>
            <select name="location" id="location" class="form-control" required>
                <option value="Sungai Long">Sungai Long</option>
                <option value="Jalan Ampang">Jalan Ampang</option>
                <option value="Batu Kawan">Batu Kawan</option>
                <option value="Mahkota Cheras">Mahkota Cheras</option>
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

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
@endsection