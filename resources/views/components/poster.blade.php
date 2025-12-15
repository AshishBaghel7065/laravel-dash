<section class="hero-section">

    <div class="container">
      <div class="row">
        <div class="col-lg-7">

<div class="hero-data">
  <h1  class="top-heading chrome ubuntu-regular ">Transforming Lives with Expert Care at Neurigo360</h1>
  <p>At Neurigo 360, we provide comprehensive neurological rehabilitation, utilizing cutting-edge technology and tailored treatment plans. Our compassionate team delivers expert care, ensuring personalized support to enhance mobility and improve quality of life for every patient.</p>
<div class="btn-container">
  <!-- Call Button -->
  <a href="tel:+919599083133" class="white-btn">
    <i class="fa-solid fa-phone"></i> Call Us: +91 9599083133
  </a>

  <!-- WhatsApp Button -->
  <a href="https://wa.me/919719267177" target="_blank" class="whatsapp">
    <i class="fa-brands fa-whatsapp"></i>
    <span>Chat with Our Team</span>
  </a>
</div>
</div>

        </div>
        <div class="col-lg-1"></div>
     
        <div class="col-lg-4">
         <div class="appointment-form">
          <form action="{{ route('contact.create') }}" method="POST">
            @csrf
          
            <input type="text" id="name" name="name" placeholder="Name" required maxlength="255" value="{{ old('name') }}">
            @error('name') <p style="color: red;">{{ $message }}</p> @enderror

            <input type="text" id="phone" name="phone" placeholder="Phone" required maxlength="20" value="{{ old('phone') }}">
            @error('phone') <p style="color: red;">{{ $message }}</p> @enderror

            <input type="email" id="email" name="email" placeholder="Email" required maxlength="255" value="{{ old('email') }}">
            @error('email') <p style="color: red;">{{ $message }}</p> @enderror

            
                 
       
                    <div class="date-input-wrapper w-100">
                      <input type="date" id="date_of_appointment" name="date_of_appointment" required value="{{ old('date_of_appointment') }}">
                      <span class="custom-calendar-icon mt-2"><i class="fa-solid fa-calendar"></i></span> <!-- Or use an SVG/icon here -->
                    </div>
                    @error('date_of_appointment') <p style="color: red;">{{ $message }}</p> @enderror


                    <select id="service" name="service" required>
                        <option value="" selected disabled>Select a service</option>
                        @foreach($services as $service)
                            <option value="{{ Str::slug($service->service) }}" 
                                {{ old('service') == Str::slug($service->service) ? 'selected' : '' }}>
                                {{ $service->service }}
                            </option>
                        @endforeach
                    </select>
                    @error('service') <p style="color: red;">{{ $message }}</p> @enderror
            

            <textarea id="message" name="message" placeholder="Message" required>{{ old('message') }}</textarea>
            @error('message') <p style="color: red;">{{ $message }}</p> @enderror

            <div class="row mt-3">
                <div class="col-lg-12">
                    <button type="submit" class="submit-btn">Book an Appointment</button>
                </div>
            </div>
        </form>
         </div>
        </div>
      </div>
    </div>
  
</section>
