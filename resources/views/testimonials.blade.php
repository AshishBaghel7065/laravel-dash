@extends('layouts.app')

@section('title', isset($seoPages[1]->title) ? $seoPages[1]->title : 'Default Title')
@section('meta_description', isset($seoPages[1]->meta_description) ? $seoPages[1]->meta_description : 'Default Description')
@section('meta_keywords', isset($seoPages[1]->meta_keywords) ? $seoPages[1]->meta_keywords : 'Default Keywords')
@section('meta_author', isset($seoPages[1]->author) ? $seoPages[1]->author : 'Default Author')

@section('content')

@include('components.breadcrumb', ['pageTitle' => 'About'])

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @php
                $testimonials = [
                    [
                        'video' => '/video/one.mp4',
                        'title' => 'Great Service!',
                        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
                    ],
                    [
                        'video' => '/video/two.mp4',
                        'title' => 'Amazing Experience',
                        'description' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
                    ],
                    [
                        'video' => '/video/three.mp4',
                        'title' => 'Highly Recommend',
                        'description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
                    ],
                    [
                        'video' => '/video/four.mp4',
                        'title' => 'Excellent Support',
                        'description' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                    ]
                ];
            @endphp

            @foreach($testimonials as $testimonial)
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-box p-3 border rounded shadow-sm h-100">
                    <div class="video-wrapper mb-3">
                        <iframe width="100%" height="250" style="object-fit:cover" src="{{ $testimonial['video'] }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <h5 class="testimonial-title">{{ $testimonial['title'] }}</h5>
                    <p class="testimonial-description">{{ $testimonial['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
