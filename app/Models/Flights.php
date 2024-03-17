<?php

namespace App\Models;
use App\Models\Airports;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flights extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_number',
        'departure_airport_id',
        'arrival_airport_id',
        'departure_date',
        'class',
        'price',
    ];

    public function departureAirport()
    {
        return $this->belongsTo(Airports::class, 'departure_airport_id');
    }

    public function arrivalAirport()
    {
        return $this->belongsTo(Airports::class, 'arrival_airport_id');
    }







    public function autocomplete(Request $request)
{
    $query = $request->input('query');
    $airports = Airports::where('name', 'like', '%' . $query . '%')->pluck('name');

    return response()->json($airports);
}






    public function scopeSearch($query, $departingAirport, $arrivingAirport, $date, $class)
{
    return $query->where('departure_airport_id', $departingAirport)
                 ->where('arrival_airport_id', $arrivingAirport)
                 ->whereDate('departure_date', $date)
                 ->where('class', $class);
}


}

