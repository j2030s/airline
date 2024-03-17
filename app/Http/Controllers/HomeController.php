<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airports; // Import the Airports model

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve the list of departing airports
        $departingAirports = Airports::all();
    
        // Retrieve the list of arriving airports
        $arrivingAirports = Airports::all();
    
        // Pass both lists of airports data to the view
        return view('home', ['departingAirports' => $departingAirports, 'arrivingAirports' => $arrivingAirports]);
    }
    
}
