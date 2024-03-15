<!-- resources/views/flights/book.blade.php -->

@extends('layouts.app')

@section('title', 'Book Flight')

@section('content')
    <div class="container mt-4">
        <h2>Book Flight</h2>

        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Flight: {{ $flight->flight_number }}</h5>
                <p class="card-text">Departure Airport: {{ $flight->departureAirport->name }}</p>
                <p class="card-text">Arrival Airport: {{ $flight->arrivalAirport->name }}</p>
                <p class="card-text">Departure Date: {{ $flight->departure_date }}</p>
                <p class="card-text">Class: {{ $flight->class }}</p>
                <p class="card-text">Price: ${{ $flight->price }}</p>

                <!-- Add your booking form or button here -->
                <form action="{{ route('flights.confirmBooking', $flight->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">Confirm Booking</button>
                </form>
            </div>
        </div>
    </div>
@endsection

