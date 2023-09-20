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
    
        return view('admin.catStatusManagement.edit', compact('booking','userLocation', 'suggestedLocations'));
    }

    public function updateCatStatus(Request $request, $id)
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
        'status' => 'required',
    ]);

    $booking->update($data);

    return redirect()->route('admin.catStatusNotification')->with('success', 'Booking updated successfully!');
}
}
