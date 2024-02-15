<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // ...

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function username()
    {
        return 'email';
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect('/admin')
            ->with('success', 'Welcome back, ' . $user->name . '! You are now logged in.');
    }


    // ...
}

