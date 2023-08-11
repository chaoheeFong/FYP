<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{

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
        $feedback->star = $request->input('star');
        $feedback->save();

        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }
}
