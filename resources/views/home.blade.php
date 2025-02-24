@extends('layouts.app')

@section('title', 'home')

@section('content')
@if(session('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('error'))
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container mt-5">
    <h2 class="mb-4">Frequently Asked Questions</h2>

    @foreach($faqs as $faq)
    <div>
        <h3>{{ $faq->question }}</h3>
        <p>{{ $faq->answer }}</p>
        <p>Written by: {{ $faq->written_by }}</p>
    </div>
    @endforeach

<h3 class="p-2">Contact</h3>
<div class="dashboard">
    <div class="container">
        <div class="form-box">
            <form action="{{ route('contact.create') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="date_of_appointment">Date of Appointment</label>
                    <input type="date" class="form-control" id="date_of_appointment" name="date_of_appointment" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" required></textarea>
                </div>
                <div class="form-group">
                    <label for="service">Service (Optional)</label>
                    <input type="text" class="form-control" id="service" name="service">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>




@endsection
