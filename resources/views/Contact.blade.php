@extends('layouts.app')

@section('title', isset($seoPages[4]->title) ? $seoPages[4]->title : 'Default Title')
@section('meta_description', isset($seoPages[4]->meta_description) ? $seoPages[4]->meta_description : 'Default Description')
@section('meta_keywords', isset($seoPages[4]->meta_keywords) ? $seoPages[4]->meta_keywords : 'Default Keywords')
@section('meta_author', isset($seoPages[4]->author) ? $seoPages[4]->author : 'Default Author')

@section('content')

@include('components.breadcrumb', ['pageTitle' => 'Contact'])

<section>
    <div class="container">
        
        <div class="contact-container">
             @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-box animate-fade-in">
                        <h5 class="my-3"><i class="fas fa-map-marker-alt me-2"></i> Our Address</h5>
                        <p>P-2 , 241-44 ,Tower-OAK Paramount golfforest Zeta-1 Gr.Noida 201308 </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-box animate-fade-in delay-1">
                        <h5 class="my-3"><i class="fas fa-phone me-2"></i> Call Us</h5>
                        <p>+91 9719267177</p>
                            <p>+91 9599083133</p>
                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-box animate-fade-in delay-2">
                        <h5 class="my-3"><i class="fas fa-envelope me-2"></i> Email</h5>
                        <p>neurigo360@gmail.com</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-6">
                   
                    <div class="contact-form">
                        <h3>Contact Us</h3>
                        <form action="{{ route('contact.create') }}" method="POST">
                            @csrf
                            <input type="text" id="name" name="name" placeholder="Name" required maxlength="255" value="{{ old('name') }}">
                            @error('name') <p style="color: red;">{{ $message }}</p> @enderror

                            <input type="text" id="phone" name="phone" placeholder="Phone" required maxlength="20" value="{{ old('phone') }}">
                            @error('phone') <p style="color: red;">{{ $message }}</p> @enderror

                            <input type="email" id="email" name="email" placeholder="Email" required maxlength="255" value="{{ old('email') }}">
                            @error('email') <p style="color: red;">{{ $message }}</p> @enderror

                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="date" id="date_of_appointment" name="date_of_appointment" required value="{{ old('date_of_appointment') }}">
                                    @error('date_of_appointment') <p style="color: red;">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-lg-6">
                                    <select id="service" name="service" required>
                                        <option value="" selected disabled>Select a service</option>
                                        @foreach($services as $service)
                                            <option value="{{ Str::slug($service->service) }}" 
                                                {{ old('service') == Str::slug($service->service) ? 'selected' : '' }}>
                                                {{ $service->service }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('service') <p style="color: red;">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <textarea id="message" name="message" placeholder="Message" required>{{ old('message') }}</textarea>
                            @error('message') <p style="color: red;">{{ $message }}</p> @enderror

                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="btnn w-100">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="map-container animate-fade-in delay-3">


                        <h3 class="my-3"><i class="fas fa-map-location-dot me-2"></i> Our Location</h3>
                        <iframe
                        
                       src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3254.816074196972!2d77.52355447549641!3d28.51299187573025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ceb621f1153db%3A0x44d414d219e12c98!2sNeurigo360%20physical%20therapy%20rehabilitation%20and%20wellness%20center!5e1!3m2!1sen!2sin!4v1759562929108!5m2!1sen!2sin"
                        
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
