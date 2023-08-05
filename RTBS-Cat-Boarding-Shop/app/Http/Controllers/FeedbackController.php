<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
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

        Feedback::create($request->all());

        return redirect()->route('feedback')->with('success', 'Thank you for your feedback!');
    }
}
