<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
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

    public function index() {
        return view('profile');
    }

    public function uploadProfilePicture(Request $request)
{
    $user = auth()->user();

    if ($request->hasFile('profile_picture')) {
        $image = $request->file('profile_picture');
        $fileName = time() . '.' . $image->getClientOriginalExtension();

        // Store the image in the storage/app/public/profile_pictures directory
        Storage::disk('public')->putFileAs('profile_pictures', $image, $fileName);

        // Update the profile_picture column in the users table
        $user->update(['profile_picture' => $fileName]);
    }

    return redirect()->back()->with('success', 'Profile picture uploaded successfully.');
}

public function storePicture(Request $request)
{
    $request->validate([
        'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    if ($request->hasFile('profile_picture')) {
        $file = $request->file('profile_picture');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('profile_pictures', $fileName, 'public');
        Auth::user()->update(['profile_picture' => $fileName]);
    }

    return redirect()->back()->with('success', 'Profile picture uploaded successfully.');
}


public function changeRole()
{
    $user = auth()->user(); // Get the authenticated user
    $user->role = 'subscriber'; // Change the role
    $user->save(); // Save the user

    return redirect()->route('home'); // Redirect to home after role change
}


}
