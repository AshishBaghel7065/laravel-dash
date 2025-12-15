<section class="cennect">
    <div class="why-choose-us-overlay2"></div>
    <div class="why-choose-text2">
      <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8">
                <h5 class="text-start mb-4">Faq (Frequently Asked Questions)</h5>

                <div class="accordion accordion-flush" id="faqAccordion">
                    @foreach($faqs as $index => $faq)
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="heading{{ $index }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                          {{ $faq['question'] }}
                        </button>
                      </h2>
                      <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                          {!! $faq['answer'] !!}
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
            </div>
            <div class="col-lg-6 col-md-8">
                <form action="{{ route('contact.create') }}" method="POST" class="connect-form">
                    <h5>Get an Appointment</h5>
        
                    @csrf
                    <input type="text" id="name" name="name" placeholder="Name" required maxlength="255" value="{{ old('name') }}">
                    @error('name') <p style="color: red;">{{ $message }}</p> @enderror
        
                <div class="row">
                <div class="col-lg-6">
                    <input type="text" id="phone" name="phone" placeholder="Phone" required maxlength="20" value="{{ old('phone') }}">
                    @error('phone') <p style="color: red;">{{ $message }}</p> @enderror
                </div>
                   <div class="col-lg-6">
                    <input type="email" id="email" placeholder="Email" name="email" required maxlength="255" value="{{ old('email') }}">
                    @error('email') <p style="color: red;">{{ $message }}</p> @enderror
                   </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-5">
                        <input type="date" id="date_of_appointment" name="date_of_appointment" placeholder="Date of Appointment:" required value="{{ old('date_of_appointment') }}">
                        @error('date_of_appointment') <p style="color: red;">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-lg-7">
                        <select id="service" name="service">
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
        
                   <div class="row my-3">
                    <div class="col-lg-12">
                        <button type="submit" class="main-btn">Submit</button>
                    </div>
                   </div>
                </form>
                <h4 class="my-5">  Why Choose Us for Your Child's Health?</h4>
                <section class="features-container">
               
                  <div class="feature-box">
                    <div class="feature-icon">
                      <i class="fas fa-shield-heart"></i>
                    </div>
                    <div class="feature-title">Comprehensive Care</div>
                  
                  </div>
                
                  <div class="feature-box">
                    <div class="feature-icon">
                      <i class="fas fa-stethoscope"></i>
                    </div>
                    <div class="feature-title">Personalized Attention</div>
                   
                  </div>
                
                  <div class="feature-box">
                    <div class="feature-icon">
                      <i class="fas fa-baby"></i>
                    </div>
                    <div class="feature-title">Newborn Expertise</div>
                   
                  </div>
                
                  <div class="feature-box">
                    <div class="feature-icon">
                      <i class="fas fa-heartbeat"></i>
                    </div>
                    <div class="feature-title">Compassionate Support</div>
                   
                  </div>
                </section>
            </div>
           
        </div>
      </div>
    </div>
  </section>
