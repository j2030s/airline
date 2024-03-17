@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Book Flight</h1>
        <form method="post" action="{{ route('bookings.store') }}">
            @csrf

            <!-- Hidden Field for Flight ID -->
            <input type="hidden" name="flight_id" value="{{ $flight->id }}">

            <!-- Passenger's Full Name -->
            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>

            <!-- Passenger's Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <!-- Passenger's Phone Number -->
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number">
            </div>

            <!-- Passenger's Date of Birth -->
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob">
            </div>

                <!-- Passenger's Nationality -->
            <div class="mb-3">
                <label for="nationality" class="form-label">Nationality</label>
                <input type="text" class="form-control" id="nationality" name="nationality">
            </div>

            <!-- Billing Address -->
            <div class="mb-3">
                <label for="billing_address" class="form-label">Billing Address</label>
                <textarea class="form-control" id="billing_address" name="billing_address" rows="3"></textarea>
            </div>

            <!-- Payment Method -->
            <div class="mb-3">
                <label for="payment_method" class="form-label">Payment Method</label>
                <select class="form-select" id="payment_method" name="payment_method">
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Book Flight</button>
        </form>
    </div>
@endsection


@php
$hideNav = true;
@endphp