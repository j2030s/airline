<?php

// app/Http/Controllers/FlightController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flights;
use App\Models\Airports; // Import Airport model to fetch airports
use App\Models\FlightClass; // Import FlightClass model to fetch flight classes

class FlightController extends Controller
{

    public function index()
    {
        $flights = Flights::all();
        return view('flights.f_index', compact('flights'));
    }

    public function create()
    {
        $airports = Airports::all();
       
        $classOptions = ['Economy Class', 'Business Class', 'First Class'];
        return view('flights.f_create', compact('airports', 'classOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'flight_number' => 'required|string|max:255',
            'departure_airport_id' => 'required|exists:airports,id',
            'arrival_airport_id' => 'required|exists:airports,id',
            'departure_date' => 'required|date',
            'class' => 'nullable|string|max:255', 
            'price' => 'required|numeric',
        ]);

        Flight::create([
            'flight_number' => $request->flight_number,
            'departure_airport_id' => $request->departure_airport_id,
            'arrival_airport_id' => $request->arrival_airport_id,
            'departure_date' => $request->departure_date,
            'class' => $request->class, 
            'price' => $request->price,
        ]);

        return redirect()->route('flights.f_index')->with('success', 'Flight created successfully!');
    }

    
    // edit

   // app/Http/Controllers/FlightController.php

public function edit(Flight $flight)
{
    $airports = Airport::all();
    $classOptions = ['Economy Class', 'Business Class', 'First Class']; 

    return view('flights.f_edit', compact('flight', 'airports', 'classOptions'));
}

    







// update
// app/Http/Controllers/FlightController.php

public function update(Request $request, Flight $flight)
{
    $request->validate([
        'flight_number' => 'required|string|max:255',
        'departure_airport_id' => 'required|exists:airports,id',
        'arrival_airport_id' => 'required|exists:airports,id',
        'departure_date' => 'required|date',
        'class' => 'nullable|string|max:255', 
        'price' => 'required|numeric',
    ]);

    $flight->update([
        'flight_number' => $request->flight_number,
        'departure_airport_id' => $request->departure_airport_id,
        'arrival_airport_id' => $request->arrival_airport_id,
        'departure_date' => $request->departure_date,
        'class' => $request->class,
        'price' => $request->price,
    ]);

    return redirect()->route('flights.f_index')->with('success', 'Flight updated successfully!');
}



// delete

public function destroy(Flight $flight)
    {
        $flight->delete();

        return redirect()->route('flights.f_index')->with('success', 'Flight deleted successfully!');
    }

}
