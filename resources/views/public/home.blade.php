@extends('components.layouts.public-layout')

@section('title', 'Welcome to UMS')

@section('content')


    <style>
        /* Hero Section Custom Styles */
        @media (max-width: 991px) {
            .custom-text-content {
                padding-bottom: 1rem;
            }

            .custom-image-wrapper {
                margin-top: 0.75rem;
            }
        }



        .custom-hero-wrapper {
            padding: 1.5rem;
            background-color: transparent;
        }

        .custom-hero-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #c91f89 100%);
            border-radius: 60px;
            position: relative;
            overflow: hidden;
            min-height: 80vh;
            display: flex;
            align-items: center;
        }

        /* The diagonal cut on the bottom-left edge */
        .custom-hero-section::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: -1px;
            width: 65%;
            height: 140px;
            background-color: #ffffff;
            clip-path: polygon(0 100%, 100% 100%, 0 0);
            z-index: 1;
        }

        @media (max-width: 991px) {
            .custom-hero-section {
                border-radius: 40px;
                padding: 2rem 0;
            }

            .custom-hero-section::after {
                height: 80px;
                width: 100%;
            }
        }

        .custom-text-content {
            color: #000000;
            z-index: 2;
            position: relative;
            padding-bottom: 2rem;
        }

        .custom-btn {
            background-color: #ffffff;
            color: #0f5b57;
            border-radius: 30px;
            font-weight: 600;
            padding: 0.8rem 2.5rem;
            transition: all 0.3s ease;
            border: 2px solid #ffffff;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .custom-btn:hover {
            background-color: transparent;
            color: #ffffff;
        }

        /* Image Container (kept intact so clip-path is not disturbed) */
        .custom-image-wrapper {
            position: relative;
            border-radius: 50px;
            overflow: hidden;
            z-index: 2;
            height: 60vh;
            min-height: 400px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.3);
            margin: 20px;
            clip-path: polygon(0% 0%, 100% 0%, 100% 29%, 100% 70%, 100% 100%, 79% 100%, 0% 81%, 0% 30%);

        }

        .custom-image-wrapper .image-slider-container {
            transform: rotate(-3deg) scale(1.15);
            width: 100%;
            height: 100%;
            position: relative;
        }

        @media (max-width: 991px) {
            .custom-image-wrapper {
                height: 40vh;
                min-height: 300px;
                margin: 20px 0;
            }
        }

        .control-dot.active {
            background: #ffffff !important;
            border-color: #ffffff !important;
        }

        .control-dot {
            border-color: #ffffff !important;
            background: transparent !important;
        }

        
    </style>


   
    <div class="custom-hero-wrapper">
        <section class="hero-section custom-hero-section position-relative">
            <div class="container-fluid w-100">
                <div class="row align-items-center">

                    {{-- LEFT: Image Slider --}}
                    <div class="col-lg-7 p-4 p-lg-5 order-2 order-lg-1">
                        <div class="custom-image-wrapper">
                            <div class="image-slider-container position-relative w-100 h-100 overflow-hidden">
                                @foreach ($sliders as $index => $slider)
                                    <div class="image-slide position-absolute top-0 start-0 w-100 h-100"
                                        data-index="{{ $index }}"
                                        style="transition: all 0.8s cubic-bezier(0.645, 0.045, 0.355, 1);
                                           opacity: {{ $index === 0 ? '1' : '0' }};
                                           transform: translateY({{ $index === 0 ? '0' : ($index > 0 ? '100%' : '-100%') }});
                                           z-index: {{ $index === 0 ? '2' : '1' }};">
                                        <div class="position-relative h-100 w-100">
                                            <img src="{{ $slider['image'] ?? 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1200' }}"
                                                alt="{{ $slider['caption'] }}" class="w-100 h-100"
                                                style="object-fit: cover; object-position: center;">
                                            <div class="position-absolute top-0 start-0 w-100 h-100"
                                                style="background: linear-gradient(135deg, rgba(0,0,0,0.1) 0%, rgba(15,91,87,0.2) 100%);">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- RIGHT: Text Content --}}
                    <div class="col-lg-5 position-relative px-4 px-lg-5 order-1 order-lg-2">
                        <div class="container custom-text-content">
                            <div class="text-slider-container position-relative" style="height: 350px; overflow: hidden;">
                                @foreach ($sliders as $index => $slider)
                                    <div class="text-slide position-absolute w-100" data-index="{{ $index }}"
                                        style="transition: all 0.8s cubic-bezier(0.645, 0.045, 0.355, 1);
                                            opacity: {{ $index === 0 ? '1' : '0' }};
                                            transform: translateY({{ $index === 0 ? '0' : '50px' }});">
                                        <div class="content-wrapper pe-lg-4">
                                            <div class="mb-4"
                                                style="width: 60px; height: 4px; background-color: #ffffff; border-radius: 2px;">
                                            </div>

                                            <h1 class="display-4 fw-bold mb-4"
                                                style="line-height: 1.2; font-family: 'Playfair Display', serif;">
                                                {{ $slider['caption'] }}
                                            </h1>

                                            <p class="fs-5 mb-5"
                                                style="line-height: 1.6; font-family: 'Poppins', sans-serif; opacity: 0.9;">
                                                {{ $slider['sub_caption'] }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="slider-controls d-flex gap-3 position-relative z-index-2 mt-2">
                                @foreach ($sliders as $index => $slider)
                                    <button class="control-dot {{ $index === 0 ? 'active' : '' }}"
                                        data-slide="{{ $index }}"
                                        style="width: 12px; height: 12px; border-radius: 50%; border: 2px solid #ffffff; cursor: pointer; transition: all 0.3s; padding: 0;">
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <div class="custom-text-content">
                            <a href="{{ route('public.enquiry.create') }}"
                                class="btn custom-btn shadow-lg position-relative overflow-hidden">
                                <span class="btn-text position-relative" style="z-index: 2;">Apply Now</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>



    <!-- jQuery + Slick -->


    @push('scripts')
        <script src="{{ asset('js/slider.js') }}"></script>
    @endpush



    <!-- Search Section -->
<<<<<<< HEAD
    <!-- Parallax Search Section -->
    <section class="parallax-search-section position-relative py-4 py-sm-5 py-md-5">
        <div class="parallax-overlay"></div>

        <div class="container position-relative" style="z-index: 2;">
            <!-- Heading -->
            <div class="text-center text-white mb-3 mb-md-4">
                <h2 class="fw-bold fs-4 fs-md-3 fs-lg-2">
                    Find Your Perfect University
                </h2>
            </div>
            <!-- Search Input -->
            <div class="position-relative animate-slide-in mx-auto" style="max-width: 800px;">
                <input type="search" placeholder="Search universities, colleges, or courses..."
                    class="form-control rounded-3 border-0 shadow-lg py-3 py-md-4 px-3 px-md-5 fs-6 fs-md-5"
                    style="background: rgba(255,255,255,0.95);">
            </div>

        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="mb-4 d-flex justify-content-center p-1 fw-bold  section-underline"
            style="font-family: 'Playfair Display', serif;">
            <h1>Why Should You Choose Us</h1>
        </div>
        <div class="container-fluid">
=======
 <!-- Parallax Search Section -->
<section class="parallax-search-section position-relative py-5">
    <div class="parallax-overlay"></div>
    
    <div class="container position-relative" style="z-index: 2;">
        <div class="text-center text-white mb-4">
            <h2 class="fw-bold">Find Your Perfect University</h2>
        </div>
        <div class="position-relative animate-slide-in max-w-4xl mx-auto">
            <input type="search" placeholder="Search universities, colleges, or courses..." 
                   class="w-100 rounded-3 border-0 py-4 px-5 fs-5 shadow-lg" style="background: rgba(255,255,255,0.95);">
        </div>
    </div>
</section>

    <!-- About Section -->
     <section class="about-section">
      <div class="d-flex justify-content-center p-1 fw-bold  section-underline" style="font-family: 'Playfair Display', serif;"><h1>Why Should You Choose Us</h1></div>
      <div class="container-fluid">
>>>>>>> a7659ad03ab9c8da35082f472ad7c37f32c5eaa4
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1 class="section-headline">Empowering Students to Achieve Their Dreams</h1>
                    <p class="section-subheadline">Your trusted partner in education and career success</p>
<<<<<<< HEAD

                    <div class="about-text">
                        <p>We believe every student deserves personalized guidance to unlock their full potential. Our
                            comprehensive services combine expert mentorship, strategic planning, and unwavering support to
                            help you navigate the complex journey of university admissions and career development. With
                            years of experience and a deep commitment to student success, we transform aspirations into
                            achievements, one milestone at a time.</p>
=======
                    
                    <div class="about-text">
                        <p>We believe every student deserves personalized guidance to unlock their full potential. Our comprehensive services combine expert mentorship, strategic planning, and unwavering support to help you navigate the complex journey of university admissions and career development. With years of experience and a deep commitment to student success, we transform aspirations into achievements, one milestone at a time.</p>
>>>>>>> a7659ad03ab9c8da35082f472ad7c37f32c5eaa4
                    </div>

                    <div class="features-list">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="feature-content">
                                <h4>University Admissions Excellence</h4>
<<<<<<< HEAD
                                <p>Expert guidance through every step of the application process, from college selection to
                                    acceptance.</p>
=======
                                <p>Expert guidance through every step of the application process, from college selection to acceptance.</p>
>>>>>>> a7659ad03ab9c8da35082f472ad7c37f32c5eaa4
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-compass"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Personalized Career Counseling</h4>
<<<<<<< HEAD
                                <p>Discover your passion and chart a career path aligned with your strengths and
                                    aspirations.</p>
=======
                                <p>Discover your passion and chart a career path aligned with your strengths and aspirations.</p>
>>>>>>> a7659ad03ab9c8da35082f472ad7c37f32c5eaa4
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="feature-content">
                                <h4>One-on-One Mentorship</h4>
<<<<<<< HEAD
                                <p>Dedicated mentors who understand your unique journey and provide tailored support
                                    throughout.</p>
=======
                                <p>Dedicated mentors who understand your unique journey and provide tailored support throughout.</p>
>>>>>>> a7659ad03ab9c8da35082f472ad7c37f32c5eaa4
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Study Abroad Support</h4>
<<<<<<< HEAD
                                <p>Navigate international opportunities with confidence through comprehensive guidance and
                                    resources.</p>
=======
                                <p>Navigate international opportunities with confidence through comprehensive guidance and resources.</p>
>>>>>>> a7659ad03ab9c8da35082f472ad7c37f32c5eaa4
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-image-wrapper">
                        <div class="decorative-circle"></div>
                        <div class="about-image">
<<<<<<< HEAD
                            <img src="{{ asset('Images/about.jpg') }}" alt="">

=======
                          <img src="{{ asset('Images/about.jpg') }}" alt="">
                          
>>>>>>> a7659ad03ab9c8da35082f472ad7c37f32c5eaa4
                            <img src="{{ asset('Images/about.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- universities section --}}
    <section class="py-5" style="background: linear-gradient(to bottom, var(--background-light), transparent);">
        <div class="container" style="max-width: 1536px;">
<<<<<<< HEAD
            <h2 class="fs-2 fs-sm-2 fw-bold text-center mb-4 section-underline"
                style="font-family: 'Playfair Display', serif;">Featured Universities</h2>
=======
            <h2 class="fs-2 fs-sm-2 fw-bold text-center mb-4 section-underline" style="font-family: 'Playfair Display', serif;">Featured Universities</h2>
>>>>>>> a7659ad03ab9c8da35082f472ad7c37f32c5eaa4

            <div class="row g-4">

                @foreach ($universities as $university)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="{{ route('public.universities.show', ['slug' => $university->slug]) }}"
<<<<<<< HEAD
                            class="text-decoration-none">

=======
                          class="text-decoration-none">
                            
>>>>>>> a7659ad03ab9c8da35082f472ad7c37f32c5eaa4
                            <div class="service-card">

                                <!-- Hover Arrow -->
                                <div class="arrow-icon">
                                    <i class="bi bi-arrow-up-right"></i>
                                </div>

                                <div class="card-body">

                                    <!-- Title -->
                                    <h3 class="card-title text-pink">
                                        {{ $university->name }}
                                    </h3>

                                    <!-- Location -->
                                    <p class="card-text text-secondary">
                                        {{ $university->location ?? 'Location not available' }}
                                    </p>

                                    <!-- Image -->
                                    <div class="card-image">
                                        <img src="{{ $university->logo_path ?: 'https://via.placeholder.com/400x225' }}"
                                            alt="{{ $university->name }}">
                                    </div>

                                </div>

                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Top Colleges -->
    <section class="py-5" style="background: linear-gradient(to bottom, var(--background-light), transparent);">
        <div class="container" style="max-width: 1536px;">
<<<<<<< HEAD
            <h2 class="section-underline fs-2 fs-sm-2 fw-bold text-center mb-4"
                style="font-family: 'Playfair Display', serif;">
                Top Colleges
            </h2>
=======
            <h2 class="section-underline fs-2 fs-sm-2 fw-bold text-center mb-4" style="font-family: 'Playfair Display', serif;">
                Top Colleges
            </h2>   
>>>>>>> a7659ad03ab9c8da35082f472ad7c37f32c5eaa4
            <div class="row g-4">
                @foreach ($colleges as $college)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="{{ route('public.colleges.show', ['slug' => $college->slug]) }}"
<<<<<<< HEAD
                            class="text-decoration-none">
=======
                        class="text-decoration-none">
>>>>>>> a7659ad03ab9c8da35082f472ad7c37f32c5eaa4
                            <div class="service-card">
                                <!-- Hover Arrow -->
                                <div class="arrow-icon">
                                    <i class="bi bi-arrow-up-right"></i>
                                </div>
                                <div class="card-body">
                                    <!-- College Name -->
                                    <h3 class="card-title text-pink">
                                        {{ $college->name }}
                                    </h3>
                                    <!-- Parent University Name -->
                                    <p class="card-text text-secondary">
                                        {{ $college->university_id ? \App\Models\University::find($college->university_id)->name ?? 'N/A' : 'Independent' }}
                                    </p>
                                    <!-- College Image -->
                                    <div class="card-image">
                                        <img src="{{ $college->logo_path ?: 'https://via.placeholder.com/400x225' }}"
                                            alt="{{ $college->name }}">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Popular Courses -->
    <section class="py-5" style="background: linear-gradient(to bottom, var(--background-light), transparent);">
        <div class="container" style="max-width: 1536px;">
<<<<<<< HEAD
            <h2 class="fs-2 fs-sm-2 fw-bold text-center mb-4 section-underline"
                style="font-family: 'Playfair Display', serif;">
=======
            <h2 class="fs-2 fs-sm-2 fw-bold text-center mb-4 section-underline" style="font-family: 'Playfair Display', serif;">
>>>>>>> a7659ad03ab9c8da35082f472ad7c37f32c5eaa4
                Popular Courses
            </h2>
            <div class="row g-4">
                @foreach ($courses as $course)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="{{ route('public.courses.show', ['slug' => $course->slug]) }}"
<<<<<<< HEAD
                            class="text-decoration-none">
=======
                        class="text-decoration-none">
>>>>>>> a7659ad03ab9c8da35082f472ad7c37f32c5eaa4

                            <div class="service-card">

                                <!-- Hover Arrow -->
                                <div class="arrow-icon">
                                    <i class="bi bi-arrow-up-right"></i>
                                </div>

                                <div class="card-body">

                                    <!-- Course Name -->
                                    <h3 class="card-title text-pink">
                                        {{ $course->name }}
                                    </h3>

                                    <!-- Duration -->
                                    <p class="card-text text-secondary">
                                        {{ $course->duration ?? 'Duration not available' }}
                                    </p>

                                    <!-- Image -->
                                    <div class="card-image">
                                        <img src="{{ $course->image_path ?: 'https://via.placeholder.com/400x225' }}"
                                            alt="{{ $course->name }}">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('public.homeSections.testimonials');
<<<<<<< HEAD

=======
    
>>>>>>> a7659ad03ab9c8da35082f472ad7c37f32c5eaa4



    @include('public.homeSections.contact', ['test' => 'ok'])


    <!-- Call to Action -->
    <section class="py-5" style="background: rgba(199, 21, 133, 0.1);">
        <div class="container text-center animate-slide-in" style="max-width: 1280px;">
            <h2 class="fs-3 fs-sm-2 fw-bold ">Ready to Start Your Journey?</h2>
<<<<<<< HEAD
            <a href="{{ route('public.universities.index') }}"
                class="mt-3 d-inline-flex align-items-center justify-content-center btn btn-primary fw-semibold shadow"
                style="height: 40px; padding: 0 20px; transition: all 0.3s ease;"
                aria-label="Explore universities">Explore More</a>
=======
            <a href="{{ route('public.universities.index') }}" class="mt-3 d-inline-flex align-items-center justify-content-center btn btn-primary fw-semibold shadow" style="height: 40px; padding: 0 20px; transition: all 0.3s ease;" aria-label="Explore universities">Explore More</a>
>>>>>>> a7659ad03ab9c8da35082f472ad7c37f32c5eaa4
        </div>
    </section>

@endsection
