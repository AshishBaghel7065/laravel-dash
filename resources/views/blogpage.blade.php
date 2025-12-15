@extends('layouts.app')

@section('title', $blog->meta_keywords)
@section('meta_description', $blog->meta_description)
@section('meta_keywords',  $blog->meta_tags)
@section('meta_author', 'NeuriGo360')

@section('content')

@include('components.breadcrumb', ['pageTitle' => $blog->title])

<style>
   
</style>

<section>
  
   <div class="container">

    <div class="service-detail-container" >
    <div class="service-header">
      
        <div class="service-contents">
            <img src="{{ asset('blogs/' . $blog->image) }}" alt="{{ $blog->title }}" class="service-page-image">
 <div class=" my-3 fw-bold mx-3">
    <p>
        <span>Date: {{ \Carbon\Carbon::parse($blog->publish)->format('d M Y') }}</span> 
        | 
        Category : {{ $blog->category }}
    </p>
 </div>
            <h1 class="my-3">{{ $blog->title }}</h1>
            <p class="my-3">{!! $blog->description !!}</p>
        </div>
    </div>

    <div class="sidebar">

        <h3 >Other Blogs</h3>
        <ul class="m-0 p-0">
            @foreach($blogs as $blogs)
                <li class="recent-blog">
                    <a  href="{{ url('blog/' . $blogs->slug) }}">{{ $blogs->title }}</a>
                </li>
            @endforeach
        </ul>
                <h3 class="mt-5">Services</h3>
                <ul class="m-0 p-0">
                    @foreach($services as $otherService)
                        <li class="recent-service">
                            <a href="{{ url('service/' . Str::slug($otherService->service)) }}">{{ $otherService->service }}</a>
                        </li>
                    @endforeach
                </ul>
       

       
    </div>
    
</div>
   </div>
   
</section>



@endsection
