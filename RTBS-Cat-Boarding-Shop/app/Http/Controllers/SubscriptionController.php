<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
class SubscriptionController extends Controller
{
    public function index()
    {
        return view('subscription');
    }

    public function showPayment(){
        return view('payment');
    }

    public function processPayment(Request $request)
    {
        // Assuming you have a successful payment logic here

        // Retrieve the authenticated user
        $user = Auth::user();

        // Check if the user is logged in
        if ($user) {
            // Update the user's role
            $user->role = 'subscriber';
            $user->save();
        }

        session()->flash('success', 'You are now a subscriber!');

        return redirect()->route('home')->with('success', 'You are now a subscriber!');
    }
}
