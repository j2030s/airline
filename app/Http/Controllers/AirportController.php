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
        $airports = Airports::all();
        return view('airports.a_index', compact('airports'));

        
    // Fetch the list of airports
    $airports = Airports::all();
    
    // Pass the airports data to the view
    return view('search', ['airports' => $airports]);
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

public function search(Request $request ){
 $departing_airport = $request['departing_airport'] ?? "";
 $arriving_airport = $request['arriving_airport'] ?? "";
 $date = $request['date'] ?? "";
 $class = $request['class'];

 $data = Airports::join();
 
 if($departing_airport != ""){
    $airports = Airports::where('id','=',$departing_airport);
    $flights = Flights::where('class','=', $class);
 }else{
    return view('airports.a_index');
 }
}
}

