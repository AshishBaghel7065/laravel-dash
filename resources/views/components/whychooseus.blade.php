<section class="why-choose-us">
    <div class="why-choose-us-overlay"></div>
    <div class="why-choose-text">
      <div class="container">
        <h2>Why Choose Us</h2>
        <ul class="features-list">
          <li><strong>24x7 Availability</strong></li>
          <li><strong>Location & Connectivity</strong></li>
          <li>Our highly qualified doctors will guide you through the pregnancy time</li>
        </ul>
        <div class="cta-buttons">
          <button class="main-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 200px;" class="main-btn">Book an Appointment</button>
          <a href="/contact" style="width: 200px;"  class="main-btn">Enquire Now</a>    
        </div>
      </div>
    </div>
  </section>


  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Book an Appointment</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('contact.create') }}" method="POST">
            @csrf
            <input type="text" id="name" name="name" placeholder="Name" required maxlength="255"
              value="{{ old('name') }}">
            @error('name') <p style="color: red;">{{ $message }}</p> @enderror
      
            <input type="text" id="phone" name="phone" placeholder="Phone" required maxlength="20"
              value="{{ old('phone') }}">
            @error('phone') <p style="color: red;">{{ $message }}</p> @enderror
            <input type="email" id="email" placeholder="Email" name="email" required maxlength="255"
              value="{{ old('email') }}">
            @error('email') <p style="color: red;">{{ $message }}</p> @enderror
      
           <div class="row">
            <div class="col-lg-6">
              <input type="date" id="date_of_appointment" name="date_of_appointment" placeholder="Date of Appointment:"
              required value="{{ old('date_of_appointment') }}">
            @error('date_of_appointment') <p style="color: red;">{{ $message }}</p> @enderror
            </div>
            <div class="col-lg-6">
              <select id="service" name="service">
                <option value="" selected disabled>Select a service</option>
                @foreach($services->take(5) as $service)
                <option value="{{ Str::slug($service->service) }}" {{ old('service')==Str::slug($service->service) ?
                  'selected' : '' }}>
                  {{ $service->service }}
                </option>
                @endforeach
              </select>
              @error('service') <p style="color: red;">{{ $message }}</p> @enderror
            </div>
           </div>
      
      
          
      
            <textarea id="message" name="message" placeholder="Message" required>{{ old('message') }}</textarea>
            @error('message') <p style="color: red;">{{ $message }}</p> @enderror
      
      
      
      
            <div class="row">
              <div class="col-lg-12">
                <button type="submit" class="main-btn">Submit</button>
              </div>
            </div>
          </form>
        </div>
      
      </div>
    </div>
  </div>