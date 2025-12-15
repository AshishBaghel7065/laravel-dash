@extends('layouts.app')

@section('title', isset($seoPages[1]->title) ? $seoPages[1]->title : 'Default Title')
@section('meta_description', isset($seoPages[1]->meta_description) ? $seoPages[1]->meta_description : 'Default Description')
@section('meta_keywords', isset($seoPages[1]->meta_keywords) ? $seoPages[1]->meta_keywords : 'Default Keywords')
@section('meta_author', isset($seoPages[1]->author) ? $seoPages[1]->author : 'Default Author')

@section('content')

@include('components.breadcrumb', ['pageTitle' => 'Events'])



  <section>
    <div class="heading-section2">
        <h2>Our Top Events</h2>
        <div class="line">
            <div class="sm-line"></div>
        </div>
        <p>Best Child Specialist in Faridabad</p>
    </div>
 <div class="container">
    <div class="row">
        <div class="col-lg-9">
            @foreach($globalProducts as $product)

<div class="more-event-box">
    <div class="event-image">
        <img src="{{ asset( '/products/'.$product['product_image']) }}" alt="">

    </div>
    <div class="event-text">
        <h5>{{ $product['name'] }}</h5>
        <p class="product-description">
            {!! Str::limit(strip_tags($product->description), 470) !!}
        </p>
        
        
        <a href="{{ url('event/' . Str::slug($product['name'])) }}" class="main-btn">Explore</a>
    </div>
</div>
@endforeach

           
        </div>
        <div class="col-lg-3">

      <div class="sidebar shadow-none">
       
                <h3 >Services</h3>
                <ul class="m-0 p-0">
                    @foreach($services as $otherService)
                        <li class="recent-service">
                            <a href="{{ url('service/' . Str::slug($otherService->service)) }}">{{ $otherService->service }}</a>
                        </li>
                    @endforeach
                </ul>
                <h3 class="mt-5">Blogs</h3>
                <ul class="m-0 p-0">
                    @foreach($blogs as $blogs)
                        <li class="recent-blog">
                            <a href="{{ url('blog/' . Str::slug($blogs->title)) }}">{{ $blogs->title }}</a>
                        </li>
                    @endforeach
                </ul>
      </div>
        </div>
    </div>
 </div>
  </section>
  
  <style>
    .more-event-box{
        display: flex;
        flex-wrap: wrap;
        background-color: white;   
    padding: 15px;
    border-radius: 10px;
    margin-top: 20px;
    
    }
    .event-image {
        width: 40%;
        object-fit: contain;
    }
    .event-text{
        width: 60%;
        padding: 10px;
    }
    .event-image img {
        width: 100%;
        object-fit: contain;
        border-radius: 10px;
    }
  </style>

@endsection
