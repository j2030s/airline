@extends('layouts.app')

@section('title', 'Admin Page')

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

<div class="container p-5">
    <h1>Welcome to Your Dashboard</h1>
    
    
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Recent Bookings</h5>
                    @if ($latestBookings->isNotEmpty())
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>User ID</th>
                                        <th>Flight ID</th>
                                        <th>Departure Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($latestBookings->take(5) as $booking)
                                        <tr>
                                            <td>{{ $booking->id }}</td>
                                            <td>{{ $booking->user_id }}</td>
                                            <td>{{ $booking->flight_id }}</td>
                                            <td>{{ $booking->flight->departure_date }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No recent bookings found.</p>
                        @endif
                        <p>
                            <a href="{{ route('bookings.index') }}" class="btn btn-primary">Manage Bookings</a>
                        </p>
                </div>
            </div>
        </div>





        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Upcoming Flights</h5>
                    @if ($upcomingFlights->isNotEmpty())
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Flight Number</th>
                                        <th>Departure Airport</th>
                                        <th>Arrival Airport</th>
                                        <th>Departure Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($upcomingFlights as $flight)
                                        <tr>
                                            <td>{{ $flight->flight_number }}</td>
                                            <td>{{ $flight->departureAirport->name }}</td>
                                            <td>{{ $flight->arrivalAirport->name }}</td>
                                            <td>{{ $flight->departure_date }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No upcoming flights found.</p>
                        @endif

                        <p>
                            <a href="{{ route('flights.f_index') }}" class="btn btn-primary">Manage Flights</a>
                        </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
