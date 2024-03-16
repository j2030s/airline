<!-- resources/views/auth/login.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-3">
        <h3>Log-In Form</h3>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        
                        <div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </form>
                    <div class="mt-3">
                        <a href="{{ route('register') }}">Don't have an account? Register here.</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

    
@endsection


@php
    $hideNav = true;
@endphp