<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
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


}
