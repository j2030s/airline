<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookings;
use App\Models\Flights;

class AdminController extends Controller
{
    public function admin ()
    {

        // Retrieve the latest bookings
        $latestBookings = Bookings::latest()->with('flight')->get();
        // Retrieve upcoming flights
        $upcomingFlights = Flights::where('departure_date', '>', now())->take(5)->get();


        // Pass the latest booking to the admin dashboard view
        return view('admin',  compact('latestBookings','upcomingFlights'));
        
    }
}
