<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use GoogleMaps\Client as GoogleMapsClient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class BookingController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');

    $this->middleware(function ($request, $next) {
        if (Gate::allows('isSubscriber')) {
            return $next($request);
        }

        if (Gate::allows('isUser')) {
            return $next($request);
        }

        Auth::logout(); // Logout the user
        return redirect()->route('home')->with('error', 'You do not have permission to access this page.'); // Redirect to home with error message
    });
}



public function index()
{
    // Get the ID of the logged-in user
    $user_id = Auth::id();

    // Fetch bookings associated with the logged-in user
    $bookings = Booking::where('user_id', $user_id)->get();

    return view('booking.index', compact('bookings'));
}

    public function showBookingForm()
    {
        return view('booking.createbooking');
    }

    public function submitBookingForm(Request $request)
{
    $booking = new Booking(); // Create a new instance of the Booking model

    $booking->location = $request->location; // Assign the location from the request to the booking

    $booking->service_type = $request->service_type;
    $booking->number_of_cats = $request->number_of_cats;
    $booking->breed = $request->breed;
    $booking->size = $request->size;
    $booking->booking_date = $request->booking_date;
    $booking->booking_time = $request->booking_time;
    $booking->nights = $request->nights;
    $booking->comment = $request->comment;

    $user_id = Auth::id(); // Assuming the user is logged in
    $booking->user_id = $user_id;

    $booking->save(); // Save the booking to the database

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
