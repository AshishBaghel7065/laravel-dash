<section class="specialist-section">
    <div class="specialist-overlay"></div>
    <div class="specialits-data">
        <div class="container">
            <div class="spe-container">
                <div class="heading-section">
                    <h3 class="heading-big3">Specialize in</h3>
                    <h4 class="heading-small3">Specialize in</h4>
                  </div>
                <div class="row">
                    @foreach($services->take(6) as $service)
                    <div class="col-lg-4">
                        <div class="specialist-card">
                               <div class="image">
                  <img src="{{ asset('services/'.$service['image']) }}" class="service-image" alt="{{ $service['title'] }}">
                </div>
                            <a href="{{ url('service/' . Str::slug($service['service'])) }}">
                                <h4>{{ $service['service'] }}</h4>
                            </a>
                            <p>{{ Str::limit(strip_tags($service->description), 120) }}</p>
                            <div class="my-3">
                                <a href="{{ url('service/' . Str::slug($service['service'])) }}">
                                    Read More <i class="fa-solid fa-arrow-trend-up"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="text-center my-5">
            <a href="/" class="white-btn text-black">Explore More <i class="fa-solid fa-arrow-trend-up"></i></a>
        </div>
    </div>
    </div>
</section>
<style>
    .specialist-section {
        background: url('/image/ban.png');
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        position: relative;
        height: auto;
        padding: 50px 0px;

    }

    .specialits-data{
        position: relative;
        
    }
    .specialist-card a{
        text-decoration: none;
        color: #E2222C;
    }

    .specialist-overlay {
        background-color: rgba(0, 0, 0, 0.644);
        height: 100%;
        width: 100%;
        position: absolute;
        top: 0px;
        left: 0px;
    }

    .specialist-card {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        height: 460px;
        margin-top: 20px;
    }
</style>