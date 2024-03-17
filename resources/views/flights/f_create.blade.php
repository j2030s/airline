@extends('layouts.app')

@section('title', 'Admin Flight Manage Page')



@section('side-items')


<li class="nav-item">
    <a class="nav-link" href="{{ route('airports.a_index') }}">Airports</a>
</li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">Users</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('flights.f_index') }}">Flights</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href= "{{ route('bookings.index') }}">Bookings</a>
    </li>

    
@endsection

@section('content')
    <div class="container mt-4">
        <h2>Create a New Flight</h2>
        <form action="{{ route('flights.store') }}" method="post">
            @csrf

            <!-- Flight Number -->
            <div class="mb-3">
                <label for="flight_number" class="form-label">Flight Number</label>
                <input type="text" class="form-control" id="flight_number" name="flight_number" required>
            </div>

            <!-- Departure Airport -->
            <div class="mb-3">
                <label for="departure_airport_id" class="form-label">Departure Airport</label>
                <!-- Assuming you have a list of airports retrieved from the database -->
                <select class="form-select" id="departure_airport_id" name="departure_airport_id" required>
                    <option value="">Select Departure Airport</option>
                    @foreach($airports as $airport)
                        <option value="{{ $airport->id }}">{{ $airport->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Arrival Airport -->
            <div class="mb-3">
                <label for="arrival_airport_id" class="form-label">Arrival Airport</label>
                <!-- Assuming you have a list of airports retrieved from the database -->
                <select class="form-select" id="arrival_airport_id" name="arrival_airport_id" required>
                    <option value="">Select Arrival Airport</option>
                    @foreach($airports as $airport)
                        <option value="{{ $airport->id }}">{{ $airport->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Departure Date -->
            <div class="mb-3">
                <label for="departure_date" class="form-label">Departure Date</label>
                <input type="datetime-local" class="form-control" id="departure_date" name="departure_date" required>
            </div>

             <!-- Flight Class -->
        <div class="mb-3">
            <label for="class" class="form-label">Flight Class</label>
            <select class="form-select" id="class" name="class" required>
                
                @foreach($classOptions as $class)
                    <option value="{{ $class }}">{{ $class }}</option>
                @endforeach
            </select>
        </div>

            <!-- Price -->
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>

            <!-- Add more fields as needed -->

            <button type="submit" class="btn btn-primary">Create Flight</button>
        </form>
    </div>
@endsection