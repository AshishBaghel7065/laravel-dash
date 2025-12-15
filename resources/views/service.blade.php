
@extends('layouts.app')

@section('title', isset($seoPages[1]->title) ? $seoPages[2]->title : 'Default Title')
@section('meta_description', isset($seoPages[2]->meta_description) ? $seoPages[2]->meta_description : 'Default Description')
@section('meta_keywords', isset($seoPages[2]->meta_keywords) ? $seoPages[2]->meta_keywords : 'Default Keywords')
@section('meta_author', isset($seoPages[2]->author) ? $seoPages[2]->author : 'Default Author')

@section('content')

@include('components.breadcrumb', ['pageTitle' => 'Service'])

<section class="service-container">
  <div class="service-main-overlay2"></div>
  <div class="heading-section text-center">
    <h3 class="heading-big">Our Services</h3>
    <h4 class="heading-small">Our Services</h4>
  </div>
  <div class="container">
    <div class="testimonials">
      <div class="row">
        @foreach($services as $service)
          <div class="col-lg-6 col-md-6 mb-4">
            <div class="service-card">
              <div class="gradient-overlay"></div>
              <div class="content position-relative">
                <div class="image">
                  <img src="{{ asset('services/'.$service['image']) }}" class="service-image" alt="{{ $service['title'] }}">
                </div>
                <div class="details">
                  <h3 class="fw-bold">{{ Str::limit($service['service'], 40) }}</h3>
                  <p>{{ Str::limit(strip_tags($service->description), 150) }}</p>
                  <a href="{{ url('service/' . Str::slug($service['service'])) }}" class="read-more-link">
                    Read More <i class="fa-solid fa-arrow-trend-up"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>




@endsection