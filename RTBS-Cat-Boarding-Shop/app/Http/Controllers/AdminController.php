<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Validation\Rule;
use App\Models\Feedback;
use App\Mail\HelloMail;
use App\Mail\bath;
use App\Mail\ComingToCentre;
use App\Mail\feed;
use App\Mail\received;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
{
    $this->middleware(function ($request, $next) {
        if (auth()->check() && auth()->user()->role == 'admin') {
            return $next($request);
        }

        Auth::logout(); // Logout the user
        return redirect()->route('home')->with('error', 'You do not have permission to access this page.'); // Redirect to home with error message
    });
}
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
    // Fetch only users with role 'user' or 'subscriber'
    $users = User::whereIn('role', ['user', 'subscriber'])->get();

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
        $bookings = Booking::all(); // Fetch all bookings from the database
        return view('admin.catStatusNotification', compact('bookings'));
    }

    public function catStatusMail(){
        Mail::to('chaohee00@gmail.com')
        ->send(new HelloMail());
        return redirect('/admin/catStatusNotification')->with('success', 'Coming to Centre action performed!');
    }

    public function comingToCentre(){
        Mail::to('chaohee00@gmail.com')
        ->send(new ComingToCentre());
        return redirect('/admin/catStatusNotification')->with('success', 'Coming to Centre action performed!');
    }

    public function feed(){
        Mail::to('chaohee00@gmail.com')
        ->send(new feed());
        return redirect('/admin/catStatusNotification')->with('success', 'Fed action performed!');
    
    }

    public function bath(){
        Mail::to('chaohee00@gmail.com')
        ->send(new bath());
        return redirect('/admin/catStatusNotification')->with('success', 'Bath action performed!');
    }

        public function received(){
        Mail::to('chaohee00@gmail.com')
        ->send(new received());
        return redirect('/admin/catStatusNotification')->with('success', 'Received action performed!');
    }

    public function catStatus(){
        return view('admin.catStatusManagement.sendStatus');
    }

    public function editCatStatus($id)
    {
        $booking = Booking::findOrFail($id); // Find the booking by ID
    
        return view('admin.catStatusManagement.edit', compact('booking'));
    }

    public function updateCatStatus(Request $request, $id)
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
        'status' => 'required',
    ]);

    $booking->update($data);

    return redirect()->route('admin.catStatusNotification')->with('success', 'Booking updated successfully!');
}
}
