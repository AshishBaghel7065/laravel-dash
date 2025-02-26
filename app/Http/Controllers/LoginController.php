<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class LoginController 
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Check if user exists in the database
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors(['email' => 'Email not found.'])->withInput();
    }

    // Check if the password matches (plain text comparison)
    if ($user->password !== $request->password) {
        return back()->withErrors(['password' => 'Incorrect password.'])->withInput();
    }

    // Log in the user and create session
    Auth::login($user);
    session(['user' => $user]); // Store user data in session

    return redirect()->intended('/dashboard')->with('success', 'Login successful!');
}


    /**
     * Handle logout request.
     */
    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect('/login')->with('success', 'You have been logged out.');
    }

}
