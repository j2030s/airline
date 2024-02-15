<!-- resources/views/flights/book.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Book Flight') }}</div>

                <div class="card-body">
                    {{-- Display flight details --}}
                    <h3>{{ $flight->flight_number }}</h3>
                    <p>Departure Airport: {{ $flight->departureAirport->name }}</p>
                    <p>Arrival Airport: {{ $flight->arrivalAirport->name }}</p>
                    <p>Departure Date: {{ $flight->departure_date }}</p>
                    <p>Class: {{ $flight->class }}</p>
                    <p>Price: ${{ $flight->price }}</p>

                    {{-- Booking form --}}
                    <form action="{{ route('flights.confirmBooking', ['flight' => $flight->id]) }}" method="post">
                        @csrf
                        <label for="seat_number">Seat Number:</label>
                        <input type="text" name="seat_number" required>
                        <button type="submit">Confirm Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
