@extends('components.layouts.public-layout')

@section('title', 'Enquiry - EduConnect')

@section('content')
    <!-- Enquiry Section -->
    <section class="py-5 bg-white">
        <div class="container" style="max-width: 1280px;">
            <h2 class="fs-3 fs-sm-2 fw-bold text-primary text-center mb-4 animate-slide-in">Make an Enquiry</h2>

            <!-- ✅ Success / Error Message Section -->
            @if (session('success'))
                <div class="alert alert-success text-center fw-semibold animate-slide-in mb-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger text-center fw-semibold animate-slide-in mb-3" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <div class="mx-auto" style="max-width: 600px;">
                <form action="{{ route('public.enquiry.store') }}" method="POST" class="d-flex flex-column gap-4">
                    @csrf
                    <div class="animate-slide-in delay-100">
                        <label for="name" class="block fs-6 fw-medium text-dark">Name</label>
                        <input type="text" id="name" name="name" required
                            class="w-100 p-2 border border-secondary-subtle rounded-3 bg-white dark:bg-background-dark dark:border-gray-600 dark:text-dark focus:outline-none focus:border-primary focus:shadow-[0_0_0_3px_rgba(199,21,133,0.2)]"
                            placeholder="Your Name" aria-label="Your full name">
                        @error('name')
                            <span class="text-danger fs-7" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="animate-slide-in delay-100">
                        <label for="email" class="block fs-6 fw-medium text-dark">Email</label>
                        <input type="email" id="email" name="email" required
                            class="w-100 p-2 border border-secondary-subtle rounded-3 bg-white dark:bg-background-dark dark:border-gray-600 dark:text-dark focus:outline-none focus:border-primary focus:shadow-[0_0_0_3px_rgba(199,21,133,0.2)]"
                            placeholder="your@email.com" aria-label="Your email address">
                        @error('email')
                            <span class="text-danger fs-7" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="animate-slide-in delay-100">
                        <label for="phone" class="block fs-6 fw-medium text-dark">Phone (Optional)</label>
                        <input type="tel" id="phone" name="phone"
                            class="w-100 p-2 border border-secondary-subtle rounded-3 bg-white dark:bg-background-dark dark:border-gray-600 dark:text-dark focus:outline-none focus:border-primary focus:shadow-[0_0_0_3px_rgba(199,21,133,0.2)]"
                            placeholder="Your Phone Number" aria-label="Your phone number">
                        @error('phone')
                            <span class="text-danger fs-7" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="animate-slide-in delay-200">
                        <label for="university" class="block fs-6 fw-medium text-dark">University (Optional)</label>
                        <select id="university" name="university_id"
                            class="w-100 p-2 border border-secondary-subtle rounded-3 bg-white dark:bg-background-dark dark:border-gray-600 dark:text-dark focus:outline-none focus:border-primary focus:shadow-[0_0_0_3px_rgba(199,21,133,0.2)]"
                            onchange="updateColleges()" aria-label="Select a university">
                            <option value="">Select a University</option>
                            @foreach ($universities as $university)
                                <option value="{{ $university->id }}">{{ $university->name }}</option>
                            @endforeach
                        </select>
                        @error('university_id')
                            <span class="text-danger fs-7" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="animate-slide-in delay-200">
                        <label for="college" class="block fs-6 fw-medium text-dark">College (Optional)</label>
                        <select id="college" name="college_id"
                            class="w-100 p-2 border border-secondary-subtle rounded-3 bg-white dark:bg-background-dark dark:border-gray-600 dark:text-dark focus:outline-none focus:border-primary focus:shadow-[0_0_0_3px_rgba(199,21,133,0.2)]"
                            onchange="updateCourses()" aria-label="Select a college">
                            <option value="">Select a College</option>
                        </select>
                        @error('college_id')
                            <span class="text-danger fs-7" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="animate-slide-in delay-200">
                        <label for="course" class="block fs-6 fw-medium text-dark">Course (Optional)</label>
                        <select id="course" name="course_id"
                            class="w-100 p-2 border border-secondary-subtle rounded-3 bg-white dark:bg-background-dark dark:border-gray-600 dark:text-dark focus:outline-none focus:border-primary focus:shadow-[0_0_0_3px_rgba(199,21,133,0.2)]"
                            aria-label="Select a course">
                            <option value="">Select a Course</option>
                        </select>
                        @error('course_id')
                            <span class="text-danger fs-7" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="animate-slide-in delay-300">
                        <label for="message" class="block fs-6 fw-medium text-dark">Message</label>
                        <textarea id="message" name="message" rows="4" required
                            class="w-100 p-2 border border-secondary-subtle rounded-3 bg-white dark:bg-background-dark dark:border-gray-600 dark:text-dark focus:outline-none focus:border-primary focus:shadow-[0_0_0_3px_rgba(199,21,133,0.2)]"
                            placeholder="Your Enquiry" aria-label="Your enquiry message"></textarea>
                        @error('message')
                            <span class="text-danger fs-7" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit"
                        class="btn btn-apply fw-semibold shadow animate-slide-in delay-300"
                        style="height: 40px; padding: 0 20px; transition: all 0.3s ease;"
                        aria-label="Submit your enquiry">
                        Submit Enquiry
                    </button>
                </form>
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

        // ✅ Auto-hide alert messages after 4 seconds
        document.addEventListener("DOMContentLoaded", () => {
            const alertBox = document.querySelector('.alert');
            if (alertBox) {
                setTimeout(() => {
                    alertBox.style.transition = "opacity 0.5s ease";
                    alertBox.style.opacity = "0";
                    setTimeout(() => alertBox.remove(), 500);
                }, 4000);
            }
        });
    </script>
@endsection
