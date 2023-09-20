<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

	public function showRegisterForm() {
		return view('auth.register', ['role' => 'user']);
	}
    public function showAdminRegisterForm() {
		return view('auth.register', ['role' => 'admin']);
	}

	public function register(Request $request) {
		$request->validate([
			'name' => 'required|unique:users|max:255',
			'email' => 'required|unique:users|email|max:255',
			'password' => 'required|min:8|confirmed',
			'contact' => 'required|min:8',
            'location' => 'required|max:255',
		]); // if invalid, return back to the original page and show error message
		User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'contact' => $request->contact,
            'location' => $request->location,
            'postcode' => $request->postcode,
		]);

		return redirect('/login');
	}

    public function registerAdmin(Request $request) {
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|min:8|confirmed',
            'contact' => 'required|min:8',
            'location' => 'required|max:255',
            'postcode' => 'required|max:255',
            'role' => 'admin', // This is incorrect
        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'contact' => $request->contact,
            'location' => $request->location,
            'postcode' => $request->postcode,
            'role' => 'admin', // This is correct
        ]);
    
        return redirect('/login');
    }
    
    
}
