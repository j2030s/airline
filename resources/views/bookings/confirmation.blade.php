<!-- resources/views/bookings/confirmation.blade.php -->

@extends('layouts.app')

@section('title', 'Booking Confirmation')

@section('content')
    <div class="container mt-5">
        <h1>Booking Confirmation</h1>
        <div class="row">
            <div class="col-md-6">
                <h2>Booking Details</h2>
                <ul>
                    <li><strong>Booking ID:</strong> {{ $booking->id }}</li>
                    <li><strong>Status:</strong> {{ $booking->status }}</li>
                    <li><strong>Full Name:</strong> {{ $booking->full_name }}</li>
                    <li><strong>Email:</strong> {{ $booking->email }}</li>
                    <li><strong>Phone Number:</strong> {{ $booking->phone_number }}</li>
                    <li><strong>Date of Birth:</strong> {{ $booking->dob }}</li>
                    <li><strong>Nationality:</strong> {{ $booking->nationality }}</li>
                    <li><strong>Billing Address:</strong> {{ $booking->billing_address }}</li>
                    <li><strong>Payment Method:</strong> {{ $booking->payment_method }}</li>
                    
                </ul>
            </div>
            <div class="col-md-6">
                <h2>Flight Information</h2>
                <ul>
                    <li><strong>Flight Number:</strong> {{ $booking->flight->flight_number }}</li>
                    <li><strong>Departure Airport:</strong> {{ $booking->flight->departureAirport->name }}</li>
                    <li><strong>Arrival Airport:</strong> {{ $booking->flight->arrivalAirport->name }}</li>
                    <li><strong>Departure Date:</strong> {{ $booking->flight->departure_date }}</li>
                    <li><strong>Class:</strong> {{ $booking->flight->class }}</li>
                    <li><strong>Price:</strong> {{ $booking->flight->price }}</li>
                   
                </ul>
            </div>
        </div>
    </div>
@endsection


@php
$hideNav = true;
@endphp