<section class="blog-section">
 <div class="heading-section text-center">
        <h3 class="heading-big">Our Blog
        </h3>
        <h4 class="heading-small">Our Blogs</h4>
      </div>
    <div class="container">
      <div class="row">
        @foreach($blogs->take(3) as $blog)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="blog-box">
            <div class="blog-image">
              <a href="{{ url('blog/' . $blog->slug) }}" class="read"> <img src="{{ asset('blogs/' . $blog->image) }}" alt="{{ $blog->title }}"></a>
            </div>
            <div class="blog-content">
                <hr>
                 <div class="dated text-secondary">
                    <p><i class="fa-solid fa-shapes"></i> {{$blog->category}}</p>
                    <p><i class="fa-solid fa-calendar-days"></i> {{ \Carbon\Carbon::parse($blog->created_at)->format('d/m/Y') }}</p>
                </div>
                  <hr>
              <a href="{{ url('blog/' . $blog->slug) }}" class="text-decoration-none text-black">  <h5 class="mt-3">{{ $blog->title }}</h5></a>
              <p class="my-3 fs-6 text-secondary">{{ Str::words(strip_tags($blog->description), 20, '...') }}</p>
  <a href="{{ url('blog/' . $blog->slug) }}" class="text-decoration-none text-black">  <button class="main-btn">Read More</button></a>
            
            
              
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="my-3 text-center">
        <a href="/blog"><button class="main-btn">Explore More Blogs</button></a>
      </div>
    </div>
  </section>

 