@extends('layouts.admin') <!-- If you have a layout template -->

@section('content')
    <div class="container">
        <h2>Edit Booking</h2>

        <form action="{{ route('admin.catStatusManagement.updateCatStatus', $booking->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
    <label for="location">Location</label>
    <select name="location" id="location" class="form-control" required>
        <option value="Sungai Long" {{ $booking->location === 'Sungai Long' ? 'selected' : '' }}>Sungai Long</option>
        <option value="Jalan Ampang" {{ $booking->location === 'Jalan Ampang' ? 'selected' : '' }}>Jalan Ampang</option>
        <option value="Batu Kawan" {{ $booking->location === 'Batu Kawan' ? 'selected' : '' }}>Batu Kawan</option>
        <option value="Mahkota Cheras" {{ $booking->location === 'Mahkota Cheras' ? 'selected' : '' }}>Mahkota Cheras</option>
    </select>
</div>

            <div class="form-group">
                <label for="service_type">Service Type</label>
                <select name="service_type" id="service_type" class="form-control" required>
                    <option value="Cat boarding" {{ $booking->service_type === 'Cat boarding' ? 'selected' : '' }}>Cat Boarding</option>
                    <option value="Cat grooming" {{ $booking->service_type === 'Cat grooming' ? 'selected' : '' }}>Cat Grooming</option>
                    <option value="Vet medic" {{ $booking->service_type === 'Vet medic' ? 'selected' : '' }}>Vet Medic</option>
                </select>
            </div>

            <div class="form-group">
                <label for="number_of_cats">Number of Cats</label>
                <input type="number" name="number_of_cats" id="number_of_cats" class="form-control" value="{{ $booking->number_of_cats }}" required>
            </div>

            <div class="form-group">
                <label for="breed">Breed</label>
                <input type="text" name="breed" id="breed" class="form-control" value="{{ $booking->breed }}" required>
            </div>

            <div class="form-group">
                <label for="size">Size of Cat</label>
                <input type="text" name="size" id="size" class="form-control" value="{{ $booking->size }}" required>
            </div>

            <div class="form-group">
                <label for="booking_date">Date</label>
                <input type="date" name="booking_date" id="booking_date" class="form-control" value="{{ $booking->booking_date }}" required>
            </div>

            <div class="form-group">
                <label for="booking_time">Time</label>
                <input type="time" name="booking_time" id="booking_time" class="form-control" value="{{ $booking->booking_time }}" required>
            </div>

            <div class="form-group">
                <label for="nights">Nights</label>
                <input type="number" name="nights" id="nights" class="form-control" value="{{ $booking->nights }}" required>
            </div>

            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" class="form-control">{{ $booking->comment }}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Cat status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Coming to Centre" {{ $booking->status === 'Coming to Centre' ? 'selected' : '' }}>Coming to Centre</option>
                    <option value="received" {{ $booking->status === 'received' ? 'selected' : '' }}>received</option>
                    <option value="done bath" {{ $booking->status === 'done bath' ? 'selected' : '' }}>done bath</option>
                    <option value="done feeding" {{ $booking->status === 'done feeding' ? 'selected' : '' }}>done feeding</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection