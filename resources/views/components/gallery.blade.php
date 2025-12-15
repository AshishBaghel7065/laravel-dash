<!-- Gallery Section -->
<section class="gallery-section ">

    <div class="container">
     <div class="heading-section2">
        <h2 class=" fw-bold">Gallery
        </h2>
        <div class="line">
            <div class="sm-line"></div>
        </div>
        <p>Best Child Specialist in Faridabad</p>
    </div>
      <div class="row">
        @foreach($galleries->take(8) as $index => $image)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
          <img 
            src="{{ asset('/gallery/' . $image->image) }}" 
            class="img-fluid gallery-img" 
            alt="Gallery Image {{ $index + 1 }}" 
            data-index="{{ $index }}"
            style="cursor: pointer; border-radius: 8px;"
          >
        </div>
        @endforeach
      </div>
    </div>
    <div class="text-center my-5">
        <a href="/captured-movement" class="main-btn">Explore All Photos</a>
     </div>
  </section>
  
  <!-- Modal Viewer -->
  <div id="imageModal" class="modal-overlay" style="display: none;">
    <span class="close-modal">&times;</span>
    <img class="modal-content-img" id="modalImage">
    <div class="modal-navigation">
      <button id="prevImage">❮</button>
      <button id="nextImage">❯</button>
    </div>
  </div>
  
 
  <script>
  let images = [];
  @foreach($galleries as $image)
    images.push("{{ asset('/gallery/' . $image->image) }}");
  @endforeach
  
  let currentIndex = 0;
  
  $(document).ready(function() {
    $('.gallery-img').on('click', function() {
      currentIndex = parseInt($(this).data('index'));
      $('#modalImage').attr('src', images[currentIndex]);
      $('#imageModal').fadeIn();
    });
  
    $('.close-modal').on('click', function() {
      $('#imageModal').fadeOut();
    });
  
    $('#nextImage').on('click', function() {
      currentIndex = (currentIndex + 1) % images.length;
      $('#modalImage').attr('src', images[currentIndex]);
    });
  
    $('#prevImage').on('click', function() {
      currentIndex = (currentIndex - 1 + images.length) % images.length;
      $('#modalImage').attr('src', images[currentIndex]);
    });
  
    $(document).on('keydown', function(e) {
      if ($('#imageModal').is(':visible')) {
        if (e.key === 'ArrowRight') $('#nextImage').click();
        if (e.key === 'ArrowLeft') $('#prevImage').click();
        if (e.key === 'Escape') $('.close-modal').click();
      }
    });
  });
  </script>
  