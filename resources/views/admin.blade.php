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
        <a class="nav-link" href= "{{ route('airports.a_index') }}">Bookings</a>
    </li>

    
@endsection




@section('content')

<div class="container p-5">
    <h1>Welcome to Your Dashboard</h1>
    
    <!-- Add content or widgets for your dashboard here -->
    
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Recent Bookings</h5>
                    <!-- Display recent bookings or any relevant information -->
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Upcoming Flights</h5>
                    <!-- Display upcoming flights  -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
