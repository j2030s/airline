<!-- resources/views/auth/login.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                            <label for="email">Email:</label>
                            <input type="email" name="email" required>
                            
                            <label for="password">Password:</label>
                            <input type="password" name="password" required>
                            
                            <button type="submit">Login</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
