<section class="service-container">
  <div class="service-main-overlay2"></div>
  <div class="heading-section text-center">
    <h3 class="heading-big">Our Services</h3>
    <h4 class="heading-small">Our Services</h4>
  </div>
  <div class="container">
    <div class="testimonials">
      <div class="row">
        @foreach($services->take(4) as $service)
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

  <div class="text-center my-5">
    <a href="/service" class="main-btn text-decoration-none">Explore All Services</a>
  </div>
</section>
