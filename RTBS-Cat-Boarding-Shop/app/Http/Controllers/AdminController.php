<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Validation\Rule;
use App\Models\Feedback;

class AdminController extends Controller
{
//    public function __construct()
//{
//    $this->middleware('admin');
//}
    public function dashboard()
    {
        $feedbackCount = Feedback::count();
        $bookingCount = Booking::count();
        $userCount = User::count();
        return view('admin.dashboard', compact('bookingCount', 'feedbackCount', 'userCount'));
    }

    //User Management
    public function userManagement()
    {
        $users = User::all();
        return view('admin.userManagement', compact('users'));
    }
    public function createUser()
    {
        return view('admin.userManagement.create');
    }

    public function storeUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8',
            'contact' => 'required|string|max:20',
            'role' => 'required|in:user,subscriber', // Validate role input
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'contact' => $validatedData['contact'],
            'role' => $validatedData['role'],
        ]);;

        return redirect()->route('admin.userManagement')->with('success', 'User created successfully');
    }

    public function destroyUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.userManagement')->with('success', 'User deleted successfully');
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('admin.userManagement.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => [
            'required', 'email', Rule::unique('users')->ignore($user->id),
        ],
        'contact' => [
            'required', Rule::unique('users')->ignore($user->id),
        ],
        'role' => [
            'required',
            Rule::in(['subscriber', 'user']),
        ],
    ]);

    $user->update([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'contact' => $validatedData['contact'],
        'role' => $validatedData['role'],
    ]);

    // Assuming you have a separate method for updating roles,
    // you can call it here, passing the $user and the role value from $validatedData['role']

    return redirect()->route('admin.userManagement')->with('success', 'User updated successfully');
}



    //Booking Management
    public function bookingManagement()
    {
        $bookings = Booking::all(); // Fetch all bookings from the database
        return view('admin.bookingManagement', compact('bookings'));
    }

    //Feedback Management
       public function feedbackManagement()
    {
        $feedbackManagement = Feedback::all();

        return view('admin.feedbackManagement', compact('feedbackManagement'));
    }

    public function delete($id)
{
    $feedback = Feedback::find($id);
    if ($feedback) {
        $feedback->delete();
    }
    
    return redirect()->back(); // Redirect back to the feedback management page
}


    //Cat Status Notification
    public function catStatusNotification()
    {
        return view('admin.catStatusNotification');
    }
}
