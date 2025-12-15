@extends('layouts.app')

@section('title', isset($seoPages[1]->title) ? $seoPages[1]->title : 'Default Title')
@section('meta_description', isset($seoPages[1]->meta_description) ? $seoPages[1]->meta_description : 'Default Description')
@section('meta_keywords', isset($seoPages[1]->meta_keywords) ? $seoPages[1]->meta_keywords : 'Default Keywords')
@section('meta_author', isset($seoPages[1]->author) ? $seoPages[1]->author : 'Default Author')

@section('content')

@include('components.breadcrumb', ['pageTitle' => 'About'])
  <div class="container">
<section class="about-section py-5">
  
        @foreach($about as $index => $item)
        <div class="row align-items-center about-page {{ $index % 2 == 0 ? '' : 'flex-row-reverse' }}">
            <div class="col-lg-6 mb-4 mb-lg-0 text-center">
                <div class="about-image2 my-3">
                    <img src="{{ asset('updateabout/'.$item->image) }}" alt="About Image" class="img-fluid rounded shadow-sm">
                   
                </div>
            </div>
            <div class="col-lg-6 mb-4 mb-lg-0 about-form text-center">
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
            </div>
        
              
        </div>

        <div class="container">
            <div class="row">
            <div class="col-12">
                <div class="about-detail">
                    {!! $item->description !!}
                </div>
            </div>
        </div>
        </div>

        @endforeach
  
</section>
  </div>
@endsection
