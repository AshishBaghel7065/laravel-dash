@extends('layouts.app')

@section('title', 'About - My Laravel Website')
@section('meta_description', 'Welcome to our home page. Explore our services.')
@section('meta_keywords', 'home, Laravel, website, development')
@section('meta_author', 'John Doe')
@section('content')





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <form action="{{ route('contact.create') }}" method="POST">
        @csrf
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required maxlength="255" value="{{ old('name') }}">
        @error('name') <p>{{ $message }}</p> @enderror
        
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required maxlength="20" value="{{ old('phone') }}">
        @error('phone') <p>{{ $message }}</p> @enderror
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required maxlength="255" value="{{ old('email') }}">
        @error('email') <p>{{ $message }}</p> @enderror
        
        <label for="date_of_appointment">Date of Appointment:</label>
        <input type="date" id="date_of_appointment" name="date_of_appointment" required value="{{ old('date_of_appointment') }}">
        @error('date_of_appointment') <p>{{ $message }}</p> @enderror
        
        <label for="message">Message:</label>
        <textarea id="message" name="message" required>{{ old('message') }}</textarea>
        @error('message') <p>{{ $message }}</p> @enderror
        
        <label for="service">Service (Optional):</label>
        <input type="text" id="service" name="service" value="{{ old('service') }}">
        @error('service') <p>{{ $message }}</p> @enderror
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>




@endsection
