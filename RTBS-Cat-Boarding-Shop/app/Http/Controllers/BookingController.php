<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index ()
    {
        return view('booking.index');
    }

    public function showForm()
    {
        return view('booking.createbooking');
    }

    public function createBooking(Request $request)
    {
        $validatedData = $request->validate([
            'location' => 'required',
            'service_type' => 'required',
            'number_of_cats' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required',
            'nights' => 'required|integer',
        ]);

        Booking::create($validatedData);

        // You can add a success message here if you want

        return redirect()->route('booking.index')->with('success', 'Booking submitted successfully.');
    }

    public function updateForm(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $validatedData = $request->validate([
            'location' => 'required',
            'service_type' => 'required',
            'number_of_cats' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required',
            'nights' => 'required|integer',
        ]);

        $booking->update($validatedData);

        return redirect()->route('booking.form')->with('success', 'Booking updated successfully.');
    }
}
