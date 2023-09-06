<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use GoogleMaps\Client as GoogleMapsClient;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index ()
    {
        $bookings = Booking::all(); // Fetch all bookings from the database
        return view('booking.index', compact('bookings'));
    }

    public function showBookingForm()
    {
        return view('booking.createbooking');
    }

    public function submitBookingForm(Request $request)
        {
         $data = $request->validate([
             'location' => 'required',
             'service_type' => 'required',
             'number_of_cats' => 'required|integer',
             'breed' => 'required',
             'size' => 'required',
             'booking_date' => 'required|date',
             'booking_time' => 'required',
             'nights' => 'required|integer',
             'comment' => 'nullable',
             'status' => 'Coming to Centre',
        ]);


        Booking::create($data);

        return redirect()->route('booking.form')->with('success', 'Booking submitted successfully!');
    }

    public function edit($id)
{
    $booking = Booking::findOrFail($id); // Find the booking by ID

    return view('booking.edit', compact('booking'));
}

public function update(Request $request, $id)
{
    $booking = Booking::findOrFail($id);

    $data = $request->validate([
        'location' => 'required|in:Sungai Long,Jalan Ampang,Batu Kawan,Mahkota Cheras',
        'service_type' => 'required',
        'number_of_cats' => 'required|integer',
        'breed' => 'required',
        'size' => 'required',
        'booking_date' => 'required|date',
        'booking_time' => 'required',
        'nights' => 'required|integer',
        'comment' => 'nullable',
    ]);

    $booking->update($data);

    return redirect()->route('booking.index')->with('success', 'Booking updated successfully!');
}

public function destroy($id)
{
    $booking = Booking::findOrFail($id);
    $booking->delete();

    return redirect()->route('booking.index')->with('success', 'Booking deleted successfully!');
}

    public function confirm(Request $request)
    {
        $bookingData = $request->except('_token');

        Booking::create($bookingData);

        return redirect()->route('booking.index')->with('success', 'Booking confirmed and saved successfully!');
    }
}
