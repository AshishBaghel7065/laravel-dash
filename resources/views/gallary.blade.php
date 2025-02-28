@extends('layouts.app')

@section('title', 'Gallary - My Laravel Website')
@section('meta_description', 'Welcome to our home page. Explore our services.')
@section('meta_keywords', 'home, Laravel, website, development')
@section('meta_author', 'John Doe')
@section('content')





@foreach ($galleries as $gallery)
    <img src="{{ asset('storage/' . $gallery->image) }}" alt="Gallery Image" width="100">
@endforeach



@endsection
