<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Bookings;
use App\Models\Flights;

class BookingsController extends Controller
{
    // Display all bookings
    public function index()
    {
        $bookings = Bookings::all();
        return view('bookings.index', compact('bookings'));
    }





    // Display the form for creating a new booking
    public function create(Request $request)
    {
        $flight_id = $request->route('flight_id');

        // Ensure that a valid flight ID is provided
        if (!$request->has('flight_id')) {
            return redirect()->back()->with('error', 'Invalid flight ID.');
        }
        
        // Retrieve the flight information based on the provided flight ID
        $flight = Flights::find($request->flight_id);
        
        // Pass the flight information to the booking form
        return view('bookings.create', compact('flight'));
    }







    // Store the booking information
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'nationality' => 'nullable|string|max:255',
            'billing_address' => 'nullable|string|max:255',
            'payment_method' => 'required|string|in:credit_card,paypal',
            
        ]);

        // Generate a random seat number
        $seat_number = Str::random(6);

        // Create a new booking instance
        $booking = Bookings::create([
            'user_id' => Auth::id(),
            'flight_id' => $request->flight_id,
            'seat_number' => $seat_number,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'dob' => $request->dob,
            'nationality' => $request->nationality,
            'billing_address' => $request->billing_address,
            'payment_method' => $request->payment_method,
            'status' => 'booked', // Set the status to 'booked'
        ]);
        
        // Redirect to the booking confirmation page
        return redirect()->route('bookings.confirmation', ['id' => $booking->id]);
    }






    // Display the booking confirmation page
    public function confirmation($id)
    {
        // Retrieve the booking information based on the ID
        $booking = Bookings::findOrFail($id);

        // Return the booking confirmation view with the booking information
        return view('bookings.confirmation', compact('booking'));
    }






    // Display a specific booking
    public function show($id)
    {
        $booking = Bookings::findOrFail($id);
        return view('bookings.show', compact('booking'));
    }




    // Display the form for editing a booking
    public function edit($id)
    {
        $booking = Bookings::findOrFail($id);
        return view('bookings.edit', compact('booking'));
    }

    

    // Update the specified booking in storage
    public function update(Request $request, $id)
    {
        $booking = Bookings::findOrFail($id);
        $booking->update($request->all());
        return redirect()->route('bookings.show', ['id' => $booking->id]);
    }




    // Remove the specified booking from storage
public function destroy($id)
{
    $booking = Bookings::findOrFail($id);
    
    // Update the status to 'cancelled' before deleting
    $booking->status = 'cancelled';
    $booking->save();

    $booking->delete();

    return redirect()->route('bookings.index')->with('success', 'Booking cancelled successfully.');
}
}
