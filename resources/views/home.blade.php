@extends('layouts.app')

@section('title', 'Home - My Laravel Website')
@section('meta_description', 'Welcome to our home page. Explore our services.')
@section('meta_keywords', 'home, Laravel, website, development')
@section('meta_author', 'John Doe')

@section('content')
@foreach ($posters as $poster)
    <div>
        <h2>{{ $poster->postername }}</h2>
        <img src="{{ asset('storage/' . $poster->image) }}" alt="Poster Image" width="400">
    </div>
@endforeach


@endsection
