<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function showAdminLoginForm() {
		return view('auth.login', ['role' => 'admin']);
	}

    public function showLoginForm() {
		return view('auth.login', ['role' => 'user']);
	}

    public function loginAdmin(Request $request) {
		$credentials = $request->validate([
			'email' => 'required',
			'password' => 'required',
		]);

		if (Auth::guard('admin')->attempt([
			'email' => $request->email, 
			'password' => $request->password, 
			],
			$request->get('remember')
			)) { // true if authentication was successful
			// An authenticated session will be started 
			$request->session()->regenerate(); // regenerate the user's session to prevent session fixation			
			 
			// session(['role' => 'admin']); // to tell which guard is authenticated
			
			return redirect('/dashboard');
		}
		
		return back()->withErrors(['login failed' => 'Login failed. The email or password is incorrect.'])
					->withInput(); // with role hidden input
	}



    public function loginUser(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', function ($attribute, $value, $fail) {
                if (User::where('email', $value)->get()->count() == 0)
                    $fail('This email is not registered.');
            }],
            'password' => 'required',
        ]);
    
        if (Auth::attempt([
            'email' => $request->email, 
            'password' => $request->password, 
        ], $request->get('remember'))) {
            // Check if the authenticated user has the 'admin' role
            if (Auth::user()->role === 'admin') {
                return redirect('admin/dashboard');
            }
    
            // For other users, you can redirect them to a different route or the default '/'
            return redirect('/');
        }
        
        return back()
            ->withErrors(['login failed' => 'Login failed. The email or password is incorrect.'])
            ->withInput();
    }
    

    protected function authenticated(Request $request, $user)
    {
        if ($user->isAdmin()) {
            return redirect('/admin/dashboard');
        }

        return redirect($this->redirectTo);
    }

    
	public function logout(Request $request) {
		Auth::logout(); // will remove the authentication information from the user's session
		$request->session()->invalidate(); //  invalidate the user's session
		$request->session()->regenerateToken(); // regenerate their CSRF token
        return redirect('/');
	}


}
