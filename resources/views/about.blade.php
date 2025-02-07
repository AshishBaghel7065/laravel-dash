@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <h1>About Us</h1>
    @foreach($faqs as $faq)
    <div>
        <h3>{{ $faq->question }}</h3>
        <p>{{ $faq->answer }}</p>
        <p>Written by: {{ $faq->written_by }}</p>
    </div>
@endforeach

@endsection
