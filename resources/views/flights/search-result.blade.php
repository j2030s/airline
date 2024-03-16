<!-- resources/views/flights/search_results.blade.php -->

@extends('layouts.app')

@section('title', 'Flight Search Results')

@section('content')
    <div class="container mt-4">
        <h2>Search Results</h2>
        <table class="table">
            <thead>
                <tr>
                  
                    <th>Flight Number</th>
                    <th>Departure Airport</th>
                    <th>Arrival Airport</th>
                    <th>Departure Date</th>
                    <th>Flight Class</th>
                    <th>Price</th>
                    <th>Book</th>
                    
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($flights as $flight)
                    <tr>
                       
                        <td>{{ $flight->flight_number }}</td>
                        <td>{{ $flight->departureAirport->name }}</td>
                        <td>{{ $flight->arrivalAirport->name }}</td>
                        <td>{{ $flight->departure_date }}</td>
                        <td>{{ $flight->class }}</td>

                        <td>{{ $flight->price }}</td>
                        <td>
                            <button type="submit">Book</button>
                        </td>
                       
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- @if($flights->isEmpty())
            <p>No flights found for the given criteria.</p>
        @else
            <div class="row">
                @foreach($flights as $flight)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Flight: {{ $flight->flight_number }}</h5>
                                <p class="card-text">Departure Airport: {{ $flight->departureAirport->name }}</p>
                                <p class="card-text">Arrival Airport: {{ $flight->arrivalAirport->name }}</p>
                                <p class="card-text">Departure Date: {{ $flight->departure_date }}</p>
                                <p class="card-text">Class: {{ $flight->class }}</p>
                                <p class="card-text">Price: ${{ $flight->price }}</p>
                                <a href="{{ route('flights.book', $flight->id) }}" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                
            </div>
        @endif
    </div> --}}
@endsection
