@extends('components.layouts.public-layout')

@section('title', 'Enquiry - EduConnect')

@section('content')
    <style>
        :root {
            --color-primary: #c71585;
            --color-primary-light: rgba(199, 21, 133, 0.05);
            --color-primary-soft: rgba(199, 21, 133, 0.1);
            --color-text-main: #1e293b;
            --color-text-muted: #64748b;
        }

        .enquiry-hero {
            position: relative;
            background-color: #fff;
            overflow: hidden;
            padding: 80px 0;
        }

        /* Subtle SVG Background Shape */
        .enquiry-bg-shape {
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
            opacity: 0.6;
        }

        .form-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            padding: 40px;
            position: relative;
            z-index: 10;
        }

        .form-header h2 {
            font-family: 'Playfair Display', serif;
            color: var(--color-text-main);
            font-weight: 700;
            margin-bottom: 30px;
        }

        .input-group-custom {
            margin-bottom: 24px;
        }

        .input-group-custom label {
            display: block;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--color-text-main);
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--color-text-muted);
            font-size: 1.1rem;
        }

        .input-wrapper input, 
        .input-wrapper select, 
        .input-wrapper textarea {
            width: 100%;
            padding: 12px 12px 12px 48px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        .input-wrapper textarea {
            padding-left: 16px;
        }

        .input-wrapper input:focus, 
        .input-wrapper select:focus, 
        .input-wrapper textarea:focus {
            outline: none;
            border-color: var(--color-primary);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(199, 21, 133, 0.1);
        }

        .btn-premium {
            background-color: var(--color-primary);
            color: #fff;
            border: none;
            padding: 14px 24px;
            border-radius: 10px;
            font-weight: 700;
            width: 100%;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-premium:hover {
            background-color: #a3106d;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(199, 21, 133, 0.2);
            color: #fff;
        }

        .trust-text {
            text-align: center;
            font-size: 0.85rem;
            color: var(--color-text-muted);
            margin-top: 16px;
        }

        .trust-points {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 24px;
            flex-wrap: wrap;
        }

        .trust-point {
            font-size: 0.8rem;
            font-weight: 600;
            color: #10b981; /* Success Green */
        }

        .illustration-col {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 10;
        }

        .illustration-img {
            max-width: 100%;
            height: auto;
            border-radius: 20px;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }

        .error-msg {
            font-size: 0.75rem;
            color: #ef4444;
            margin-top: 4px;
            display: none;
        }

        @media (max-width: 991.98px) {
            .enquiry-hero { padding: 40px 0; }
            .illustration-col { margin-bottom: 40px; order: -1; }
            .form-card { padding: 30px 20px; }
        }
    </style>

    <!-- Enquiry Section -->
    <section class="enquiry-hero">
        <!-- SVG Background Shapes -->
        <div class="enquiry-bg-shape">
            <svg viewBox="0 0 1440 800" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
                <circle cx="1200" cy="100" r="300" fill="var(--color-primary-light)" />
                <path d="M0 600C300 500 600 700 900 600C1200 500 1440 600 1440 600V800H0V600Z" fill="var(--color-primary-soft)" />
            </svg>
        </div>

        <div class="container" style="max-width: 1200px;">
            <div class="row align-items-center g-5">
                <!-- Left Column: Form -->
                <div class="col-lg-7">
                    <!-- ✅ Success / Error Message -->
                    @if (session('success'))
                        <div class="alert alert-success border-0 shadow-sm text-center fw-semibold mb-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="form-card">
                        <div class="form-header">
                            <h2 class="fs-2 text-center">Get Free Admission Counselling</h2>
                        </div>

                        <form id="enquiryForm" action="{{ route('public.enquiry.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- Name -->
                                <div class="col-md-6 input-group-custom">
                                    <label for="name">Full Name</label>
                                    <div class="input-wrapper">
                                        <i class="bi bi-person"></i>
                                        <input type="text" id="name" name="name" placeholder="John Doe" required>
                                    </div>
                                    <div class="error-msg" id="error-name">Please enter your name</div>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6 input-group-custom">
                                    <label for="email">Email Address</label>
                                    <div class="input-wrapper">
                                        <i class="bi bi-envelope"></i>
                                        <input type="email" id="email" name="email" placeholder="john@example.com" required>
                                    </div>
                                    <div class="error-msg" id="error-email">Please enter a valid email</div>
                                </div>

                                <!-- Phone -->
                                <div class="col-md-12 input-group-custom">
                                    <label for="phone">Phone Number</label>
                                    <div class="input-wrapper">
                                        <i class="bi bi-telephone"></i>
                                        <input type="tel" id="phone" name="phone" placeholder="+91 00000 00000">
                                    </div>
                                    <div class="error-msg" id="error-phone">Invalid phone number</div>
                                </div>

                                <!-- University -->
                                <div class="col-md-6 input-group-custom">
                                    <label for="university">Select University</label>
                                    <div class="input-wrapper">
                                        <i class="bi bi-bank"></i>
                                        <select id="university" name="university_id" onchange="updateColleges()">
                                            <option value="">Choose University</option>
                                            @foreach ($universities as $university)
                                                <option value="{{ $university->id }}">{{ $university->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- College -->
                                <div class="col-md-6 input-group-custom">
                                    <label for="college">Select College</label>
                                    <div class="input-wrapper">
                                        <i class="bi bi-building"></i>
                                        <select id="college" name="college_id">
                                            <option value="">Choose College</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Message -->
                                <div class="col-md-12 input-group-custom">
                                    <label for="message">Your Message</label>
                                    <div class="input-wrapper">
                                        <textarea id="message" name="message" rows="3" placeholder="Tell us about your career goals..." required></textarea>
                                    </div>
                                    <div class="error-msg" id="error-message">Message cannot be empty</div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-premium shadow-sm">
                                Request Free Counselling
                            </button>

                            <p class="trust-text">
                                <i class="bi bi-shield-check me-1"></i> Our admission experts will contact you within 24 hours.
                            </p>

                            <div class="trust-points">
                                <span class="trust-point"><i class="bi bi-check2-circle me-1"></i> 100+ Partner Universities</span>
                                <span class="trust-point"><i class="bi bi-check2-circle me-1"></i> Free Career Guidance</span>
                                <span class="trust-point"><i class="bi bi-check2-circle me-1"></i> Trusted by Thousands</span>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right Column: Illustration -->
                <div class="col-lg-5 illustration-col">
                    <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&q=80&w=800" 
                         alt="Counselling Illustration" 
                         class="illustration-img shadow-lg">
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        function updateColleges() {
            const universityId = document.getElementById('university').value;
            const collegeSelect = document.getElementById('college');
            const courseSelect = document.getElementById('course');

            collegeSelect.innerHTML = '<option value="">Select a College</option>';
            courseSelect.innerHTML = '<option value="">Select a Course</option>';

            if (universityId) {
                fetch(`/public/universities/${universityId}/colleges`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(college => {
                            const option = document.createElement('option');
                            option.value = college.id;
                            option.textContent = college.name;
                            collegeSelect.appendChild(option);
                        });
                    });
            }
        }

        function updateCourses() {
            const collegeId = document.getElementById('college').value;
            const courseSelect = document.getElementById('course');

            courseSelect.innerHTML = '<option value="">Select a Course</option>';

            if (collegeId) {
                fetch(`/public/colleges/${collegeId}/courses`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(course => {
                            const option = document.createElement('option');
                            option.value = course.id;
                            option.textContent = course.name;
                            courseSelect.appendChild(option);
                        });
                    });
            }
        }

        // ✅ Client-side validation
        const form = document.getElementById('enquiryForm');
        const inputs = form.querySelectorAll('input[required], textarea[required]');

        form.addEventListener('submit', (e) => {
            let isValid = true;

            inputs.forEach(input => {
                const errorId = `error-${input.id}`;
                const errorElement = document.getElementById(errorId);

                if (!input.value.trim()) {
                    isValid = false;
                    errorElement.style.display = 'block';
                    input.style.borderColor = '#ef4444';
                } else if (input.type === 'email' && !validateEmail(input.value)) {
                    isValid = false;
                    errorElement.textContent = 'Please enter a valid email address';
                    errorElement.style.display = 'block';
                    input.style.borderColor = '#ef4444';
                } else {
                    errorElement.style.display = 'none';
                    input.style.borderColor = '#e2e8f0';
                }
            });

            if (!isValid) {
                e.preventDefault();
            }
        });

        function validateEmail(email) {
            return String(email)
                .toLowerCase()
                .match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
        }

        inputs.forEach(input => {
            input.addEventListener('input', () => {
                const errorId = `error-${input.id}`;
                const errorElement = document.getElementById(errorId);
                errorElement.style.display = 'none';
                input.style.borderColor = '#e2e8f0';
            });
        });
    </script>
@endsection
