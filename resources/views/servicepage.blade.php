@extends('layouts.app') {{-- Extend the main layout --}}

@section('title', $service->title) {{-- Set the page title --}}

@section('content')
    <div class="container">
        <h1>{{ $service->service }}</h1>
        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}">

        <p><strong>Category:</strong> {{ $service->category }}</p>
        <p><strong>Published on:</strong> {{ $service->created_at->format('M d, Y') }}</p>
        <hr>
        <div class="service-content">
            {!! $service->description !!} {{-- Use {!! !!} to render HTML content properly --}}
        </div>
    </div>
@endsection
