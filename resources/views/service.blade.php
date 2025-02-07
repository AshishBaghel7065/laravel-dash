@extends('layouts.app')

@section('title', 'Service')

@section('content')
    <h1>Our Services</h1>
    @foreach($faqs as $faq)
    <div>
        <h3>{{ $faq->question }}</h3>
        <p>{{ $faq->answer }}</p>
        <p>Written by: {{ $faq->written_by }}</p>
    </div>
@endforeach

@endsection
