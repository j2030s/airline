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
        <a class="nav-link" href= "{{ route('airports.a_index') }}">Bookings</a>
    </li>

    
@endsection

@section('content')
    <div class="container mt-4">
        <h2>Flights</h2>

        <a href="{{ route('flights.create') }}" class="btn btn-primary mb-3">Create New Flight</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Flight ID</th>
                    <th>Flight Number</th>
                    <th>Departure Airport</th>
                    <th>Arrival Airport</th>
                    <th>Departure Date</th>
                    <th>Flight Class</th>
                    <th>Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($flights as $flight)
                    <tr>
                        <td>{{ $flight->id }}</td>
                        <td>{{ $flight->flight_number }}</td>
                        <td>{{ $flight->departureAirport->name }}</td>
                        <td>{{ $flight->arrivalAirport->name }}</td>
                        <td>{{ $flight->departure_date }}</td>
                        <td>{{ $flight->class }}</td>

                        <td>{{ $flight->price }}</td>
                        {{-- Edit --}}
                        <td>
                            <a href="{{ route('flights.edit', $flight->id) }}" class="btn btn-primary mb-3">Edit</a>
                        </td>
                        {{-- Delete --}}
                        <td>
                            <form action="{{ route('flights.destroy', $flight->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection






