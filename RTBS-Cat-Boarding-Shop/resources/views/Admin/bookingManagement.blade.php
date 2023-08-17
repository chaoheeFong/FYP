@extends('layouts.admin')

@section('content')
        
    <div>
        <body id="booking">

    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
    <h2>Booking Management</h2>
    <!-- Show booking details here -->
    <a href="{{ route('booking.form') }}" class="btn btn-success">Add Booking</a>

    </div>

     <div class="container">


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
                    </tr>
                </thead>
            </table>
    </div>
<script src="../js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
@endsection

