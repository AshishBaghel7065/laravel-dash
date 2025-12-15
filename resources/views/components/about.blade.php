
<section class="about-section">
  <div class="heading-section">
    <h3 class="heading-big">About us</h3>
    <h4 class="heading-small">About us</h4>
  </div>
    <div class="container">

        <div class="row justify-content-center align-items-center">
            @foreach($about as $item)
            <div class="col-lg-6">
              
                <div class="about-image">
                    <img src="{{ asset('updateabout/' . $item['image']) }}" alt="About Image" class="w-100">
               
                </div>
            </div>
            <div class="col-lg-6">
              <h2 class="welcome">Welcome To Neurigo 360</h2>
                <p>{!! Str::limit($item['description'],1000) !!}</p>
              <div class="my-3">
                <a href="/about" class="btnn text-decoration-none">Read More</a>
              </div>
            </div>

          
           
            @endforeach
        </div>
    </div>
    
</section>

<script>
    const counters = document.querySelectorAll('.counter');

    counters.forEach(counter => {
      const updateCount = () => {
        const target = +counter.getAttribute('data-target');
        const suffix = counter.getAttribute('data-suffix') || '';
        const count = +counter.innerText.replace(/\D/g, '');
        const speed = 200;
        const increment = target / speed;

        if (count < target) {
          counter.innerText = Math.ceil(count + increment) + suffix;
          setTimeout(updateCount, 20);
        } else {
          counter.innerText = target + suffix;
        }
      };

      updateCount();
    });
  </script>
