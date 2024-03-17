<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome, {{ $user->name }}</h1>
        <p>Email: {{ $user->email }}</p>
        <!-- Display other user information as needed -->
    </div>



    @foreach($bookings as $booking)
    <div class="card">
        <div class="card-header">
            My Flight
        </div>
        <div class="card-body">
            <h5 class="card-title">Flight Information</h5>
            <p class="card-text">Flight Number: {{ $booking->flight->flight_number }}</p>
            <p class="card-text">Departure Airport: {{ $booking->flight->departureAirport->name }}</p>
            <p class="card-text">Arrival Airport: {{ $booking->flight->arrivalAirport->name }}</p>
            <p class="card-text">Departure Date: {{ $booking->flight->departure_date }}</p>
            <p class="card-text">Class: {{ $booking->flight->class }}</p>
            <p class="card-text">Price: {{ $booking->flight->price }}</p>
            <form action="{{ route('bookings.destroy', $booking->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endforeach

@endsection


@php
$hideNav = true;
@endphp