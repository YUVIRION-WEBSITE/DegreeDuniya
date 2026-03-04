@extends('components.layouts.public-layout')

@section('title', '{{ $college->name }} - EduConnect')

@section('head')
    <meta property="og:title" content="{{ $college->name }} - EduConnect">
    <meta property="og:description" content="Explore {{ $college->name }} on EduConnect. Discover its facilities, courses, and more.">
    <meta property="og:image" content="{{ $college->logo_path ? asset($college->logo_path) : 'https://via.placeholder.com/1200x630' }}">
    <meta name="twitter:card" content="summary_large_image">
    <!-- Google Fonts for Premium Look -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-primary: #c71585; /* Magento / Deep Pink */
            --color-primary-light: #fdf2f8; /* Soft pink bg */
            --color-primary-muted: #fce7f3; /* Slightly darker soft pink */
            --color-text-dark: #1e293b;
            --color-text-muted: #64748b;
            --color-accent: #f59e0b; /* Amber for CTA banner to complement magenta safely */
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--color-text-dark);
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
            color: var(--color-text-dark);
            font-weight: 700;
        }

        .section-padding { padding: 4rem 0; }
        .text-theme-primary { color: var(--color-primary) !important; }
        .bg-theme-primary { background-color: var(--color-primary) !important; }
        .bg-soft-pink { background-color: var(--color-primary-light); }
        
        /* Logos Section */
        .partner-logo {
            filter: grayscale(100%) opacity(0.6);
            transition: all 0.3s ease;
            max-height: 50px;
            object-fit: contain;
        }
        .partner-logo:hover {
            filter: grayscale(0%) opacity(1);
        }

        /* Courses Tabs */
        .course-nav-link {
            color: var(--color-text-muted);
            border: none;
            border-bottom: 2px solid transparent;
            background: transparent;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: all 0.2s ease;
            cursor: pointer;
        }
        .course-nav-link.active {
            color: var(--color-primary);
            border-bottom: 2px solid var(--color-primary);
        }
        .course-card-custom {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            background: #fff;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        .course-card-custom:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(199, 21, 133, 0.08);
            border-color: var(--color-primary-muted);
        }
        .course-card-custom img {
            height: 160px;
            object-fit: cover;
            width: 100%;
        }
        .btn-outline-theme {
            color: var(--color-text-dark);
            border: 1px solid #e2e8f0;
            background: transparent;
            border-radius: 6px;
            transition: all 0.3s;
            font-weight: 500;
        }
        .btn-outline-theme:hover {
            border-color: var(--color-primary);
            color: var(--color-primary);
        }

        /* Admission Steps */
        .admission-step {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }
        .step-number {
            width: 32px;
            height: 32px;
            min-width: 32px;
            background-color: var(--color-primary-light);
            color: var(--color-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.9rem;
            margin-right: 1.25rem;
            margin-top: 0.25rem;
        }

        /* Fees Table */
        .fees-table-wrapper {
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            background: #fff;
        }
        .table-custom {
            margin-bottom: 0;
            width: 100%;
        }
        .table-custom thead th {
            background-color: var(--color-text-dark);
            color: #fff;
            font-weight: 500;
            padding: 1.25rem 1rem;
            border: none;
        }
        .table-custom tbody tr {
            background-color: #fff;
        }
        .table-custom tbody tr:nth-of-type(odd) {
            background-color: #f8fafc;
        }
        .table-custom td {
            padding: 1rem;
            vertical-align: middle;
            border-top: 1px solid #e2e8f0;
            color: var(--color-text-dark);
        }

        /* Pill Layout Benefits */
        .pill-image-container {
            width: 100%;
            max-width: 250px;
            margin: 0 auto;
            border-radius: 120px;
            overflow: hidden;
            aspect-ratio: 1 / 2;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .pill-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .benefit-block {
            background: var(--color-primary-light);
            padding: 1.5rem;
            border-radius: 8px;
            border: 1px solid var(--color-primary-muted);
            height: 100%;
            display: flex;
            align-items: center;
        }

        /* Confused CTA */
        .cta-banner {
            background: var(--color-accent);
            border-radius: 12px;
            padding: 3rem;
            color: #fff;
            position: relative;
            overflow: hidden;
        }
        .cta-banner h2 {
            color: #fff;
        }
        .cta-btn {
            background-color: var(--color-text-dark);
            color: #fff;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s;
            display: inline-block;
        }
        .cta-btn:hover {
            background-color: #000;
            color: #fff;
        }

        /* Program Benefits List */
        .program-benefit-item {
            background: var(--color-primary-light);
            margin-bottom: 0.5rem;
            padding: 1.25rem 1.5rem;
            border-radius: 6px;
            font-size: 0.95rem;
            border: 1px solid var(--color-primary-muted);
        }
        
        .section-title {
            color: var(--color-text-dark);
        }
        .section-subtitle {
            color: var(--color-text-muted);
            font-size: 0.95rem;
            max-width: 800px;
        }

        /* College Hero Section */
        .college-hero {
            position: relative;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 6rem 0;
            color: #fff;
            min-height: 400px;
            display: flex;
            align-items: center;
        }
        .college-hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(to right, rgba(30, 41, 59, 0.9) 0%, rgba(30, 41, 59, 0.4) 100%);
            z-index: 1;
        }
        .college-hero-content {
            position: relative;
            z-index: 2;
        }
        .btn-theme-solid {
            background-color: var(--color-primary);
            color: #fff;
            border: none;
            transition: all 0.3s;
        }
        .btn-theme-solid:hover {
            background-color: #a3106d; /* Darker shade of #c71585 */
            color: #fff;
            transform: translateY(-2px);
        }

        /* Sticky Sidebar Navigation */
        .sticky-wrapper {
            position: sticky;
            top: 100px;
            z-index: 100;
        }
        .sidebar-nav .nav-link {
            padding: 0.75rem 1rem;
            color: var(--color-text-muted);
            font-weight: 500;
            border-left: 3px solid transparent;
            transition: all 0.2s ease;
            font-size: 0.9rem;
        }
        .sidebar-nav .nav-link:hover {
            color: var(--color-primary);
            background-color: var(--color-primary-light);
        }
        .sidebar-nav .nav-link.active {
            color: var(--color-primary);
            font-weight: 700;
            border-left-color: var(--color-primary);
            background-color: var(--color-primary-light);
        }

        /* Mobile Horizontal Nav */
        @media (max-width: 991.98px) {
            .mobile-nav-wrapper {
                position: sticky;
                top: 70px;
                background: #fff;
                z-index: 1000;
                border-bottom: 1px solid #e2e8f0;
                margin-bottom: 1rem;
            }
            .mobile-nav {
                display: flex;
                overflow-x: auto;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
                padding: 0.5rem 0;
            }
            .mobile-nav::-webkit-scrollbar {
                display: none;
            }
            .mobile-nav .nav-link {
                padding: 0.5rem 1.25rem;
                font-size: 0.85rem;
                color: var(--color-text-muted);
                border-bottom: 2px solid transparent;
            }
            .mobile-nav .nav-link.active {
                color: var(--color-primary);
                font-weight: 700;
                border-bottom-color: var(--color-primary);
            }
        }
    </style>
@endsection

@section('content')
    <div style="background-color: #fff;">
        <!-- 0️⃣ College Hero Banner -->
        <section class="college-hero" style="background-image: url('{{ $college->banner_path ?? 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&q=80' }}');">
            <div class="container college-hero-content">
                <div class="row">
                    <div class="col-lg-8">
                        <span class="badge mb-3 px-3 py-2 rounded-pill fs-7 fw-medium shadow-sm" style="background-color: var(--color-primary);">Admissions Open {{ date('Y') }}</span>
                        <h1 class="display-4 fw-bold text-white mb-3">{{ $college->name ?? 'Amity University Online' }}</h1>
                        <p class="fs-5 text-white text-opacity-75 mb-4" style="max-width: 600px; font-family: 'Poppins', sans-serif;">{{ $college->tagline ?? 'Empowering your career with world-class online education and industry-aligned programs.' }}</p>
                        <div class="d-flex flex-wrap gap-3 mt-4">
                            <a href="{{ route('public.enquiry.create') }}" class="btn btn-theme-solid px-4 py-2 fw-medium rounded-3 shadow text-decoration-none">Apply Now</a>
                            <a href="#courses" class="btn btn-outline-light px-4 py-2 fw-medium rounded-3 shadow text-decoration-none transition">Explore Courses</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container py-4">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="sticky-wrapper">
                        <nav class="sidebar-nav flex-column nav">
                            <a class="nav-link" href="#rankings">Rankings</a>
                            <a class="nav-link" href="#courses">Courses</a>
                            <a class="nav-link" href="#admission-process">Admission Process</a>
                            <a class="nav-link" href="#fees">Course Fees</a>
                            <a class="nav-link" href="#benefits">College Benefits</a>
                            <a class="nav-link" href="#confused">Compare Colleges</a>
                            <a class="nav-link" href="#program-benefits">Program Benefits</a>
                            <a class="nav-link" href="#hiring-partner">Hiring Partners</a>
                            <a class="nav-link" href="#faq">FAQs</a>
                        </nav>
                    </div>
                </div>

                <!-- Content -->
                <div class="col-lg-9">
                    <!-- Mobile Nav -->
                    <div class="mobile-nav-wrapper d-lg-none">
                        <nav class="mobile-nav">
                            <a class="nav-link" href="#rankings">Rankings</a>
                            <a class="nav-link" href="#courses">Courses</a>
                            <a class="nav-link" href="#admission-process">Admission</a>
                            <a class="nav-link" href="#fees">Fees</a>
                            <a class="nav-link" href="#benefits">Benefits</a>
                            <a class="nav-link" href="#confused">Compare</a>
                            <a class="nav-link" href="#program-benefits">Programs</a>
                            <a class="nav-link" href="#hiring-partner">Hiring</a>
                            <a class="nav-link" href="#faq">FAQ</a>
                        </nav>
                    </div>

                    <!-- 1️⃣ Rankings & Accreditations -->
                    <section id="rankings" class="py-5 border-bottom">
            <div class="container">
                <h3 class="mb-4 section-title fs-4">Rankings & Accreditations</h3>
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-4">
                    <img src="https://www.nirfindia.org/Images/main-logo.png" class="partner-logo" alt="NIRF" style="height: 35px;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/UGC_India_Logo.png/800px-UGC_India_Logo.png" class="partner-logo" alt="UGC" style="height: 40px;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/NAAC_LOGO.png/600px-NAAC_LOGO.png" class="partner-logo" alt="NAAC" style="height: 45px;">
                    <img src="https://www.aicte.gov.in/sites/default/files/inline-images/Logo.png" class="partner-logo" alt="AICTE" style="height: 40px;">
                    <img src="https://www.wes.org/wp-content/themes/storyware/assets/images/logo.svg" class="partner-logo" alt="WES" style="height: 35px;">
                </div>
            </div>
        </section>

        <!-- 2️⃣ Courses -->
        <section id="courses" class="section-padding">
            <div class="container">
                <h2 class="mb-2 section-title">Courses</h2>
                <p class="section-subtitle mb-4">Unlimited access to world class courses, hands-on projects, and job-ready certificate programs.</p>

                <!-- Tabs -->
                <div class="d-flex border-bottom mb-4">
                    <button class="course-nav-link active me-3">Post Graduate (PG)</button>
                    <button class="course-nav-link">Undergraduate (UG)</button>
                </div>

                <!-- Tab Content Grid -->
                <div class="row g-4 mb-4">
                    @php
                        // Mocking data based on image provided structure if it doesn't exist
                        $dummyCourses = [
                            ['name' => 'Master of Business Administration', 'duration' => '2 years', 'fee' => '1,50,000'],
                            ['name' => 'Master of Computer Applications', 'duration' => '2 years', 'fee' => '1,60,000'],
                            ['name' => 'Master of Commerce', 'duration' => '2 years', 'fee' => '1,10,000'],
                            ['name' => 'Master of Arts (Journalism)', 'duration' => '2 years', 'fee' => '1,20,000'],
                        ];
                    @endphp
                    @foreach($dummyCourses as $index => $c)
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="course-card-custom cursor-pointer">
                                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=80&w=400" alt="{{ $c['name'] }}">
                                <div class="p-4 d-flex flex-column flex-grow-1">
                                    <h5 class="fs-6 mb-3 fw-bold lh-base flex-grow-1">{{ $c['name'] }}</h5>
                                    
                                    <div class="d-flex align-items-center mb-2 fs-7 text-muted">
                                        <i class="bi bi-clock me-2"></i> Duration: {{ $c['duration'] }}
                                    </div>
                                    <div class="d-flex align-items-center mb-4 fs-7 text-dark fw-medium">
                                        <i class="bi bi-currency-rupee me-2"></i> Fee up to {{ $c['fee'] }}/-
                                    </div>
                                    
                                    <button class="btn btn-outline-theme w-100 py-2 fs-7 mt-auto">Explore</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="d-flex justify-content-between text-muted px-2 cursor-pointer">
                    <i class="bi bi-arrow-left fs-5"></i>
                    <i class="bi bi-arrow-right fs-5"></i>
                </div>
            </div>
        </section>

        <!-- 3️⃣ Admission Process -->
        <section id="admission-process" class="section-padding bg-soft-pink">
            <div class="container">
                <h2 class="mb-2 section-title">Admission Process of {{ $college->name ?? 'Amity University Online' }}</h2>
                <p class="section-subtitle mb-5">Unlimited access to world class courses, hands-on projects, and job-ready certificate programs.</p>

                <div class="max-w-4xl">
                    <div class="admission-step">
                        <div class="step-number">1</div>
                        <div>
                            <p class="mb-0 text-dark">Visit the official website of {{ $college->name ?? 'Amity University' }} Online. Ensure the website URL is real and not a spammy site.</p>
                        </div>
                    </div>
                    <div class="admission-step">
                        <div class="step-number">2</div>
                        <div>
                            <p class="mb-0 text-dark">Look out and click on the "Apply Now" link tab on the homepage browser.</p>
                        </div>
                    </div>
                    <div class="admission-step">
                        <div class="step-number">3</div>
                        <div>
                            <p class="mb-0 text-dark">Register with basic personal and contact details. Fill out the application form with correct details.</p>
                        </div>
                    </div>
                    <div class="admission-step">
                        <div class="step-number">4</div>
                        <div>
                            <p class="mb-0 text-dark">Upload scanned documents of eligibility certificates, id proof, passport size photograph, signature.</p>
                        </div>
                    </div>
                    <div class="admission-step">
                        <div class="step-number">5</div>
                        <div>
                            <p class="mb-0 text-dark">Complete the transaction via desired process by paying the required application fee.</p>
                        </div>
                    </div>
                    <div class="admission-step">
                        <div class="step-number">6</div>
                        <div>
                            <p class="mb-0 text-dark">Once application is reviewed and documents are verified, you will receive confirmation of enrollment.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4️⃣ Updated Fees Table -->
        <section id="fees" class="section-padding">
            <div class="container">
                <h2 class="mb-2 section-title">Updated Fees for Each Courses in {{ date('Y') }}</h2>
                <p class="section-subtitle mb-4">Unlimited access to world class courses, hands-on projects, and job-ready certificate programs.</p>

                <div class="table-responsive fees-table-wrapper">
                    <table class="table table-custom mb-0">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 40%">Courses</th>
                                <th scope="col" style="width: 30%">Fees</th>
                                <th scope="col" style="width: 30%">Years</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-medium font-poppins">Online MBA</td>
                                <td>Rs 2,50,000</td>
                                <td>2 years</td>
                            </tr>
                            <tr>
                                <td class="fw-medium font-poppins">Online MSC</td>
                                <td>Rs 2,50,000</td>
                                <td>2 years</td>
                            </tr>
                            <tr>
                                <td class="fw-medium font-poppins">Online BBA</td>
                                <td>Rs 1,60,000</td>
                                <td>3 years</td>
                            </tr>
                            <tr>
                                <td class="fw-medium font-poppins">Online MCA</td>
                                <td>Rs 1,90,000</td>
                                <td>2 years</td>
                            </tr>
                            <tr>
                                <td class="fw-medium font-poppins">Online BCA</td>
                                <td>Rs 1,30,000</td>
                                <td>3 years</td>
                            </tr>
                            <tr>
                                <td class="fw-medium font-poppins">Online MA</td>
                                <td>Rs 1,20,000</td>
                                <td>2 years</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- 5️⃣ Benefits with Pill Image -->
        <section id="benefits" class="section-padding bg-soft-pink">
            <div class="container">
                <h2 class="mb-2 section-title">Benefits of {{ $college->name ?? 'Amity University Online' }}</h2>
                <p class="section-subtitle mb-5">Unlimited access to world class courses, hands-on projects, and job-ready certificate programs.</p>

                <div class="row align-items-stretch g-4">
                    <!-- Left Column -->
                    <div class="col-lg-4 d-flex flex-column gap-3 justify-content-between">
                        <div class="benefit-block shadow-sm">
                            <p class="mb-0 fs-7 text-dark fw-medium lh-lg">Recognized by UGC, NAAC, AICTE. Ensures your degree holds strong value and matches regular campus courses exactly.</p>
                        </div>
                        <div class="benefit-block shadow-sm">
                            <p class="mb-0 fs-7 text-dark fw-medium lh-lg">Ranked top 3% globally by QS, reflecting the exceptional quality and standard of education.</p>
                        </div>
                        <div class="benefit-block shadow-sm">
                            <p class="mb-0 fs-7 text-dark fw-medium lh-lg">The university offers global exposure through advanced online tools led by an international faculty.</p>
                        </div>
                    </div>

                    <!-- Center Image (Pill) -->
                    <div class="col-lg-4 d-flex justify-content-center align-items-center py-4 py-lg-0">
                        <div class="pill-image-container my-auto">
                            <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&q=80" alt="Campus">
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-lg-4 d-flex flex-column gap-3 justify-content-between">
                        <div class="benefit-block shadow-sm">
                            <p class="mb-0 fs-7 text-dark fw-medium lh-lg">They are the only university offering fully interactive learning directly from home.</p>
                        </div>
                        <div class="benefit-block shadow-sm">
                            <p class="mb-0 fs-7 text-dark fw-medium lh-lg">Easy fee financing options make {{ $college->name ?? 'Amity University Online' }} the top choice for working professionals.</p>
                        </div>
                        <div class="benefit-block shadow-sm">
                            <p class="mb-0 fs-7 text-dark fw-medium lh-lg">The university partnered with top industry leaders to build career-ready modules.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6️⃣ Confused between colleges? CTA -->
        <section id="confused" class="section-padding">
            <div class="container">
                <div class="cta-banner row align-items-center shadow-sm">
                    <div class="col-lg-7 py-2 position-relative z-1">
                        <h2 class="mb-3 fw-bold">Confused between colleges?</h2>
                        <p class="mb-4 text-white text-opacity-75 fs-6 lh-lg pe-lg-5">Compare and list colleges that you prefer. To assure that they recommend choose the best that fits you, we connect you with the best forward.</p>
                        <a href="{{ route('public.colleges.index') }}" class="cta-btn text-decoration-none shadow-sm">Compare Colleges</a>
                    </div>
                    <!-- Absolute position decorative images for larger screens -->
                    <div class="d-none d-lg-block position-absolute end-0 top-0 h-100 w-50 pe-4 z-0">
                        <div class="d-flex gap-3 justify-content-end align-items-center h-100">
                             <img src="https://images.unsplash.com/photo-1541829070764-84a7d30dd3f3?auto=format&fit=crop&w=200&q=80" alt="Building 1" class="rounded shadow-lg" style="height: 140px; width: 140px; object-fit: cover;">
                             <img src="https://images.unsplash.com/photo-1689595289774-26ab69a5b106?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Y29sbGdlJTIwYnVpbGRpbmd8ZW58MHx8MHx8fDA%3D" alt="Building 2" class="rounded shadow-lg" style="height: 140px; width: 140px; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 7️⃣ Program Benefits -->
        <section id="program-benefits" class="section-padding pt-0">
            <div class="container">
                <h2 class="mb-2 section-title">{{ $college->name ?? 'Amity University Online' }}'s Program Benefits</h2>
                <p class="section-subtitle mb-5">Amity University Online offers UGC-accredited online degrees, diplomas, and certifications in India, providing learners with a digitally advanced platform and globally recognized education designed to meet modern industry needs and support career growth.</p>

                <div class="row align-items-center g-5">
                    <div class="col-lg-4 text-center">
                        <img src="https://images.unsplash.com/photo-1584445584400-1a7cc5de77ae?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fGNlcnRpZmljYXRlfGVufDB8fDB8fHww" alt="Certificate mock" class="img-fluid rounded shadow-sm border p-2 bg-white" style="max-height: 400px; object-fit: contain;">
                    </div>
                    <div class="col-lg-8">
                        <div class="d-flex flex-column gap-3">
                            <div class="program-benefit-item shadow-sm text-dark fw-medium lh-base">
                                Fully backed by UGC approved online programs
                            </div>
                            <div class="program-benefit-item shadow-sm text-dark fw-medium lh-base">
                                Ranked among the top 3% of universities globally
                            </div>
                            <div class="program-benefit-item shadow-sm text-dark fw-medium lh-base">
                                Supports IT & Tech infrastructure standard globally
                            </div>
                            <div class="program-benefit-item shadow-sm text-dark fw-medium lh-base">
                                Alumni in top tier global brands worldwide ranking
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 8️⃣ Hiring Partner -->
        <section id="hiring-partner" class="py-5" style="background-color: #f8fafc;">
            <div class="container text-center">
                <h3 class="mb-2 section-title fs-4">Hiring Partner of {{ $college->name ?? 'Amity University Online' }}</h3>
                <p class="section-subtitle mb-5 mx-auto text-center" style="max-width: 600px;">Unlimited access to world class courses, hands-on projects, and job-ready certificate programs.</p>
                
                <div class="d-flex flex-wrap justify-content-center align-items-center gap-4 gap-lg-5 pb-3">
                    <!-- Note: For production these should be actual logos. Using text fallbacks styled as logos for now if images don't load -->
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/800px-Google_2015_logo.svg.png" class="partner-logo" alt="Google" style="height: 30px;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Amazon_logo.svg/1024px-Amazon_logo.svg.png" class="partner-logo" alt="Amazon" style="height: 30px;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Microsoft_logo_%282012%29.svg/1024px-Microsoft_logo_%282012%29.svg.png" class="partner-logo" alt="Microsoft" style="height: 30px;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Tata_Consultancy_Services_Logo.svg/1024px-Tata_Consultancy_Services_Logo.svg.png" class="partner-logo" alt="TCS" style="height: 30px;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Cognizant_logo_2022.svg/1024px-Cognizant_logo_2022.svg.png" class="partner-logo" alt="Cognizant" style="height: 25px;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Infosys_logo.svg/1024px-Infosys_logo.svg.png" class="partner-logo" alt="Infosys" style="height: 35px;">
                </div>
            </div>
        </section>

        <!-- 9️⃣ FAQs -->
        <section id="faq" class="py-5 bg-white">
            <div class="container my-4" style="max-width: 900px;">
                <div class="text-center mb-5">
                    <h2 class="fw-bold mb-3 section-underline d-inline-block pb-2" style="font-family: 'Playfair Display', serif; color: #111827;">Frequently Asked Questions</h2>
                    <p class="text-muted">Everything you need to know about our online programs.</p>
                </div>
                
                <div class="accordion accordion-flush rounded-4 shadow-sm border p-2 p-md-4" id="universityFaq">
                    <div class="accordion-item border-0 mb-3 bg-white border-bottom">
                        <h2 class="accordion-header" id="faq-headingOne">
                            <button class="accordion-button fw-bold fs-5 bg-white text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapseOne" aria-expanded="false" aria-controls="faq-collapseOne">
                                Is the online degree from {{ $college->name ?? 'Amity University Online' }} valid?
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
    </div>
</div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.sidebar-nav .nav-link, .mobile-nav .nav-link');

    // Scrollspy logic
    const observerOptions = {
        root: null,
        rootMargin: '-20% 0px -70% 0px',
        threshold: 0
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const id = entry.target.getAttribute('id');
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${id}`) {
                        link.classList.add('active');
                        // Auto-scroll mobile nav
                        if (link.closest('.mobile-nav')) {
                            link.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                        }
                    }
                });
            }
        });
    }, observerOptions);

    sections.forEach(section => {
        observer.observe(section);
    });

    // Smooth scroll for nav links
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                const navHeight = 100;
                window.scrollTo({
                    top: targetSection.offsetTop - navHeight,
                    behavior: 'smooth'
                });
            }
        });
    });
});
</script>
@endsection
