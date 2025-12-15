<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

<section class="review-section">
    <div class="why-choose-text3">
 <div class="heading-section text-center">
        <h3 class="heading-big3">Review's 
        </h3>
        <h4 class="heading-small3">Review's </h4>
      </div>
    <div class="container">
      <div class="owl-carousel review-carousel">
        @foreach($reviews as $review)
        <div class="review-box">
            <div class="review">
                <div class="user-info">
                    <div>
                        
                        <img src="{{ 'reviews/'.$review['user_image'] }}" alt="User Image" class="user-image">
                    </div>
                    <div>
                        <h4>{{ $review['username'] }}</h4>
                     <span class="review-date">{{ \Carbon\Carbon::parse($review['posted_date'])->diffForHumans() }}</span>
                        <div class="review-rating">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $review['stars'])
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
                <p class="review-text">{{ $review['review'] }}</p>
            </div>
        </div>
        @endforeach
      </div>
   
  </div>
  <div class="text-center mt-5">
    <a href="https://maps.app.goo.gl/ASFLMGYFqGS4gjL9A" target="_blank" class="white-unfill-btn">Explore All Review</a>
 </div>
    </div>
</section>

<!-- jQuery (must be included before Owl Carousel) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
$(document).ready(function(){
  $('.review-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: false,
    center: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    responsive:{
      0: { items: 1 },
      600: { items: 1 },
      1000: { items: 3 }
    }
  });
});
</script>
