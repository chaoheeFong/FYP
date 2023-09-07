<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
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

    public function showForm()
    {
        return view('feedback');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'comment' => 'required|string',
            'service' => 'required|in:cat-boarding,cat-grooming,vet-medic',
            'star' => 'required|integer|between:1,5',
        ]);

        $feedback = new Feedback();
        $feedback->name = $request->input('name');
        $feedback->email = $request->input('email');
        $feedback->address = $request->input('address');
        $feedback->comment = $request->input('comment');
        $feedback->service = $request->input('service');
        $feedback->rating = $request->input('star');
        $feedback->save();

        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }
}
