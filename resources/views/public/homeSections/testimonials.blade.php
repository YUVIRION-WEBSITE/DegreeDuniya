<!-- Enhanced Testimonials Section -->
<section class="testimonials-section py-5 position-relative overflow-hidden" 
         style="background: linear-gradient(135deg, #fdfcfb 0%, #f8f9fa 100%);">
    <div class="container" style="max-width: 1800px;">

        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold" style="font-family: 'Playfair Display', serif; 
                                               background: linear-gradient(135deg, #c71585, #d4af37);
                                               -webkit-background-clip: text;
                                               -webkit-text-fill-color: transparent;">
                What Our Students Say
            </h2>
            <p class="text-muted fs-5">Real experiences from real achievers</p>
        </div>

        <div class="testimonial-slider position-relative">
            <div class="testimonial-track d-flex">

                {{-- Duplicated slides for seamless loop --}}
                @php
                    $dupTestimonials = $testimonials->concat($testimonials->take(3)); // clone first 3 for smooth loop
                @endphp

                @foreach ($dupTestimonials as $testimonial)
                    <div class="testimonial-slide px-3">
                        <div class="testimonial-card h-100 position-relative overflow-hidden">
                            <!-- Golden Gradient Border Effect -->
                            <div class="golden-glow"></div>

                            <div class="card-body text-center p-5">
                                <!-- Large Circular Photo with Glow -->
                                <div class="testimonial-photo mx-auto mb-4 position-relative">
                                    <img src="{{ $testimonial->photo_path ?: asset('images/default-avatar.jpg') }}"
                                         alt="{{ $testimonial->name }}"
                                         class="rounded-circle object-fit-cover shadow-lg">
                                    <div class="photo-ring"></div>
                                </div>

                                <!-- Name & Date -->
                                <h5 class="fw-bold text-dark mb-1">{{ $testimonial->name }}</h5>
                                <p class="text-muted small mb-3">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $testimonial->date->format('M d, Y') }}
                                </p>

                                <!-- Star Rating -->
                                <div class="mb-4">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="bi {{ $i <= $testimonial->rating ? 'bi-star-fill' : 'bi-star' }} text-warning fs-5"></i>
                                    @endfor
                                </div>

                                <!-- Quote Icon -->
                                <i class="bi bi-chat-quote-fill fs-1 text-gold opacity-10 position-absolute top-0 start-50 translate-middle-x"></i>

                                <!-- Testimonial Text -->
                                <p class="testimonial-text lead fst-italic position-relative">
                                    "{{ Str::limit($testimonial->comment, 180) }}"
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

                   <div>
             <!-- Navigation Arrows -->
            <button class="slider-btn prev-btn shadow-lg">
                <i class="bi bi-chevron-left"></i>
            </button>
            <button class="slider-btn next-btn shadow-lg">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>

            <!-- Dots Indicator -->
            <div class="dots-container mt-4 text-center">
                @foreach ($testimonials as $index => $item)
                    <span class="dot {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}"></span>
                @endforeach
            </div>
        </div>
        

    </div>
</section>

<style>
    .testimonials-section {
        padding: 100px 0;
    }

    .testimonial-slider {
        overflow: hidden;
        position: relative;
    }

    .testimonial-track {
        display: flex;
        transition: transform 0.6s cubic-bezier(0.645, 0.045, 0.355, 1);
        width: max-content;
    }

    .testimonial-slide {
        min-width: 380px;
        padding: 0 15px;
    }

    .testimonial-card {
        background: white;
        border-radius: 28px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: all 0.4s ease;
        border: 1px solid rgba(212, 175, 55, 0.15);
    }

    .testimonial-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 50px rgba(212, 175, 55, 0.25);
    }

    .golden-glow {
        position: absolute;
        top: -2px; left: -2px; right: -2px; bottom: -2px;
        background: linear-gradient(135deg, #f4d03f, #d4af37);
        border-radius: 30px;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.4s;
    }

    .testimonial-card:hover .golden-glow {
        opacity: 1;
    }

    .testimonial-photo {
        width: 110px;
        height: 110px;
    }

    .testimonial-photo img {
        width: 100%;
        height: 100%;
        border: 5px solid white;
        transition: all 0.4s;
    }

    .photo-ring {
        position: absolute;
        inset: -8px;
        border: 3px solid transparent;
        border-radius: 50%;
        background: linear-gradient(135deg, #f4d03f, #d4af37) border-box;
        -webkit-mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        opacity: 0.7;
    }

    .testimonial-text {
        color: #444;
        line-height: 1.8;
        font-size: 1.1rem;
    }

    .text-gold { color: #d4af37; }

    /* Slider Buttons */
    .slider-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(135deg, #c71585, #d4af37);
        border: none;
        color: white;
        font-size: 1.4rem;
        z-index: 10;
        transition: all 0.3s;
        box-shadow: 0 8px 25px rgba(199, 21, 133, 0.3);
    }

    .prev-btn { left: -25px; }
    .next-btn { right: -25px; }

    .slider-btn:hover {
        transform: translateY(-50%) scale(1.1);
        box-shadow: 0 12px 35px rgba(199, 21, 133, 0.4);
    }

    /* Dots */
    .dot {
        display: inline-block;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #ddd;
        margin: 0 6px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .dot.active, .dot:hover {
        background: linear-gradient(135deg, #d4af37, #f4d03f);
        transform: scale(1.3);
    }

    /* Responsive */
    @media (max-width: 992px) {
        .testimonial-slide { min-width: 340px; }
        .prev-btn { left: 10px; }
        .next-btn { right: 10px; }
    }

    @media (max-width: 768px) {
        .testimonial-slide { min-width: 100%; }
        .slider-btn { width: 44px; height: 44px; font-size: 1.2rem; }
    }
</style>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const track = document.querySelector('.testimonial-track');
    const slides = document.querySelectorAll('.testimonial-slide');
    const dots = document.querySelectorAll('.dot');
    const totalSlides = {{ $testimonials->count() }};

    let index = 0;

    function goToSlide(i) {
        index = i;
        const offset = -(index * slides[0].offsetWidth);
        track.style.transform = `translateX(${offset}px)`;

        dots.forEach((dot, dIndex) => {
            dot.classList.toggle('active', dIndex === (index % totalSlides));
        });
    }

    // --- FIX 1: listen for transition end to re-enable buttons ---
    track.addEventListener("transitionend", () => {
        track.style.transition = "transform 0.6s cubic-bezier(0.645,0.045,0.355,1)";
    });

    // NEXT BUTTON
    document.querySelector('.next-btn').addEventListener('click', () => {
        index++;

        track.style.transition = "transform 0.6s cubic-bezier(0.645,0.045,0.355,1)";
        goToSlide(index);

        // Loop back to start
        if (index >= totalSlides) {
            setTimeout(() => {
                track.style.transition = "none";  
                index = 0;
                goToSlide(index);
            }, 600);
        }
    });

    // PREVIOUS BUTTON
    document.querySelector('.prev-btn').addEventListener('click', () => {
        if (index === 0) {
            track.style.transition = "none";
            index = totalSlides;
            goToSlide(index);

            setTimeout(() => {
                track.style.transition = "transform 0.6s cubic-bezier(0.645,0.045,0.355,1)";
                index--;
                goToSlide(index);
            }, 50);
        } else {
            index--;
            goToSlide(index);
        }
    });

    // DOT CLICK
    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            track.style.transition = "transform 0.6s cubic-bezier(0.645,0.045,0.355,1)";
            goToSlide(i);
        });
    });

    // AUTO PLAY
    let autoplay = setInterval(() => {
        document.querySelector('.next-btn').click();
    }, 5000);

    document.querySelector('.testimonial-slider').addEventListener('mouseenter', () => clearInterval(autoplay));
    document.querySelector('.testimonial-slider').addEventListener('mouseleave', () => {
        autoplay = setInterval(() => document.querySelector('.next-btn').click(), 5000);
    });

    // RESIZE
    window.addEventListener('resize', () => goToSlide(index));

});
</script>
