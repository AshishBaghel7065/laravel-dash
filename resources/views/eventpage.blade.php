@extends('layouts.app')

{{-- @section('title', $prod->service)
@section('meta_description', Str::limit(strip_tags($service->description), 160))
@section('meta_keywords', 'services, Laravel, technology, web development, business')
@section('meta_author', 'John Doe') --}}

@section('content')

@include('components.breadcrumb', ['pageTitle' => $product->name])

<style>
   
</style>

<section>
  
   <div class="container">

    <div class="service-detail-container" >
    <div class="service-header shadow-none">
      
        <div class="service-contents">
            <img src="{{ asset('/products/' . $product->product_image) }}" alt="{{ $product->service }}" class="service-page-image">        
            <h1 class="my-3">{{ $product->name }}</h1>
            <p class="my-3">{!! $product->description !!}</p>
        </div>
    </div>

    <div class="sidebar">
        <h3>Other Services</h3>
        <ul class="m-0 p-0">
            @foreach($services as $otherService)
                <li class="recent-service">
                    <a href="{{ url('service/' . Str::slug($otherService->service)) }}">{{ $otherService->service }}</a>
                </li>
            @endforeach
        </ul>
        <h3 class="mt-5">Other Services</h3>

        <ul class="m-0 p-0">
            @foreach($blogs as $otherblog)
                <li class="recent-blog">
                    <a href="{{ url('blog/' . Str::slug($otherblog->title)) }}">{{ $otherblog->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    
</div>
   </div>
   
</section>



@endsection
