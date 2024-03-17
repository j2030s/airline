<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    
    
    
    
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }




    public function user()
    {
        $user = auth()->user(); // Get the currently authenticated use

        // Load any additional user-related data such as booked flights
        // $bookedFlights = $user->flights()->get(); // Assuming a relationship between User and Flight models exists

        // Return the user dashboard view with the user and flight data
        return view('user', compact('user'));
    }








    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            // Add more validation rules as needed
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password for security
            // Add more fields as needed
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id, // Ignore the unique email rule for the current user
            // Add more validation rules as needed
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            // Update other fields as needed
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
