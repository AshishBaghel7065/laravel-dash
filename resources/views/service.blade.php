@extends('layouts.app')

@section('title', 'Gallary - My Laravel Website')
@section('meta_description', 'Discover our wide range of services.')
@section('meta_keywords', 'services, web development, SEO, marketing')
@section('meta_author', 'John Doe')
@section('content')



@foreach($globalTimetable as $timetable)
    <p>{{ $timetable->day }}: {{ \Carbon\Carbon::parse($timetable->opening_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($timetable->closing_time)->format('h:i A') }}</p>
@endforeach



@endsection
