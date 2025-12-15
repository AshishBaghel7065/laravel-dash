@extends('layouts.app')

@section('title', isset($seoPages[3]->title) ? $seoPages[3]->title : 'Default Title')
@section('meta_description', isset($seoPages[3]->meta_description) ? $seoPages[3]->meta_description : 'Default Description')
@section('meta_keywords', isset($seoPages[3]->meta_keywords) ? $seoPages[3]->meta_keywords : 'Default Keywords')
@section('meta_author', isset($seoPages[3]->author) ? $seoPages[3]->author : 'Default Author')

@section('content')

@include('components.breadcrumb', ['pageTitle' => 'Blogs'])

<section class="blog-section">
 <div class="heading-section text-center">
        <h3 class="heading-big">Our Blog
        </h3>
        <h4 class="heading-small">Our Blogs</h4>
      </div>
    <div class="container">
      <div class="row">
@foreach($blogs->reverse() as $blog)
        <div class="col-lg-4 col-md-6">
          <div class="blog-box">
            <div class="blog-image">
              <a href="{{ url('blog/' . $blog->slug) }}" class="read"> <img src="{{ asset('blogs/' . $blog->image) }}" alt="{{ $blog->title }}"></a>
            </div>
            <div class="blog-content my-2">
                <hr>
                 <div class="dated text-secondary">
                    <p><i class="fa-solid fa-shapes"></i> {{$blog->category}}</p>
                    <p><i class="fa-solid fa-calendar-days"></i>  {{ \Carbon\Carbon::parse($blog->publish)->format('d M Y') }}</p>
                </div>
                  <hr>
              <a href="{{ url('blog/' . $blog->slug) }}" class="text-decoration-none text-black">  <h5 class="mt-3">{{ $blog->title }}</h5></a>
              <p class="my-3 fs-6 text-secondary">{{ Str::words(strip_tags($blog->description), 20, '...') }}</p>        
            </div>
          </div>
        </div>
        @endforeach
      </div>

    </div>
  </section>

 
  @endsection