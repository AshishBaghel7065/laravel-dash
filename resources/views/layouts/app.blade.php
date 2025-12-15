<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
<title>@yield('title', 'Neurigo 360 - Best Neuro Physiotherapy Center in Noida')</title>
<link rel="icon" href="{{ asset('logo.png') }}">

<meta name="description" content="@yield('meta_description', 'Neurigo 360 offers expert physical therapy and neurological rehabilitation in Noida. Our evidence-based treatments help patients regain mobility, functionality, and independence.')">
<meta name="keywords" content="Neurological physiotherapy Centre in Noida, physical therapy Centre in Noida, neuro rehab Centre in Uttar Pradesh, mobility therapy, Neurigo 360">
<meta name="author" content="@yield('meta_author', 'Neurigo 360')">


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <style>
 .custom-dropdown:hover > .dropdown-menu {
    display: block;
    margin-top: 0;
  }

  .dropdown-menu {
    display: none;
    animation-duration: 0.5s;
  }

  .dropdown-item:hover {
    background-color: #f8f9fa;
  }

  .custom-dropdown:hover > .dropdown-menu {
    display: block;
    margin-top: 0;
  }

  .dropdown-menu {
    display: none;
    animation-duration: 0.5s;
  }
  
   .fixed-icon {
      position: fixed;
      bottom: 20px;
      width: 50px;
      height: 50px;
      background-color: #25D366;
      color: white;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 22px;
      z-index: 9999;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      cursor: pointer;
      transition: transform 0.3s;
    }

    .fixed-icon:hover {
      transform: scale(1.1);
    }

    .whatsapp {
      right: 20px;
    }

    .call {
      left: 20px;
      text-decoration: none;

    }
#loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #ffffff; /* change if needed */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 999999;
}
#loader img {
    width: 820px;
}

</style>



</head>
<body>
    
    <div id="loader">
    <img src="/logo.png" alt="Logo">
</div>
    
  <!-- Header Section -->
  <div class="main-header">
    <div class="main-header-container">
      <div class="top-bar">
        <div class="row">
          <div class="col-lg-4"></div>
          <div class="col-lg-8">
            <div class="top-bar-data">
              <div class="top-link">
                <ul class="contact-detail m-0 p-0 ">
                  <li><i class="fa-solid fa-phone"></i> +91 9719267177</li>
                         <li><i class="fa-solid fa-phone"></i> +91 9599083133</li>
                  <li><i class="fa-solid fa-envelope"></i> neurigo360@gmail.com</li>
                </ul>
                <ul class="social-link">
		<a href="https://www.facebook.com/profile.php?id=61565571999595" target="_blank" class="text-white"><i class="fab fa-facebook-f"></i></a>
								<a href="https://www.instagram.com/neurigo360_india/" target="_blank" class="text-white"><i class="fab fa-instagram"></i></a>
              <!--<button class="main-btn2" data-bs-toggle="modal" data-bs-target="#exampleModal">Take an Appointment</button>-->
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Navbar -->
      <nav class="navbar navbar-expand-lg one bg-white shadow-sm">
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('logo.png') }}" alt="Logo" class="main-logo1" />
            <img src="{{ asset('logo.png') }}" alt="Logo" class="main-logo" />
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
              </li>
              <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/about') }}">About Us</a>
              </li>
             
                
                 <li class="nav-item dropdown custom-dropdown">
  <a class="nav-link" href="/service">Therapy Tool <i class="fa-solid fa-caret-down"></i></a>
  <ul class="dropdown-menu animate__animated" id="dropdown1">
   @php
											// Filter services by category and sort alphabetically by service name
											$filtered = $services->where('category', 'service')
											->sortBy('service')
											->values();

											// Break into 3 equal-ish chunks for 3 columns
											$chunks = $filtered->chunk(ceil($filtered->count() / 3));
											@endphp

											@foreach($chunks as $chunk)


											@foreach($chunk as $service)

											<li><a class="dropdown-item  hover-link"
													href="{{ url('service/' . Str::slug($service->service)) }}">{{
													$service->service }}</a></li>


											@endforeach


											@endforeach
  </ul>
</li>

<li class="nav-item dropdown custom-dropdown">
  <a class="nav-link" href="#">Specialist In <i class="fa-solid fa-caret-down"></i></a>
  <ul class="dropdown-menu animate__animated" id="dropdown2">
@php
											// Filter services by category and sort alphabetically by service name
											$filtered = $services->where('category', 'specialist')
											->sortBy('service')
											->values();

											// Break into 3 equal-ish chunks for 3 columns
											$chunks = $filtered->chunk(ceil($filtered->count() / 3));
											@endphp

											@foreach($chunks as $chunk)


											@foreach($chunk as $service)

											<li><a class="dropdown-item  hover-link"
													href="{{ url('service/' . Str::slug($service->service)) }}">{{
													$service->service }}</a></li>


											@endforeach


											@endforeach
  </ul>
</li>

 <li class="nav-item {{ request()->is('pediatric') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/pediatric') }}">Pediatric Physiotherapy</a>
              </li>
<li class="nav-item dropdown custom-dropdown">


  <a class="nav-link" href="#">Resources <i class="fa-solid fa-caret-down"></i></a>
  <ul class="dropdown-menu animate__animated" id="dropdown3">
    <li><a class="dropdown-item" href="/faq">FAQs</a></li>
    <li><a class="dropdown-item" href="/captured-movement">Gallery</a></li>
        <li><a class="dropdown-item" href="/testimonials">Testimonials</a></li>
        <li><a class="dropdown-item" href="/blog">Blogs</a></li>
  </ul>
</li>


       
              <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/contact') }}">Contact Us</a>
              </li>
                <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
<button class="main-btn2 py-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Appointment</button>
              </li>
             
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>

  <!-- Secondary Navbar -->
  <div class="second-header">
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
      <div class="container-fluid d-flex align-items-center justify-content-between">
        <a class="navbar-brand" href="{{ url('/') }}">
          <img src="{{ asset('logo.png') }}" alt="Logo" class="header2-logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent2">
          <ul class="navbar-nav">
            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/about') }}">About Us</a>
            </li>
           <li class="nav-item dropdown custom-dropdown">
  <a class="nav-link" href="/service">Therapy Tool  <i class="fa-solid fa-caret-down"></i></a>
  <ul class="dropdown-menu animate__animated" id="dropdown1">
@php
											// Filter services by category and sort alphabetically by service name
											$filtered = $services->where('category', 'service')
											->sortBy('service')
											->values();

											// Break into 3 equal-ish chunks for 3 columns
											$chunks = $filtered->chunk(ceil($filtered->count() / 3));
											@endphp

											@foreach($chunks as $chunk)


											@foreach($chunk as $service)

											<li><a class="dropdown-item hover-link"
													href="{{ url('service/' . Str::slug($service->service)) }}">{{
													$service->service }}</a></li>


											@endforeach


											@endforeach
  </ul>
</li>

<li class="nav-item dropdown custom-dropdown">
  <a class="nav-link" href="#">Specialist In <i class="fa-solid fa-caret-down"></i></a>
  <ul class="dropdown-menu animate__animated" id="dropdown2">
@php
											// Filter services by category and sort alphabetically by service name
											$filtered = $services->where('category', 'specialist')
											->sortBy('service')
											->values();

											// Break into 3 equal-ish chunks for 3 columns
											$chunks = $filtered->chunk(ceil($filtered->count() / 3));
											@endphp

											@foreach($chunks as $chunk)


											@foreach($chunk as $service)

											<li><a class="dropdown-item  hover-link"
													href="{{ url('service/' . Str::slug($service->service)) }}">{{
													$service->service }}</a></li>


											@endforeach


											@endforeach
  </ul>
</li>
 <li class="nav-item {{ request()->is('blog') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/blog') }}">Pediatric Physiotherapy</a>
              </li>
<li class="nav-item dropdown custom-dropdown">
  <a class="nav-link" href="#">Resources <i class="fa-solid fa-caret-down"></i></a>
  <ul class="dropdown-menu animate__animated" id="dropdown3">
    <li><a class="dropdown-item" href="/faq">FAQs</a></li>
    <li><a class="dropdown-item" href="/captured-movement">Gallery</a></li>
      <li><a class="dropdown-item" href="/blog">Blogs</a></li>
        <li><a class="dropdown-item" href="/testimonials">Testimonials</a></li>
  </ul>
</li>  

     
            <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
              <a class="nav-link" href="{{ url('/contact') }}">Contact Us</a>
            </li>
          </ul>
        </div>
        <div class="btn-box">
          <button class="main-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Take an Appointment</button>
         
        </div>
      </div>
    </nav>
  </div>







<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">   <h3>Contact Us</h3></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="contact-form">
                     
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
                                        @foreach($services as $service)
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

                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="btnn w-100">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
      </div>
    
    </div>
  </div>
</div>



  <!-- Main Content -->
  <main>
    @yield('content')
  </main>
<!-- Footer -->
<footer>
  <div class="footer-overlay"></div>

  <div class="footer-data">
    <div class="container">
        <div class="row mt-4">
        <div class="col-lg-3">
         <div class="logo">
          <img src="/logo.png" alt="">
         </div>
          
         <p class="my-4">At Neurigo 360, we are dedicated to providing exceptional physical therapy and rehabilitation services to patients with neurological disorders and mobility challenges in Noida, Uttar Pradesh. </p>
        </div>

        <div class="col-lg-3">
          <h3>Quick Links</h3>
          <div class="footer-link">
            <ul class="m-0 p-0">
              <li><a href="/"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
</svg> Home</a></li>
              <li><a href="/about"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
</svg> About</a></li>
              <li><a href="/service"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
</svg> Service</a></li>
              <li><a href="/blog"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
</svg> Blogs</a></li>
              <li><a href="/"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
</svg> Review's</a></li>
              <li><a href="/contact"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
</svg> Contact</a></li>
            </ul>
            <ul class="m-0 p-0">
              <li><a href="/faq"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
</svg> FAQ</a></li>
              <li><a href="/"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
</svg> Support</a></li>
              <li><a href="/"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
</svg> Our Doctor's </a></li>
              <li><a href="/testimonials"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
</svg> Testimonials</a></li>

           
            </ul>
          </div>
        </div>

        <div class="col-lg-3">
          <h3>Clinic Timing</h3>
          <ul class="list-unstyled clinic-timings">
            <li><span>Monday</span><span>8:00 am - 7:30 pm</span></li>
            <li><span>Tuesday</span><span>8:00 am - 7:30 pm</span></li>
            <li><span>Wednesday</span><span>8:00 am - 7:30 pm</span></li>
            <li><span>Thursday</span><span>8:00 am - 7:30 pm</span></li>
            <li><span>Friday</span><span>8:00 am - 7:30 pm</span></li>
            <li><span>Saturday</span><span>8:00 am - 2:00 pm</span></li>
            <li><span>Sunday</span><span>Closed</span></li>
          </ul>
        </div>

        <div class="col-lg-3">
          <h3>Contact Info</h3>
        <div class="footer-contact-box">
						<div class="contact-row">
							<span class="contact-label">Phone:</span>
							<span class="contact-value">+91 9719267177</span>
						</div>
						<div class="contact-row">
							<span class="contact-label">Phone:</span>
							<span class="contact-value">+91 9599083133</span>
						</div>
						<div class="contact-row">
							<span class="contact-label">Email:</span>
							<span class="contact-value">neurigo360@gmail.com</span>
						</div>
						<div class="contact-row">
							<span class="contact-label">Address:</span>
							<span class="contact-value">P-2 , 241-44 ,Tower-OAK Paramount golfforest Zeta-1 Gr.Noida 201308 </span>
						</div>
					</div>
        </div>
      </div>
    <div class="row mt-3">
      <div class="col-lg-8">
          <div class="footer-service-box">
        <ul class="m-0 p-0">
          <h3>Our Service</h3>
       <div class="row">
           @foreach($services->take(20) as $otherService)
           <div class="col-lg-6">
             <li class="">
              <a href="{{ url('service/' . Str::slug($otherService->service)) }}">{{ $otherService->service }}</a>
            </li>
           </div>
          @endforeach
       </div>
        </ul>
      </div>
      </div>
       <div class="col-lg-4">
        
          <div class="footer-blog-box-main">
              <h3>Our Blogs</h3>
         @foreach($blogs->take(5) as $blog)
        <div class="col-lg-12">
          <div class="footer-blog-box">
            <div class="footer-blog-image">
                <a href="{{ url('blog/' . $blog->slug) }}" class="read"> <img src="{{ asset('blogs/' . $blog->image) }}" alt="{{ $blog->title }}"></a>
            </div>
            <div class="blog-content my-2">
               
               <a href="{{ url('blog/' . $blog->slug) }}" class="text-decoration-none text-black">
  <h6>{{ \Illuminate\Support\Str::limit($blog->title, 30) }}</h6>
</a>

                <hr>
                <div class="fdated">
                    <p><i class="fa-solid fa-shapes"></i> Day</p>
                    <p><i class="fa-solid fa-calendar-days"></i> {{ \Carbon\Carbon::parse($blog->created_at)->format('d/m/Y') }}</p>
                </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      </div>
    </div>

    
    </div>
   
    <div class="container">
       <hr>
     <div class="copy-right">
       <div class="row">
      <div class="col-lg-9">
         <p>
                    Copyrights 2025. All Rights Reserved for Neurigo360
                    <a
                      href="https://promotionadda.org/"
                      target="_blank"
                      rel="noopener noreferrer"
                      
                    >
                    
                    </a>
                  </p>
      </div>
      <div class="col-lg-3">
         <div class="footer-social-icons mt-2">
								<a href="https://www.facebook.com/profile.php?id=61565571999595" target="_blank"><i class="fab fa-facebook-f"></i></a>
								<a href="https://www.instagram.com/neurigo360_india/" target="_blank" ><i class="fab fa-instagram"></i></a>
						
							  </div>
      </div>
    </div>
     </div>
    </div>
  </div>
</footer>

<!-- Call Icon -->
  <a href="tel:+9197192671177" class="fixed-icon call">
    <i class="fas fa-phone"></i>
  </a>

  <!-- WhatsApp Icon -->
  <a href="https://wa.me/9197192671177" target="_blank" class="fixed-icon whatsapp">
    <i class="fab fa-whatsapp"></i>
  </a>



  <!-- JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" crossorigin="anonymous"></script>
<script>
  window.addEventListener("scroll", function () {
    const mainHeader = document.querySelector(".main-header");
    const secondHeader = document.querySelector(".second-header");
    const scrollY = window.scrollY;

    if (scrollY <= 100) {
      // At the top of the page
      mainHeader.classList.remove("hidden");
      secondHeader.classList.remove("visible");
    } else {
      // After scrolling down
      mainHeader.classList.add("hidden");
      secondHeader.classList.add("visible");
    }
  });
</script>
<script>
  const dropdowns = document.querySelectorAll('.custom-dropdown');

  dropdowns.forEach(dropdown => {
    const menu = dropdown.querySelector('.dropdown-menu');

    dropdown.addEventListener('mouseenter', () => {
      menu.classList.remove('animate__fadeOutDown');
      menu.classList.add('animate__fadeInUp');
    });

    dropdown.addEventListener('mouseleave', () => {
      menu.classList.remove('animate__fadeInUp');
      menu.classList.add('animate__fadeOutDown');
    });
  });
</script>
<script>
    window.onload = function () {
        setTimeout(() => {
            document.getElementById("loader").style.display = "none";
        }, 1000); // 4000 ms = 4 seconds
    };
</script>

</body>
</html>
