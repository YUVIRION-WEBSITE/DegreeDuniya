@extends('components.layouts.public-layout')

@section('title', '{{ $university->name }} - EduConnect')

@section('head')
    <meta property="og:title" content="{{ $university->name }} - EduConnect">
    <meta property="og:description" content="Explore {{ $university->name }} on EduConnect. Discover its mission, vision, colleges, and academic programs.">
    <meta property="og:image" content="{{ $university->banner_path ?? ($university->logo_path ?? 'https://via.placeholder.com/1200x630') }}">
    <meta name="twitter:card" content="summary_large_image">
    <style>
        /* Hero Section */
        .hero-section {
            background-size: cover;
            background-position: center;
            min-height: 40vh;
            transition: all 0.3s ease;
        }
        @media (min-width: 768px) {
            .hero-section {
                min-height: 60vh;
            }
        }
        .hero-overlay {
            background-color: rgba(0, 0, 0, 0.75);
            border-radius: 8px;
            padding: 1.5rem;
        }
        @media (min-width: 640px) {
            .hero-overlay {
                padding: 2rem;
            }
        }
        .hero-overlay h1 {
            color: var(--text-dark);
            font-size: 2.25rem;
            font-weight: 900;
        }
        @media (min-width: 640px) {
            .hero-overlay h1 {
                font-size: 3.25rem;
            }
        }
        .hero-overlay p {
            color: var(--text-dark);
            font-size: 1rem;
        }
        @media (min-width: 640px) {
            .hero-overlay p {
                font-size: 1.125rem;
            }
        }

        /* Info Cards */
        .info-card {
            min-height: 160px;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
            background-color: var(--background-light);
            border-radius: 8px;
        }
        .dark .info-card {
            background-color: var(--background-dark);
        }
        .info-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transform: scale(1.02);
        }
        .info-card h3 {
            color: var(--text-light);
            font-weight: 700;
        }
        .dark .info-card h3 {
            color: var(--text-dark);
        }
        .info-card p.italic {
            font-style: italic;
            color: var(--text-light);
        }
        .dark .info-card p.italic {
            color: var(--text-dark);
        }

        /* Colleges Section */
        .college-card {
            transition: box-shadow 0.3s ease, transform 0.3s ease;
            background-color: var(--background-light);
            border-radius: 8px;
        }
        .dark .college-card {
            background-color: var(--background-dark);
        }
        .college-card img {
            transition: transform 0.3s ease;
        }
        .college-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transform: scale(1.02);
        }
        .college-card:hover img {
            transform: scale(1.05);
        }
        .college-card h3 {
            color: var(--text-light);
            font-weight: 700;
        }
        .dark .college-card h3 {
            color: var(--text-dark);
        }
        .empty-state {
            background-color: var(--background-light);
            color: var(--text-light);
            border-radius: 8px;
        }
        .dark .empty-state {
            background-color: var(--background-dark);
            color: var(--text-dark);
        }

        /* Focus Styles */
        a:focus, button:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }

        /* Animations */
        .animate-slide-in {
            animation: slide-in 0.6s ease-out forwards;
        }

        /* NEW ADDITIONS FOR ENHANCEMENT */
        .university-hero {
            position: relative;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            padding: 80px 0;
            min-height: 70vh;
            display: flex;
            align-items: center;
        }
        .university-hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(to right, rgba(15, 91, 87, 0.95) 0%, rgba(30, 27, 75, 0.8) 100%);
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
        }
        .highlight-pill {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            padding: 8px 16px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
        }
        .step-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #0f5b57;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0 auto;
            z-index: 2;
            position: relative;
        }
        .step-line {
            position: absolute;
            top: 30px;
            left: 50%;
            width: 100%;
            height: 3px;
            background: #e5e7eb;
            z-index: 1;
        }
        /* Connect all steps properly on larger screens */
        @media (min-width: 992px) {
            .step-line {
                width: 100%;
            }
        }
        @media (max-width: 991px) {
            .step-line { display: none; }
        }
        .benefit-card {
            border-radius: 16px;
            transition: all 0.3s ease;
            border: 1px solid #f3f4f6;
        }
        .benefit-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            border-color: #0f5b57;
        }
        .benefit-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: rgba(15, 91, 87, 0.1);
            color: #0f5b57;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
    </style> 
@endsection

@section('content')

<!-- 1️⃣ Enhanced Hero Section -->
<section class="university-hero" style="background-image: url('{{ $university->banner_path ?? ($university->logo_path ?: 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&q=80') }}');">
    <div class="container hero-content">    
        <div class="row align-items-center">
            <!-- Hero Content -->
            <div class="col-lg-8 animate-slide-in text-center text-lg-start">
                <span class="badge bg-warning text-dark mb-3 px-3 py-2 rounded-pill fw-semibold shadow-sm">UGC Entitled</span>
                <h1 class="display-3 fw-bold mb-3" style="font-family: 'Playfair Display', serif; line-height: 1.2;">{{ $university->name }} Online</h1>
                <p class="lead mb-4 mx-auto mx-lg-0" style="opacity: 0.95; max-width: 600px; font-size: 1.15rem;">
                    {{ $university->tagline ?? 'Empowering your career with world-class education. Flexible, industry-focused, and recognized globally.' }}
                </p>
                
                <!-- Quick Highlights -->
                <div class="d-flex flex-wrap gap-2 gap-md-3 justify-content-center justify-content-lg-start mb-5">
                    <div class="highlight-pill"><i class="bi bi-award-fill text-warning"></i> NAAC A+ Grade</div>
                    <div class="highlight-pill"><i class="bi bi-clock-fill text-info"></i> 2-3 Years Duration</div>
                    <div class="highlight-pill"><i class="bi bi-check-circle-fill text-success"></i> Direct Eligibility</div>
                    <div class="highlight-pill"><i class="bi bi-laptop text-white"></i> 100% Online Classes</div>
                </div>

                <!-- 2 CTA Buttons -->
                <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start">
                    <a href="{{ route('public.enquiry.create') }}" class="btn px-4 py-3 fw-bold rounded-pill shadow-lg" style="background: #ffffff; color: #0f5b57; border: none; font-size: 1.1rem; transition: transform 0.2s;">
                        Apply Now <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light px-4 py-3 fw-bold rounded-pill" style="border-width: 2px;">
                        <i class="bi bi-file-earmark-pdf-fill ms-2"></i> Download Brochure
                    </a>
                </div>
            </div>
            
            <!-- Lead Generation Form Box -->
            <div class="col-lg-4 d-none d-lg-block animate-slide-in delay-200">
                <div class="bg-white rounded-4 p-4 shadow-lg text-dark">
                    <h3 class="fw-bold mb-2 fs-4 text-center" style="color: #0f5b57;">Get Free Counselling</h3>
                    <p class="text-muted text-center mb-4 fs-7">Connect with our academic experts.</p>
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control rounded-pill px-4 py-2" placeholder="Full Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control rounded-pill px-4 py-2" placeholder="Email Address" required>
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control rounded-pill px-4 py-2" placeholder="Mobile Number" required>
                        </div>
                        <button type="button" class="btn w-100 rounded-pill py-2 text-white fw-bold shadow-sm" style="background: #c71585; border: none; font-size: 1.1rem;">Request Callback</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats / Trust Bar -->
<section class="py-4 bg-white border-bottom border-light">
    <div class="container">
        <div class="row text-center g-4 align-items-center">
            <div class="col-6 col-md-3 border-end">
                <h3 class="fs-3 fw-bold mb-1" style="color: #0f5b57;">50K+</h3>
                <p class="text-muted mb-0 fs-7 text-uppercase fw-semibold">Global Alumni</p>
            </div>
            <div class="col-6 col-md-3 border-end">
                <h3 class="fs-3 fw-bold mb-1" style="color: #0f5b57;">300+</h3>
                <p class="text-muted mb-0 fs-7 text-uppercase fw-semibold">Hiring Partners</p>
            </div>
            <div class="col-6 col-md-3 border-end">
                <h3 class="fs-3 fw-bold mb-1" style="color: #0f5b57;">100%</h3>
                <p class="text-muted mb-0 fs-7 text-uppercase fw-semibold">Placement Assist</p>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="fs-3 fw-bold mb-1" style="color: #0f5b57;">Top 10</h3>
                <p class="text-muted mb-0 fs-7 text-uppercase fw-semibold">University Ranking</p>
            </div>
        </div>
    </div>
</section>

<!-- 2️⃣ Admission Process (Step-by-Step with Arrow Flow) -->
<section class="py-5 bg-white">
    <div class="container my-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3 section-underline d-inline-block pb-2" style="font-family: 'Playfair Display', serif; color: #111827;">Easy Admission Process</h2>
            <p class="text-muted">Start your online journey in 6 simple steps.</p>
        </div>
        
        <div class="row text-center g-4 justify-content-center">
            
            <div class="col-12 col-md-4 col-lg-2 position-relative">
                <div class="step-line d-none d-lg-block"></div>
                <div class="step-circle mb-3 shadow">1</div>
                <h4 class="fs-6 fw-bold">Registration</h4>
                <p class="text-muted fs-7">Sign up and verify your basic details.</p>
            </div>
            <div class="col-12 col-md-4 col-lg-2 position-relative">
                <div class="step-line d-none d-lg-block"></div>
                <div class="step-circle mb-3 shadow">2</div>
                <h4 class="fs-6 fw-bold">Form Submission</h4>
                <p class="text-muted fs-7">Fill the application form carefully.</p>
            </div>
            <div class="col-12 col-md-4 col-lg-2 position-relative">
                <div class="step-line d-none d-lg-block"></div>
                <div class="step-circle mb-3 shadow">3</div>
                <h4 class="fs-6 fw-bold">Document Upload</h4>
                <p class="text-muted fs-7">Upload required academic credentials.</p>
            </div>
            <div class="col-12 col-md-4 col-lg-2 position-relative">
                <div class="step-line d-none d-lg-block"></div>
                <div class="step-circle mb-3 shadow">4</div>
                <h4 class="fs-6 fw-bold">Application Review</h4>
                <p class="text-muted fs-7">University reviews your application profile.</p>
            </div>
            <div class="col-12 col-md-4 col-lg-2 position-relative">
                <div class="step-line d-none d-lg-block"></div> 
                <div class="step-circle mb-3 shadow">5</div>
                <h4 class="fs-6 fw-bold">Fee Payment</h4>
                <p class="text-muted fs-7">Pay the initial fee to confirm the seat.</p>
            </div>
            <div class="col-12 col-md-4 col-lg-2 position-relative">
                <div class="step-circle mb-3 shadow" style="background: #c71585;">6</div> <!-- Final step highlighted -->
                <h4 class="fs-6 fw-bold text-pink">Enrollment Confirmed</h4>
                <p class="text-muted fs-7">Get enrolled and start your LMS access.</p>
            </div>
        </div>
    </div>
</section>

<!-- 3️⃣ Benefits of [University Name] Online -->
<section class="py-5 bg-white">
    <div class="container my-5">
        <div class="text-center text-lg-start mb-5">
            <h2 class="fw-bold mb-2" style="color: #0f5b57; font-family: 'Playfair Display', serif;">Benefits of {{ $university->name }} Online</h2>
            <p class="text-muted fs-5">Unlimited access to world class courses, hands-on projects, and job-ready certificate programs.</p>
        </div>
        
        <div class="row align-items-center g-4">
            <!-- Left Column: 3 Benefits -->
            <div class="col-lg-4">
                <div class="d-flex flex-column justify-content-between gap-4" style="min-height: 530px;">
                    <div class="card border-0 shadow-sm h-100" style="background-color: #f4fdfc; border: 1px solid rgba(15, 91, 87, 0.4) !important; border-radius: 6px;">
                        <div class="card-body p-4 d-flex align-items-center">
                            <p class="text-dark mb-0 fs-7 lh-lg text-center w-100" style="font-weight: 500;">
                                Recognized by UGC, AIU, WES, and others, the university holds an A+ NAAC accreditation and ranks as a top online university according to both NIRF and QS World Ranking.
                            </p>
                        </div>
                    </div>
                    <div class="card border-0 shadow-sm h-100" style="background-color: #f4fdfc; border: 1px solid rgba(15, 91, 87, 0.4) !important; border-radius: 6px;">
                        <div class="card-body p-4 d-flex align-items-center">
                            <p class="text-dark mb-0 fs-7 lh-lg text-center w-100" style="font-weight: 500;">
                                {{ $university->name }} Online is placed within the top 3% globally by QS, with its online MBA ranked #1 in India and #37 worldwide.
                            </p>
                        </div>
                    </div>
                    <div class="card border-0 shadow-sm h-100" style="background-color: #f4fdfc; border: 1px solid rgba(15, 91, 87, 0.4) !important; border-radius: 6px;">
                        <div class="card-body p-4 d-flex align-items-center">
                            <p class="text-dark mb-0 fs-7 lh-lg text-center w-100" style="font-weight: 500;">
                                The university offers global exposure through renowned international faculty members from diverse backgrounds.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Center Image Column -->
            <div class="col-lg-4 text-center d-none d-lg-block">
                <div class="position-relative d-inline-block" style="padding: 15px;">
                    <!-- Outer dashed border -->
                    <div class="position-absolute w-100 h-100 top-0 start-0" style="border: 1px dashed #0f5b57; border-radius: 170px; z-index: 1;"></div>
                    <!-- Inner image -->
                    <div class="position-relative overflow-hidden" style="border-radius: 150px; z-index: 2; height: 500px; width: 280px; margin: 0 auto; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                        <img src="{{ $university->banner_path ?? ($university->logo_path ?: 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&q=80') }}" 
                             alt="{{ $university->name }} Campus" 
                             class="w-100 h-100" 
                             style="object-fit: cover;">
                    </div>
                </div>
            </div>

            <!-- Right Column: 3 Benefits -->
            <div class="col-lg-4">
                <div class="d-flex flex-column justify-content-between gap-4" style="min-height: 530px;">
                    <div class="card border-0 shadow-sm h-100" style="background-color: #f4fdfc; border: 1px solid rgba(15, 91, 87, 0.4) !important; border-radius: 6px;">
                        <div class="card-body p-4 d-flex align-items-center">
                            <p class="text-dark mb-0 fs-7 lh-lg text-center w-100" style="font-weight: 500;">
                                Programs at {{ $university->name }} Online hold accreditation from WES in both the US and Canada.
                            </p>
                        </div>
                    </div>
                    <div class="card border-0 shadow-sm h-100" style="background-color: #f4fdfc; border: 1px solid rgba(15, 91, 87, 0.4) !important; border-radius: 6px;">
                        <div class="card-body p-4 d-flex align-items-center">
                            <p class="text-dark mb-0 fs-7 lh-lg text-center w-100" style="font-weight: 500;">
                                With over 300 hiring partners, the university facilitates placements through exclusive virtual job fairs.
                            </p>
                        </div>
                    </div>
                    <div class="card border-0 shadow-sm h-100" style="background-color: #f4fdfc; border: 1px solid rgba(15, 91, 87, 0.4) !important; border-radius: 6px;">
                        <div class="card-body p-4 d-flex align-items-center">
                            <p class="text-dark mb-0 fs-7 lh-lg text-center w-100" style="font-weight: 500;">
                                The university collaborates with top industry leaders to ensure high employability and future-ready graduates.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4️⃣ FAQs (Accordion / Dropdown Style) -->
<section class="py-5 bg-white">
    <div class="container my-4" style="max-width: 900px;">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3 section-underline d-inline-block pb-2" style="font-family: 'Playfair Display', serif; color: #111827;">Frequently Asked Questions</h2>
            <p class="text-muted">Everything you need to know about our online programs.</p>
        </div>
        
        <div class="accordion accordion-flush rounded-4 shadow-sm border p-2 p-md-4" id="universityFaq">
            <div class="accordion-item border-0 mb-3 bg-white border-bottom">
                <h2 class="accordion-header" id="faq-headingOne">
                    <button class="accordion-button fw-bold fs-5 bg-white text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapseOne" aria-expanded="false" aria-controls="faq-collapseOne">
                        Is the online degree from {{ $university->name }} valid?
                    </button>
                </h2>
                <div id="faq-collapseOne" class="accordion-collapse collapse" aria-labelledby="faq-headingOne" data-bs-parent="#universityFaq">
                    <div class="accordion-body text-muted lh-lg">
                        Yes, absolutely. The degree is officially entitled by UGC-DEB. It holds the exact same weightage and global recognition as a traditional on-campus degree. It is completely valid for Government exams, corporate jobs, and higher studies abroad.
                    </div>
                </div>
            </div>

            <div class="accordion-item border-0 mb-3 bg-white border-bottom">
                <h2 class="accordion-header" id="faq-headingTwo">
                    <button class="accordion-button fw-bold fs-5 bg-white text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapseTwo" aria-expanded="false" aria-controls="faq-collapseTwo">
                        What is the eligibility for the online MBA program?
                    </button>
                </h2>
                <div id="faq-collapseTwo" class="accordion-collapse collapse" aria-labelledby="faq-headingTwo" data-bs-parent="#universityFaq">
                    <div class="accordion-body text-muted lh-lg">
                        Candidates must possess a Bachelor's degree (minimum 3 years in duration) in any discipline from a recognized University. A minimum aggregate score of 50% (45% for reserved categories) is generally required. No prior work experience is mandatory.
                    </div>
                </div>
            </div>

            <div class="accordion-item border-0 mb-3 bg-white border-bottom">
                <h2 class="accordion-header" id="faq-headingThree">
                    <button class="accordion-button fw-bold fs-5 bg-white text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapseThree" aria-expanded="false" aria-controls="faq-collapseThree">
                        Are exams conducted online?
                    </button>
                </h2>
                <div id="faq-collapseThree" class="accordion-collapse collapse" aria-labelledby="faq-headingThree" data-bs-parent="#universityFaq">
                    <div class="accordion-body text-muted lh-lg">
                        Yes! The examination process is fully digitized and powered by AI-proctoring. You can securely take all your semester examinations from the comfort of your home at your scheduled date and time using a reliable internet connection and a webcam.
                    </div>
                </div>
            </div>

            <div class="accordion-item border-0 mb-3 bg-white border-bottom">
                <h2 class="accordion-header" id="faq-headingFour">
                    <button class="accordion-button fw-bold fs-5 bg-white text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapseFour" aria-expanded="false" aria-controls="faq-collapseFour">
                        Is placement assistance provided?
                    </button>
                </h2>
                <div id="faq-collapseFour" class="accordion-collapse collapse" aria-labelledby="faq-headingFour" data-bs-parent="#universityFaq">
                    <div class="accordion-body text-muted lh-lg">
                        We offer robust 100% placement assistance. As an enrolled learner, you get exclusive access to our career-services portal, invitations to virtual job fairs, resume-building workshops, and one-on-one interview preparation sessions led by industry experts.
                    </div>
                </div>
            </div>

            <div class="accordion-item border-0 mb-3 bg-white border-bottom">
                <h2 class="accordion-header" id="faq-headingFive">
                    <button class="accordion-button fw-bold fs-5 bg-white text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapseFive" aria-expanded="false" aria-controls="faq-collapseFive">
                        What is the fee structure and are there EMI options?
                    </button>
                </h2>
                <div id="faq-collapseFive" class="accordion-collapse collapse" aria-labelledby="faq-headingFive" data-bs-parent="#universityFaq">
                    <div class="accordion-body text-muted lh-lg">
                        The fee structure varies independently by the specialization chosen. However, we strive to make education affordable. No-cost EMIs, flexible semester-wise fee payments, and merit-based scholarship grants are actively available to ease financial stress.
                    </div>
                </div>
            </div>

            <div class="accordion-item border-0 bg-white">
                <h2 class="accordion-header" id="faq-headingSix">
                    <button class="accordion-button fw-bold fs-5 bg-white text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapseSix" aria-expanded="false" aria-controls="faq-collapseSix">
                        Do I need to visit the physical campus at any time?
                    </button>
                </h2>
                <div id="faq-collapseSix" class="accordion-collapse collapse" aria-labelledby="faq-headingSix" data-bs-parent="#universityFaq">
                    <div class="accordion-body text-muted lh-lg">
                        It is completely optional. The entire learning lifecycle—from application submission and daily classes to assignment submissions, exams, and degree graduation—is maintained 100% online.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 text-center" style="background: linear-gradient(135deg, rgba(15, 91, 87, 0.1) 0%, rgba(199, 21, 133, 0.1) 100%);">
    <div class="container animate-slide-in" style="max-width: 800px;">
        <h2 class="fs-2 fw-bold mb-3" style="color: #0f5b57; font-family: 'Playfair Display', serif;">Ready to Join {{ $university->name }}?</h2>
        <p class="text-muted mb-4 fs-5">Take the next big leap in your professional journey. Registration is now open for the current academic session.</p>
        <div class="d-flex flex-wrap gap-3 justify-content-center">
            <a href="{{ route('public.enquiry.create') }}" class="btn px-5 py-3 fw-semibold shadow-lg text-white" style="background-color: #c71585; border-radius: 50px; font-size: 1.1rem; transition: transform 0.2s;" aria-label="Start your application">
                Start My Application <i class="bi bi-arrow-right-circle ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- 
======================================================
5️⃣ UX & Conversion Strategy Suggestions (To Implement Later)
======================================================
1. Sticky Header / Floating CTA: 
   - Suggest adding a floating "Apply Now" button at the bottom of the viewport specifically on mobile.
   - When users scroll past the hero banner into FAQs, the floating CTA ensures a lead generation gateway is always visible.

2. Lead Capture Integration:
   - The form provided inside the Hero section should directly integrate with a CRM (e.g., Salesforce/Hubspot).
   - Use AJAX to submit silently so users don't have to leave the landing page.

3. Trust Signals Placement:
   - Physically insert high-quality PNG logos of "UGC", "DEB", "AICTE", "NAAC A+" directly below the Hero Section. 
   - Real, recognizable badges build immediate credibility compared to just text.
   - Add a scrolling carousel of "Top Recruiters" before the FAQ block.

4. Schema Markup for SEO:
   - Ensure the JSON-LD FAQPage Schema is dynamically mapped to the accordion items.
   - Inject EducationalOrganization JSON-LD in the document HEAD to help search engines instantly recognize it as a top-ranked university page.
======================================================
-->

@endsection