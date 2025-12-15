<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Section with Video Background</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    .hero {
      position: relative;
      height: 600px;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-align: center;
    }

    .hero video {
      position: absolute;
      top: 0;
      left: 0;
      min-width: 100%;
      min-height: 100%;
      object-fit: cover;
      z-index: -2;
    }

    .hero::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.6); /* Black overlay */
      z-index: -1;
    }

    .hero-content {
      z-index: 1;
    }
  </style>
</head>
<body>

  <!-- Other Page Content -->
  <header class="p-4 bg-light">
    <h2 class="text-center">Welcome Header</h2>
  </header>

  <!-- Hero Section with Video Background -->
  <section class="hero">
    <video autoplay muted loop>
      <source src="/video/one.mp4" type="video/mp4" />
      Your browser does not support the video tag.
    </video>
    <div class="hero-content container">
      <h1 class="display-4 fw-bold">Inspire with Motion</h1>
      <p class="lead">Your message goes here with impact.</p>
      <a href="#cta" class="btn btn-primary btn-lg mt-3">Explore Now</a>
    </div>
  </section>

  <!-- More Page Content -->
  <section class="p-5 bg-light">
    <div class="container">
      <h3>About Us</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
    </div>
  </section>

</body>
</html>
