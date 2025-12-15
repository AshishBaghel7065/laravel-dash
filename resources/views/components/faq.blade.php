@php
  $limitedFaqs = $faqs->take(8)->toArray(); // Take only the first 8 FAQs
  $faqChunks = array_chunk($limitedFaqs, ceil(count($limitedFaqs) / 2)); // Split into 2 columns
@endphp

<section class="faq-section">
  <div class="connect-data">
    <div class="heading-section text-center">
      <h3 class="heading-big">FAQ's</h3>
      <h4 class="heading-small">FAQ's</h4>
    </div>
    <div class="container">
      <div class="row align-items-start">
        @foreach($faqChunks as $chunk)
          <div class="col-lg-6">
            @foreach($chunk as $faq)
              <div class="faq-box mb-4">
                <h5 class="faq-question">{{ $faq['question'] }}</h5>
                <div class="faq-answer">
                  {!! $faq['answer'] !!}
                </div>
              </div>
            @endforeach
          </div>
        @endforeach
      </div>
    </div>
<div class="mt-3 text-center">
  <a href="/faq" class="main-btn">Know More About Clinic</a>
</div>
  </div>
</section>
