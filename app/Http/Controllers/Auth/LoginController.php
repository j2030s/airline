<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::guard('web')->attempt($credentials)) {
        $request->session()->regenerate();

        // Redirect authenticated users to their dashboard
        if (Auth::user()->role_id === 1) { // Assuming 1 is the role ID for admins
            return redirect()->intended('/admin');
        } else {
            return redirect()->intended('/user');
        }
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}
}

