@extends('layouts.app')

@section('title', 'home')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Frequently Asked Questions</h2>

    @foreach($faqs as $faq)
    <div>
        <h3>{{ $faq->question }}</h3>
        <p>{{ $faq->answer }}</p>
        <p>Written by: {{ $faq->written_by }}</p>
    </div>
@endforeach



@endsection
