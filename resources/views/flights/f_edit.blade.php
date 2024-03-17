@extends('layouts.app')

@section('title', 'Admin Flight Edit')



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
    <h2>Edit Flight</h2>
    <form action="{{ route('flights.update', $flight->id) }}" method="post">
        @csrf
        @method('PUT')

        <!-- Flight Number -->
        <div class="mb-3">
            <label for="flight_number" class="form-label">Flight Number</label>
            <input type="text" class="form-control" id="flight_number" name="flight_number" value="{{ $flight->flight_number }}" required>
        </div>

        <!-- Departure Airport -->
        <div class="mb-3">
            <label for="departure_airport_id" class="form-label">Departure Airport</label>
            <select class="form-select" id="departure_airport_id" name="departure_airport_id" required>
                
                @foreach($airports as $airport)
                    <option value="{{ $airport->id }}" {{ $airport->id == $flight->departure_airport_id ? 'selected' : '' }}>
                        {{ $airport->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Arrival Airport -->
        <div class="mb-3">
            <label for="arrival_airport_id" class="form-label">Arrival Airport</label>
            <select class="form-select" id="arrival_airport_id" name="arrival_airport_id" required>
              
                @foreach($airports as $airport)
                    <option value="{{ $airport->id }}" {{ $airport->id == $flight->arrival_airport_id ? 'selected' : '' }}>
                        {{ $airport->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Departure Date -->
        <div class="mb-3">
            <label for="departure_date" class="form-label">Departure Date</label>
            <input type="datetime-local" class="form-control" id="departure_date" name="departure_date" value="{{ \Carbon\Carbon::parse($flight->departure_date)->format('Y-m-d\TH:i') }}" required>
        </div>

        <!-- Flight Class -->
        <div class="mb-3">
            <label for="class" class="form-label">Flight Class</label>
            <select class="form-select" id="class" name="class" required>
                @foreach($classOptions as $classOption)
                    <option value="{{ $classOption }}" {{ $classOption == $flight->class ? 'selected' : '' }}>
                        {{ $classOption }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Price -->
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $flight->price }}" required>
        </div>

     

        <button type="submit" class="btn btn-primary">Update Flight</button>
    </form>
</div>
@endsection