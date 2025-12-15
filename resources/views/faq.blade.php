@extends('layouts.app')

@section('title', isset($seoPages[5]->title) ? $seoPages[5]->title : 'Default Title')
@section('meta_description', isset($seoPages[5]->meta_description) ? $seoPages[5]->meta_description : 'Default Description')
@section('meta_keywords', isset($seoPages[5]->meta_keywords) ? $seoPages[5]->meta_keywords : 'Default Keywords')
@section('meta_author', isset($seoPages[5]->author) ? $seoPages[5]->author : 'Default Author')

@section('content')

@include('components.breadcrumb', ['pageTitle' => 'Events'])


@php
  $limitedFaqs = $faqs->toArray(); // Take only the first 8 FAQs
  $faqChunks = array_chunk($limitedFaqs, ceil(count($limitedFaqs) / 2)); // Split into 2 columns
@endphp

<section class="faq-section">
  <div class="connect-data">
    <div class="heading-section text-center">
      <h3 class="heading-big">FAQ's</h3>
      <h4 class="heading-small">FAQ's</h4>
    </div>
    <div class="container">
      <div class="row align-items-start">
        @foreach($faqChunks as $chunk)
          <div class="col-lg-6">
            @foreach($chunk as $faq)
              <div class="faq-box mb-4">
                <h5 class="faq-question">{{ $faq['question'] }}</h5>
                <div class="faq-answer">
                  {!! $faq['answer'] !!}
                </div>
              </div>
            @endforeach
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

@endsection
