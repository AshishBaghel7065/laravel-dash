@extends('layouts.app')

@section('content')
<div class="container">
   
    

    
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
@endsection
