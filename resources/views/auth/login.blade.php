@extends('layouts.app')
@section('content')

@include('components.breadcrumb', ['pageTitle' => "Login"])

<style>
    .login-container {
        max-width: 600px;
        margin: 40px auto;
        padding: 30px;
        background-color: #f9f9f9;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .login-container h2 {
        margin-bottom: 25px;
        font-size: 24px;
        color: #333;
        text-align: left;
    }

    .login-container form div {
        margin-bottom: 20px;
    }

    .login-container label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
    }

    .login-container input[type="email"],
    .login-container input[type="password"] {
        width: 100%;
        padding: 10px 12px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 6px;
        transition: border-color 0.3s ease;
    }

    .login-container input:focus {
        border-color: #007bff;
        outline: none;
    }

    .text-red-500 {
        color: #e3342f;
        font-size: 14px;
        margin-top: 5px;
        display: block;
    }

    .login-container button[type="submit"] {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .login-container button[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>



<div class="container">
    <div class="login-container">
        <h2>Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
                @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
                @error('password')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit">Login</button>
        </form>
    </div>
</div>
@endsection