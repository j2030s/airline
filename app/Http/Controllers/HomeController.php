<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airports;
use App\Models\Flights;


class HomeController extends Controller
{
    public function index()
    {

        // Retrieve the latest flights
        $latestFlights = Flights::latest()->take(6)->get();

        // Retrieve the list of departing airports
        $departingAirports = Airports::all();
    
        // Retrieve the list of arriving airports
        $arrivingAirports = Airports::all();
    
        // Pass both lists of airports data to the view
        return view('home', [
            'departingAirports' => $departingAirports, 
            'arrivingAirports' => $arrivingAirports,
            'latestFlights' => $latestFlights,
        ]);

    }
    
}
