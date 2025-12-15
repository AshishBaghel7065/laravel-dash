<section class="achievement-section">
    <div class="container">
        <div class="row">
            @foreach ($achievements as $achievement)
               <div class="col-lg-3 col-md-6">
                <div class="achievement-box my-2">
                  <h2 class="counter" data-target="{{ $achievement->count }}">{{ $achievement->count }}</h2>
                  <p>{{ $achievement->title }}</p>
              </div>
               </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const counters = document.querySelectorAll(".counter");

        counters.forEach(counter => {
            const target = +counter.getAttribute("data-target");
            let count = 0;
            const speed = 20;

            const updateCount = () => {
                if (count < target) {
                    count += Math.ceil(target / 100);
                    if (count > target) count = target;
                    counter.innerText = count;
                    setTimeout(updateCount, speed);
                } else {
                    counter.innerText = target;
                }
            };

            updateCount();
        });
    });
</script>

