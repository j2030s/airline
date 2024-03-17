<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Flights;
use App\Models\Airports;


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
        $classOptions = ['economy', 'business', 'first']; 
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

        Flights::create([
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
    public function edit(Flights $flight)
    {
        $airports = Airports::all();
        $classOptions = ['economy', 'business', 'first']; 
        return view('flights.f_edit', compact('flight', 'airports', 'classOptions'));
    }

    // update
    public function update(Request $request, Flights $flight)
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
    public function destroy(Flights $flight)
    {
        $flight->delete();
        return redirect()->route('flights.f_index')->with('success', 'Flight deleted successfully!');
    }

    // flight searching



public function search(Request $request)
{
    // Retrieve search criteria from the request
    $departingAirport = $request->input('departing_airport');
    $arrivingAirport = $request->input('arriving_airport');
    
    // Convert the submitted date to the Y-m-d format
    $date = date('Y-m-d', strtotime($request->input('date')));
    
    $class = $request->input('class');

    // Perform flight search based on the criteria
    $flights = Flights::where('departure_airport_id', $departingAirport)
                     ->where('arrival_airport_id', $arrivingAirport)
                     ->whereDate('departure_date', $date)
                     ->where('class', $class)
                     ->get();

    // Return the search results to the view
    return view('flights.search-result', ['flights' => $flights]);
}


}
