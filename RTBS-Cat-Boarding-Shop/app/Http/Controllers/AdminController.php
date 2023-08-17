<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;

class AdminController extends Controller
{
        public function dashboard()
    {
        return view('admin.dashboard');
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
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('admin.users')->with('success', 'User created successfully');
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
        ]);

        $user->update($validatedData);

        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }



    //Booking Management
    public function bookingManagement()
    {
        return view('admin.bookingManagement');
    }

    //Feedback Management
    public function feedbackManagement()
    {
        return view('admin.feedbackManagement');
    }

    //Cat Status Notification
    public function catStatusNotification()
    {
        return view('admin.catStatusNotification');
    }
}
