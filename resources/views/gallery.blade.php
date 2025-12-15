@extends('layouts.app')

@section('title', isset($seoPages[6]->title) ? $seoPages[6]->title : 'Default Title')
@section('meta_description', isset($seoPages[6]->meta_description) ? $seoPages[6]->meta_description : 'Default Description')
@section('meta_keywords', isset($seoPages[6]->meta_keywords) ? $seoPages[6]->meta_keywords : 'Default Keywords')
@section('meta_author', isset($seoPages[6]->author) ? $seoPages[6]->author : 'Default Author')

@section('content')

@include('components.breadcrumb', ['pageTitle' => 'Gallery'])


<!-- Second Gallery Section -->
<section class="gallery-section">
    <div class="container">
      <div class="heading-section text-center">
        <h3 class="heading-big">Our Gallery
        </h3>
        <h4 class="heading-small">Our Gallery</h4>
      </div>
  
        <div class="row">
            @foreach($galleries as $index => $image)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <img 
                    src="{{ asset('/gallery/' . $image->image) }}" 
                    class="img-fluid gallery-img-events" 
                    alt="Event Image {{ $index + 1 }}" 
                    data-index="{{ $index }}"
                    style="cursor: pointer; border-radius: 8px;"
                    onclick="openModal({{ $index }})"
                >
            </div>
            @endforeach
        </div>
    </div>
</section>
  
<!-- Modal for Events Gallery -->
<div id="eventsModal" class="modal-overlay" style="display: none;">
    <span class="close-modal-events" onclick="closeModal()">&times;</span>
    <img class="modal-content-img" id="eventsModalImage">
    <div class="modal-navigation">
        <button id="eventsPrevImage" onclick="changeImage(-1)">❮</button>
        <button id="eventsNextImage" onclick="changeImage(1)">❯</button>
    </div>
</div>

<script>
    let currentImageIndex = 0;
    const images = @json($galleries);  // This will allow you to access the gallery images in JS

    function openModal(index) {
        currentImageIndex = index;
        const modal = document.getElementById('eventsModal');
        const modalImage = document.getElementById('eventsModalImage');
        modal.style.display = 'block';
        modalImage.src = '/gallery/' + images[index].image; // Assuming the image object has a "image" property
    }

    function closeModal() {
        const modal = document.getElementById('eventsModal');
        modal.style.display = 'none';
    }

    function changeImage(direction) {
        currentImageIndex += direction;
        if (currentImageIndex < 0) {
            currentImageIndex = images.length - 1;
        } else if (currentImageIndex >= images.length) {
            currentImageIndex = 0;
        }
        const modalImage = document.getElementById('eventsModalImage');
        modalImage.src = '/gallery/' + images[currentImageIndex].image;
    }
</script>


@endsection
