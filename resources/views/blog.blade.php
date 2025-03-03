@extends('layouts.app')

@section('title', 'About - My Laravel Website')
@section('meta_description', 'Welcome to our home page. Explore our services.')
@section('meta_keywords', 'home, Laravel, website, development')
@section('meta_author', 'John Doe')
@section('content')




@foreach($globalSocialLinks as $link)
    <a href="{{ $link->link }}" target="_blank">{{ $link->name }}</a>
@endforeach





@endsection
