@extends('layouts.app')

@section('title', isset($seoPages[5]->title) ? $seoPages[5]->title : 'Default Title')
@section('meta_description', isset($seoPages[5]->meta_description) ? $seoPages[5]->meta_description : 'Default Description')
@section('meta_keywords', isset($seoPages[5]->meta_keywords) ? $seoPages[5]->meta_keywords : 'Default Keywords')
@section('meta_author', isset($seoPages[5]->author) ? $seoPages[5]->author : 'Default Author')

@section('content')

@include('components.breadcrumb', ['pageTitle' => 'Pediatric'])

 <style>
    /* Minimal styles — remove if using your own CSS */
    .pediatric-section{
        padding: 40px 0px;
    }
    .service-section {
    
      margin: 2rem auto;
      padding: 1.5rem;
      color: #1f2937;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(31,41,55,0.06);
      line-height: 1.6;
    }
    .service-header {
      display: flex;
      align-items: flex-start;
      gap: 1rem;
    }
    .service-header h1 {
      margin: 0;
      font-size: 1.6rem;
      color: #0f172a;
    }
    .badge-list {
      margin-left: auto;
      display:flex;
      gap: .5rem;
      align-items:center;
      flex-wrap:wrap;
    }
    .badge {
      display:inline-block;
      padding:.25rem .5rem;
      border-radius:999px;
      background:#eef2ff;
      color:#3730a3;
      font-size:.8rem;
      border:1px solid rgba(99,102,241,0.08);
    }
    .lead { margin-top: .75rem; margin-bottom: 1rem; font-weight: 500;}
    .small-note {  color:#374151; }
    .sources { margin-top:1rem; font-size:.9rem; color:#6b7280; }
    .cta {
      margin-top:1.25rem;
    }
    .btn {
      display:inline-block;
      padding:.6rem .9rem;
      background:#0f172a;
      color:white;
      border-radius:8px;
      text-decoration:none;
      font-weight:600;
    }
    @media (max-width:600px){
      .service-section { padding:1rem; margin:1rem; }
      .service-header { flex-direction: column; align-items:flex-start; }
      .badge-list { margin-left:0; }
    }
    .clr2{
        color: #ED3237;
    }
  </style>

<section class="pediatric-section">


<div class="container">
        <h1 class="text-center">Pediatric Physiotherapy at <span class="clr2">Neurigo360</span></h1>
      <div class="row my-5 justify-content-center">
          <div class="col-lg-6">
       

  <h2 >What is Pediatric Physiotherapy?</h2>

  <p class="small-note">
    Pediatric physiotherapy is a specialized branch of physiotherapy focusing on infants, children and adolescents. It involves assessment, diagnosis, and therapeutic care to support children with developmental, neurological, musculoskeletal or respiratory difficulties — helping them improve motor skills, mobility, strength, posture, coordination and overall functional independence.
  </p>

  <p class="small-note">
    At <strong>Neurigo360</strong>, we believe in a <em>child-centered, playful and family-involved</em> approach — making therapy engaging for children, and empowering parents/caregivers to support progress at home.
  </p>



  <div class="cta" role="navigation" aria-label="Call to action">
    <a class="btn" href="/contact" title="Book pediatric physiotherapy at Neurigo360">Book an Appointment</a>
  </div>

          </div>
            <div class="col-lg-4">
             <img src="/image/pet.jpg" alt="Pediatric-Physiotherapy" class="w-100">
          </div>
      </div>
</div>

</section>
<section class="benefits-section container">
  <style>
    .benefits-section {
      max-width: 1300px;
      margin: 40px auto;
      padding: 20px;
      font-family: "Segoe UI", Arial, sans-serif;
    }

    .benefits-title {
      text-align: center;
      font-size: 2rem;
      color: #ed3237;
      font-weight: 700;
      margin-bottom: 25px;
    }

    .benefits-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
    }

    .benefit-card {
      background: #ffffff;
      border: 2px solid #ed3237;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.08);
      transition: all .3s ease;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .benefit-card:hover {
      background: #ed3237;
      color: #fff;
      transform: translateY(-5px);
    }

    .benefit-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 15px;
      border: 2px solid #ed3237;
    }

    .benefit-title {
      font-size: 1.2rem;
      font-weight: 700;
      margin-bottom: 8px;
      color: #ed3237;
    }

    .benefit-card:hover .benefit-title {
      color: #fff;
    }

    .benefit-text {
      font-size: 0.95rem;
      line-height: 1.5;
      color: #444;
    }

    .benefit-card:hover .benefit-text {
      color: #ffecec;
    }
  </style>

  <h2 class="benefits-title">Benefits of Pediatric Physiotherapy</h2>

  <div class="benefits-grid ">

    <!-- Card 1 -->
    <div class="benefit-card">
      <img src="img-src" alt="Early Intervention">
      <h3 class="benefit-title">Early Intervention</h3>
      <p class="benefit-text">
        Early physiotherapy helps identify and address developmental delays or physical challenges in children, improving long-term outcomes.
      </p>
    </div>

    <!-- Card 2 -->
    <div class="benefit-card">
      <img src="img-src" alt="Motor Skills Development">
      <h3 class="benefit-title">Motor Skills Development</h3>
      <p class="benefit-text">
        Enhances both gross motor skills (walking, running) and fine motor skills (grasping, writing), improving overall coordination.
      </p>
    </div>

    <!-- Card 3 -->
    <div class="benefit-card">
      <img src="img-src" alt="Muscle Strength">
      <h3 class="benefit-title">Muscle Strength & Endurance</h3>
      <p class="benefit-text">
        Strength-based exercises help children increase muscle power, stamina, posture, and general physical fitness.
      </p>
    </div>

    <!-- Card 4 -->
    <div class="benefit-card">
      <img src="img-src" alt="Balance and Coordination">
      <h3 class="benefit-title">Improved Balance & Coordination</h3>
      <p class="benefit-text">
        Special activities help improve balance, coordination, and overall independence in daily movement.
      </p>
    </div>

    <!-- Card 5 -->
    <div class="benefit-card">
      <img src="img-src" alt="Respiratory Conditions">
      <h3 class="benefit-title">Respiratory Conditions</h3>
      <p class="benefit-text">
        Physiotherapy improves breathing patterns, strengthens lung capacity, and supports respiratory health in affected children.
      </p>
    </div>

    <!-- Card 6 -->
    <div class="benefit-card">
      <img src="img-src" alt="Pain Management">
      <h3 class="benefit-title">Pain Management</h3>
      <p class="benefit-text">
        Helps relieve pain caused by injuries, musculoskeletal issues, or pediatric disorders using safe therapeutic techniques.
      </p>
    </div>

    <!-- Card 7 -->
    <div class="benefit-card">
      <img src="img-src" alt="Post Surgery Rehab">
      <h3 class="benefit-title">Post-Surgery Rehabilitation</h3>
      <p class="benefit-text">
        Essential for children recovering from orthopedic or neurological surgery, helping them regain mobility and strength.
      </p>
    </div>

    <!-- Card 8 -->
    <div class="benefit-card">
      <img src="img-src" alt="Neurological Conditions">
      <h3 class="benefit-title">Neurological Conditions</h3>
      <p class="benefit-text">
        Supports children with cerebral palsy, developmental delays, and other neurological issues by improving motor patterns and mobility.
      </p>
    </div>

  </div>
</section>

<section class="pediatric-services">
  <style>
    .pediatric-services {
      max-width: 1200px;
      margin: 50px auto;
      padding: 20px;
      font-family: "Segoe UI", Arial, sans-serif;
    }

    .services-title {
      text-align: center;
      font-size: 2.2rem;
      font-weight: 700;
      color: #ed3237;
      margin-bottom: 35px;
    }

    .services-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 25px;
    }

    .service-box {
      background: #ffffff;
      border-radius: 20px;
      overflow: hidden;
      border: 2px solid #ed3237;
      box-shadow: 0 6px 20px rgba(0,0,0,0.08);
      transition: .3s ease;
      position: relative;
    }

    .service-box:hover {
      transform: translateY(-6px);
      box-shadow: 0 10px 22px rgba(237,50,55,0.3);
    }

    .service-img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-bottom: 3px solid #ed3237;
    }

    .service-content {
      padding: 18px 20px;
      position: relative;
    }

    .service-content::before {
      content: "";
      position: absolute;
      top: -28px;
      right: -28px;
      width: 60px;
      height: 60px;
      background: #ed3237;
      border-radius: 50%;
      opacity: .15;
    }

    .service-title {
      font-size: 1.2rem;
      font-weight: 700;
      color: #ed3237;
      margin-bottom: 8px;
    }

    .service-text {
      font-size: 0.95rem;
      color: #555;
      line-height: 1.5;
    }

    .service-box:hover .service-title,
    .service-box:hover .service-text {
      color: #ed3237;
    }

    /* Mobile Adjustments */
    @media (max-width: 600px) {
      .services-title { font-size: 1.7rem; }
      .service-img { height: 150px; }
    }
  </style>

  <h2 class="services-title">Pediatric Physiotherapy Services at Neurigo360</h2>

  <div class="services-grid">

    <!-- Service 1 -->
    <div class="service-box">
      <img src="img1.jpg" alt="Developmental Therapy" class="service-img">
      <div class="service-content">
        <h3 class="service-title">Developmental Therapy</h3>
        <p class="service-text">
          Helps infants and children achieve age-appropriate milestones through guided movement, posture correction, and play-based therapy techniques.
        </p>
      </div>
    </div>

    <!-- Service 2 -->
    <div class="service-box">
      <img src="img2.jpg" alt="Gait Training" class="service-img">
      <div class="service-content">
        <h3 class="service-title">Gait Training</h3>
        <p class="service-text">
          Focuses on improving walking patterns, balance, coordination, and strength for children with mobility challenges.
        </p>
      </div>
    </div>

    <!-- Service 3 -->
    <div class="service-box">
      <img src="img3.jpg" alt="Strength & Conditioning" class="service-img">
      <div class="service-content">
        <h3 class="service-title">Strength & Conditioning</h3>
        <p class="service-text">
          Customized exercises to enhance muscle strength, endurance, posture, and flexibility—designed especially for growing children.
        </p>
      </div>
    </div>

    <!-- Service 4 -->
    <div class="service-box">
      <img src="img4.jpg" alt="Neurological Rehabilitation" class="service-img">
      <div class="service-content">
        <h3 class="service-title">Neurological Rehabilitation</h3>
        <p class="service-text">
          Support for children with cerebral palsy, developmental delays, and other neurological conditions to improve movement and independence.
        </p>
      </div>
    </div>

    <!-- Service 5 -->
    <div class="service-box">
      <img src="img5.jpg" alt="Respiratory Physiotherapy" class="service-img">
      <div class="service-content">
        <h3 class="service-title">Respiratory Physiotherapy</h3>
        <p class="service-text">
          Techniques to improve breathing, lung capacity, and airway clearance for children with respiratory disorders or chronic lung issues.
        </p>
      </div>
    </div>

    <!-- Service 6 -->
    <div class="service-box">
      <img src="img6.jpg" alt="Post-Surgery Rehab" class="service-img">
      <div class="service-content">
        <h3 class="service-title">Post-Surgery Rehabilitation</h3>
        <p class="service-text">
          Targeted rehabilitation for recovery after orthopedic or neurological surgery—helping children restore strength and mobility.
        </p>
      </div>
    </div>

  </div>
</section>
<!-- ====================== GALLERY SECTION ====================== -->
<section class="gallery-section">
  <style>
    .gallery-section {
      max-width: 1200px;
      margin: 50px auto;
      padding: 20px;
      font-family: "Segoe UI", Arial, sans-serif;
    }

    .gallery-title {
      text-align: center;
      font-size: 2rem;
      color: #ed3237;
      font-weight: 700;
      margin-bottom: 25px;
    }

    .gallery-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 15px;
    }

    .gallery-item {
      overflow: hidden;
      border-radius: 12px;
      border: 2px solid #ed3237;
      cursor: pointer;
      transition: .3s ease;
    }

    .gallery-item img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      transition: transform .3s ease;
    }

    .gallery-item:hover img {
      transform: scale(1.1);
    }

    /* Fullscreen Popup */
    .fullscreen-view {
      display: none;
      position: fixed;
      z-index: 9999;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.9);
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .fullscreen-view img {
      max-width: 90%;
      max-height: 90%;
      border-radius: 10px;
      border: 4px solid #ed3237;
      box-shadow: 0 0 20px rgba(237,50,55,0.6);
    }

    .close-btn {
      position: absolute;
      top: 30px;
      right: 40px;
      font-size: 35px;
      color: #fff;
      cursor: pointer;
      font-weight: bold;
      transition: .3s;
    }

    .close-btn:hover {
      color: #ed3237;
    }
  </style>

  <h2 class="gallery-title">Gallery</h2>

  <div class="gallery-grid">
    <div class="gallery-item"><img src="img1.jpg" alt="gallery"></div>
    <div class="gallery-item"><img src="img2.jpg" alt="gallery"></div>
    <div class="gallery-item"><img src="img3.jpg" alt="gallery"></div>
    <div class="gallery-item"><img src="img4.jpg" alt="gallery"></div>
    <div class="gallery-item"><img src="img5.jpg" alt="gallery"></div>
    <div class="gallery-item"><img src="img6.jpg" alt="gallery"></div>
  </div>
</section>

<!-- Fullscreen Image Popup -->
<div class="fullscreen-view" id="fullscreenView">
  <span class="close-btn" id="closeView">×</span>
  <img id="fullImage" src="">
</div>

<!-- jQuery (Required) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function () {

    // Click Image → Show Fullscreen
    $(".gallery-item img").click(function () {
      let imgSrc = $(this).attr("src");
      $("#fullImage").attr("src", imgSrc);
      $("#fullscreenView").fadeIn(200);
    });

    // Click Close → Hide Fullscreen
    $("#closeView, #fullscreenView").click(function () {
      $("#fullscreenView").fadeOut(200);
    });

  });
</script>


@endsection
