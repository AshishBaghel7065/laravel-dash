<section class="connect-section">
    <div class="connect-overlay"></div>
     <div class="connect-data">
       <div class="container">
        <div class="row">
          
            <div class="col-lg-6">
                 <h3 class="text-white text-start  fw-bold">Take an Appointment</h3>
                <form action="{{ route('contact.create') }}" method="POST">
                    @csrf
                  
                    <input type="text" id="name" name="name" placeholder="Name" required maxlength="255" value="{{ old('name') }}">
                    @error('name') <p style="color: red;">{{ $message }}</p> @enderror

                    <input type="text" id="phone" name="phone" placeholder="Phone" required maxlength="20" value="{{ old('phone') }}">
                    @error('phone') <p style="color: red;">{{ $message }}</p> @enderror

                    <input type="email" id="email" name="email" placeholder="Email" required maxlength="255" value="{{ old('email') }}">
                    @error('email') <p style="color: red;">{{ $message }}</p> @enderror

                    <div class="row">
                        <div class="col-lg-6">
                            <input type="date" id="date_of_appointment" name="date_of_appointment" required value="{{ old('date_of_appointment') }}">
                            @error('date_of_appointment') <p style="color: red;">{{ $message }}</p> @enderror
                        </div>
                        <div class="col-lg-6">
                            <select id="service" name="service" required>
                                <option value="" selected disabled>Select a service</option>
                                @foreach($services->take(5) as $service)
                                    <option value="{{ Str::slug($service->service) }}" 
                                        {{ old('service') == Str::slug($service->service) ? 'selected' : '' }}>
                                        {{ $service->service }}
                                    </option>
                                @endforeach
                            </select>
                            @error('service') <p style="color: red;">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <textarea id="message" name="message" placeholder="Message" required>{{ old('message') }}</textarea>
                    @error('message') <p style="color: red;">{{ $message }}</p> @enderror

                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <button type="submit" class="main-btn w-100">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <h3 class="text-white text-start  fw-bold">Gallery</h3>
                <div class="gallery-section">
                    @foreach($galleries->take(9) as $gallery)
                        <div class="gallery-image-box">
                            <img src="{{ asset('gallery/' . $gallery->image) }}" alt="Gallery Image" class="gallery-img" data-index="{{ $loop->index }}" />
                        </div>
                    @endforeach
                </div>
                <div class="text-center my-3">
                    <a href="/" class="main-btn">Get All Images</a>
                </div>
            </div>
            
          
            
        </div>
       </div>
   
     </div>
</section>
  <!-- Fullscreen slider container -->
  <div id="fullscreen-slider">
    <span class="close-btn">&times;</span>
    <span class="prev-btn">&#10094;</span>
    <img id="slider-img" src="" alt="Slider Image">
    <span class="next-btn">&#10095;</span>
</div>

  <script>
    $(function () {
        let currentIndex = 0;
        const imageUrls = [];

        $('.gallery-img').each(function () {
            imageUrls.push($(this).attr('src'));
        });

        $('.gallery-img').on('click', function () {
            currentIndex = parseInt($(this).data('index'));
            $('#slider-img').attr('src', imageUrls[currentIndex]);
            $('#fullscreen-slider').fadeIn();
        });

        $('.close-btn').on('click', function () {
            $('#fullscreen-slider').fadeOut();
        });

        $('.next-btn').on('click', function () {
            currentIndex = (currentIndex + 1) % imageUrls.length;
            $('#slider-img').attr('src', imageUrls[currentIndex]);
        });

        $('.prev-btn').on('click', function () {
            currentIndex = (currentIndex - 1 + imageUrls.length) % imageUrls.length;
            $('#slider-img').attr('src', imageUrls[currentIndex]);
        });
    });
</script>
