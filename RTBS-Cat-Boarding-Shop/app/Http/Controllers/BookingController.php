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
    $userLocation = Auth::user()->location;
    $postcodes = Auth::user()->postcode;
    $firstTwoDigits = substr($postcodes, 0, 2);

    $locations = [
        '01' => 'Perlis Branch',
        '02' => 'Perlis Branch',
        '05' => 'Kedah Branch',
        '06' => 'Kedah Branch',
        '07' => 'Kedah Branch',
        '08' => 'Kedah Branch',
        '09' => 'Kedah Branch',
        '10' => 'Penang Branch',
        '11' => 'Penang Branch',
        '12' => 'Penang Branch',
        '13' => 'Penang Branch',
        '14' => 'Penang Branch',
        '15' => 'Kelantan Branch',
        '16' => 'Kelantan Branch',
        '17' => 'Kelantan Branch',
        '18' => 'Kelantan Branch',
        '20' => 'Terengganu Branch',
        '21' => 'Terengganu Branch',
        '22' => 'Terengganu Branch',
        '23' => 'Terengganu Branch',
        '24' => 'Terengganu Branch',
        '25' => 'Pahang Branch',
        '26' => 'Pahang Branch',
        '27' => 'Pahang Branch',
        '28' => 'Pahang Branch',
        '30' => 'Perak Branch',
        '31' => 'Perak Branch',
        '32' => 'Perak Branch',
        '33' => 'Perak Branch',
        '34' => 'Perak Branch',
        '35' => 'Perak Branch',
        '36' => 'Perak Branch',
        '39' => 'Cameron Highlands Branch',
        '40' => 'Selangor Branch',
        '41' => 'Selangor Branch',
        '42' => 'Selangor Branch',
        '43' => 'Selangor Branch',
        '44' => 'Selangor Branch',
        '45' => 'Selangor Branch',
        '46' => 'Selangor Branch',
        '47' => 'Selangor Branch',
        '48' => 'Selangor Branch',
        '49' => 'Frasers Hill Branch',
        '50' => 'KL Branch',
        '51' => 'KL Branch',
        '52' => 'KL Branch',
        '53' => 'KL Branch',
        '54' => 'KL Branch',
        '55' => 'KL Branch',
        '56' => 'KL Branch',
        '57' => 'KL Branch',
        '58' => 'KL Branch',
        '59' => 'KL Branch',
        '60' => 'KL Branch',
        '62' => 'Putrajaya Branch',
        '63' => 'Selangor Branch',
        '64' => 'Selangor Branch',
        '65' => 'Selangor Branch',
        '66' => 'Selangor Branch',
        '67' => 'Selangor Branch',
        '68' => 'Selangor Branch',
        '69' => 'Genting Highlands Branch',
        '70' => 'Sembilan Branch',
        '71' => 'Sembilan Branch',
        '72' => 'Sembilan Branch',
        '73' => 'Sembilan Branch',
        '75' => 'Melaka Branch',
        '76' => 'Melaka Branch',
        '77' => 'Melaka Branch',
        '78' => 'Melaka Branch',
        '79' => 'Johor Branch',
        '80' => 'Johor Branch',
        '81' => 'Johor Branch',
        '82' => 'Johor Branch',
        '83' => 'Johor Branch',
        '84' => 'Johor Branch',
        '85' => 'Johor Branch',
        '86' => 'Johor Branch',
        '87' => 'Labuan Branch',
        '88' => 'Sabah Branch',
        '89' => 'Sabah Branch',
        '90' => 'Sabah Branch',
        '91' => 'Sabah Branch',
        '93' => 'Sarawak Branch',
        '94' => 'Sarawak Branch',
        '95' => 'Sarawak Branch',
        '96' => 'Sarawak Branch',
        '97' => 'Sarawak Branch',
        '98' => 'Sarawak Branch',
    ];
    

    $suggestedLocations = [];

    foreach ($locations as $code => $location) {
        if (strpos($code, $firstTwoDigits) !== false) {
            $suggestedLocations[$code] = $location;
        }
    }

    return view('booking.createbooking', compact('userLocation', 'suggestedLocations'));
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

    return redirect()->route('booking.index')->with('success', 'Booking submitted successfully!');
}




    public function edit($id)
{
    $booking = Booking::findOrFail($id); // Find the booking by ID

    $userLocation = Auth::user()->location;
    $postcodes = Auth::user()->postcode;
    $firstTwoDigits = substr($postcodes, 0, 2);

    $locations = [
        '01' => 'Perlis Branch',
        '02' => 'Perlis Branch',
        '05' => 'Kedah Branch',
        '06' => 'Kedah Branch',
        '07' => 'Kedah Branch',
        '08' => 'Kedah Branch',
        '09' => 'Kedah Branch',
        '10' => 'Penang Branch',
        '11' => 'Penang Branch',
        '12' => 'Penang Branch',
        '13' => 'Penang Branch',
        '14' => 'Penang Branch',
        '15' => 'Kelantan Branch',
        '16' => 'Kelantan Branch',
        '17' => 'Kelantan Branch',
        '18' => 'Kelantan Branch',
        '20' => 'Terengganu Branch',
        '21' => 'Terengganu Branch',
        '22' => 'Terengganu Branch',
        '23' => 'Terengganu Branch',
        '24' => 'Terengganu Branch',
        '25' => 'Pahang Branch',
        '26' => 'Pahang Branch',
        '27' => 'Pahang Branch',
        '28' => 'Pahang Branch',
        '30' => 'Perak Branch',
        '31' => 'Perak Branch',
        '32' => 'Perak Branch',
        '33' => 'Perak Branch',
        '34' => 'Perak Branch',
        '35' => 'Perak Branch',
        '36' => 'Perak Branch',
        '39' => 'Cameron Highlands Branch',
        '40' => 'Selangor Branch',
        '41' => 'Selangor Branch',
        '42' => 'Selangor Branch',
        '43' => 'Selangor Branch',
        '44' => 'Selangor Branch',
        '45' => 'Selangor Branch',
        '46' => 'Selangor Branch',
        '47' => 'Selangor Branch',
        '48' => 'Selangor Branch',
        '49' => 'Frasers Hill Branch',
        '50' => 'KL Branch',
        '51' => 'KL Branch',
        '52' => 'KL Branch',
        '53' => 'KL Branch',
        '54' => 'KL Branch',
        '55' => 'KL Branch',
        '56' => 'KL Branch',
        '57' => 'KL Branch',
        '58' => 'KL Branch',
        '59' => 'KL Branch',
        '60' => 'KL Branch',
        '62' => 'Putrajaya Branch',
        '63' => 'Selangor Branch',
        '64' => 'Selangor Branch',
        '65' => 'Selangor Branch',
        '66' => 'Selangor Branch',
        '67' => 'Selangor Branch',
        '68' => 'Selangor Branch',
        '69' => 'Genting Highlands Branch',
        '70' => 'Sembilan Branch',
        '71' => 'Sembilan Branch',
        '72' => 'Sembilan Branch',
        '73' => 'Sembilan Branch',
        '75' => 'Melaka Branch',
        '76' => 'Melaka Branch',
        '77' => 'Melaka Branch',
        '78' => 'Melaka Branch',
        '79' => 'Johor Branch',
        '80' => 'Johor Branch',
        '81' => 'Johor Branch',
        '82' => 'Johor Branch',
        '83' => 'Johor Branch',
        '84' => 'Johor Branch',
        '85' => 'Johor Branch',
        '86' => 'Johor Branch',
        '87' => 'Labuan Branch',
        '88' => 'Sabah Branch',
        '89' => 'Sabah Branch',
        '90' => 'Sabah Branch',
        '91' => 'Sabah Branch',
        '93' => 'Sarawak Branch',
        '94' => 'Sarawak Branch',
        '95' => 'Sarawak Branch',
        '96' => 'Sarawak Branch',
        '97' => 'Sarawak Branch',
        '98' => 'Sarawak Branch',
    ];
        $suggestedLocations = [];

    foreach ($locations as $code => $location) {
        if (strpos($code, $firstTwoDigits) !== false) {
            $suggestedLocations[$code] = $location;
        }
    }



    return view('booking.edit', compact('booking','userLocation', 'suggestedLocations'));
}

public function update(Request $request, $id)
{
    $booking = Booking::findOrFail($id);

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
    ]);

    $booking->update($data);

    return redirect()->route('booking.index')->with('success', 'Booking updated successfully!');
}

public function destroy($id)
{
    $booking = Booking::findOrFail($id);

    if ($booking->status === 'received' || $booking->status === 'done bath' || $booking->status === 'done feeding') {
        return redirect()->route('booking.index')->with('error', 'Cannot delete booking with status: ' . $booking->status);
    }

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
