<!-- resources/views/flights/search-result.blade.php -->

@extends('layouts.app')
@section('title', 'Flight Search Result')

@section('content')
    <div class="container mt-5">
        <h1>Search Results</h1>
        @if ($flights->isEmpty())
            <p>No flights found.</p>
        @else
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($flights as $flight)
                        <tr>
                            <td>{{ $flight->flight_number }}</td>
                            <td>{{ $flight->departureAirport->name }}</td>
                            <td>{{ $flight->arrivalAirport->name }}</td>
                            <td>{{ $flight->departure_date }}</td>
                            <td>{{ $flight->class }}</td>
                            <td>{{ $flight->price }}</td>
                            <td>
                                <a href="{{ route('bookings.create', ['flight_id' => $flight->id]) }}">
                                    Book Now
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection


@php
$hideNav = true;
@endphp