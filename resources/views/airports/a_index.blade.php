@extends('layouts.app')

@section('title', 'Admin Airport Manage')



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
        <h2>Airports</h2>

        <a href="{{ route('airports.a_create') }}" class="btn btn-primary mb-3">Create New Airport</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table" border="1">
            
                <tr>
                    <th>Airport ID</th>
                    <th >Airport Code</th>
                    <th >Airport Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <!-- Add more columns as needed -->
                </tr>
            

            
                @foreach($airports as $airport)
                    <tr>
                        <td>{{ $airport->id }}</td>
                        <td>{{ $airport->code }}</td>
                        <td>{{ $airport->name }}</td>
                        {{-- edit --}}
                        <td>  
                            <a href="{{ route('airports.edit', $airport->id) }}" class="btn btn-primary mb-3">Edit</a>

                        </td>
                        {{-- delete --}}
                        <td>
                           
                            <form action="{{ route('airports.destroy', $airport->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    
                @endforeach
            
        </table>
    </div>
@endsection




