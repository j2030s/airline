<?php

// app/Http/Controllers/AirportController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airports;
use App\Models\Flights;

class AirportController extends Controller
{
    public function index()
{
    // Fetch the list of airports
    $airports = Airports::all();
    // $departingAirports = Airports::all();

    // Pass the airports data to the view
    return view('airports.a_index', compact('airports'));
}



    // Display the form for creating a new airport
    public function create()
    {
        return view('airports.a_create');
    }

    // Store a newly created airport in the database
    public function store(Request $request)
    {

        // Validate the incoming request data
        $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        // Create a new Airport instance and save it to the database
        Airports::create([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        // Redirect to the airport index page with a success message
        return redirect()->route('airports.a_index')->with('success', 'Airport created successfully!');
    }

    
    


    // update

    public function edit(Airports $airport)
    {
        return view('airports.a_edit', compact('airport'));
    }

    public function update(Request $request, Airports $airport)
    {
        $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        $airport->update([
            'code' => $request->code,
            'name' => $request->name,
        ]);

    return redirect()->route('airports.a_index')->with('success', 'Airport updated successfully!');
}


// delete

public function destroy(Airports $airport)
{
    $airport->delete();

    return redirect()->route('airports.a_index')->with('success', 'Airport deleted successfully!');
}









//search 
public function search(Request $request)
{
    // Retrieve search criteria from the request
    $departingAirport = $request->input('departing_airport');
    $arrivingAirport = $request->input('arriving_airport');
    $date = $request->input('date');
    $class = $request->input('class');

    // Perform flight search based on the criteria
    $flightsQuery = Flights::query();
    // $airports = Airports::query();
    // $departingAirport = Flights :: join('airports','flights.departure_airport_id','=','airports.id')->select('airports.name as name')->get();
    // $departingAirport = Flights :: join('airports','flights.arrival_airport_id','=','airports.id')->select('airports.name as name')->get;
    

    if ($departingAirport) {
        $flightsQuery->where('departure_airport_id', $departingAirport);
    }

    if ($arrivingAirport) {
        $flightsQuery->where('arrival_airport_id', $arrivingAirport);
    }

    if ($date) {
        $flightsQuery->whereDate('departure_date', $date);
    }

    if ($class) {
        $flightsQuery->where('class', $class);
    }

    $flights = $flightsQuery->get();
    // $departingAirport = Flights :: join('airports','flights.departure_airport_id','=','airports.id')->select('airports.name as name')->get();
    // $departingAirport = Flights :: join('airports','flights.arrival_airport_id','=','airports.id')->select('airports.name as name')->get;
    // Return the search results to the view
    return view('flights.search-result', compact('flights'));
}



}

