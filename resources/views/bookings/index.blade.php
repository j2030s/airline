@extends('layouts.app')

@section('title', 'Bookings Index')

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
        <h2>Bookings</h2>

    

        <table class="table">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Flight ID</th>
                    <th>Status</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Date of Birth</th>
                    <th>Nationality</th>
                    <th>Billing Address</th>
                    <th>Payment Method</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->flight_id }}</td>
                        <td>{{ $booking->status }}</td>
                        <td>{{ $booking->full_name }}</td>
                        <td>{{ $booking->email }}</td>
                        <td> {{ $booking->phone_number }}</td>
                        <td>{{ $booking->dob }}</td>
                        <td> {{ $booking->nationality }}</td>
                        <td> {{ $booking->billing_address }}</td>
                        <td>{{ $booking->payment_method }}</td>
                        
                        {{-- Delete --}}
                        <td>
                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="post">
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
