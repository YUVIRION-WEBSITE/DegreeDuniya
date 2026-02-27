{{-- public/homeSections/contact.blade.php --}}
<div class="contact-parallax-wrapper">
    <!-- Parallax Background Section -->
  {{-- True Parallax Contact Section - exactly like goyalgroupofeducation.com --}}
<section class="parallax-contact-section position-relative">
    <!-- Dark overlay for readability -->
    <div class="parallax-overlay"></div>

    <!-- Main content -->
    <div class="container position-relative" style="z-index: 2; padding: 100px 15px;">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Header -->
                <div class="text-center text-white mb-5 scroll-reveal">
                    <h2 class="display-4 fw-bold">Let's Start Your Journey</h2>
                    <p class="lead">Reach out to us and take the first step towards your dream university</p>
                </div>

               <div class="row">
                    <!-- Contact Form -->
                    <div class="col-lg-7 mb-4 mb-lg-0">
                        <div class="contact-card scroll-reveal">
                            <h3>Get In Touch</h3>
                            <p class="subtitle">Fill out the form below and our counselors will get back to you within 24 hours</p>

                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName" class="form-label">First Name *</label>
                                        <input type="text" class="form-control" id="firstName" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName" class="form-label">Last Name *</label>
                                        <input type="text" class="form-control" id="lastName" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email Address *</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone Number *</label>
                                        <input type="tel" class="form-control" id="phone" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="service" class="form-label">Service Interested In</label>
                                    <select class="form-select" id="service">
                                        <option selected>Select a service</option>
                                        <option value="admissions">University Admissions</option>
                                        <option value="career">Career Counseling</option>
                                        <option value="study-abroad">Study Abroad</option>
                                        <option value="mentoring">Personal Mentoring</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="message" class="form-label">Your Message *</label>
                                    <textarea class="form-control" id="message" rows="4" required placeholder="Tell us about your goals and how we can help..."></textarea>
                                </div>

                                <button type="submit" class="btn btn-submit">
                                    Send Message
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="col-lg-5">
                        <div class="contact-info scroll-reveal">
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="info-content">
                                    <h5>Visit Us</h5>
                                    <p>123 Education Street<br>New Delhi, India 110001</p>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="info-content">
                                    <h5>Call Us</h5>
                                    <p>+91 98765 43210<br>Mon-Sat: 9:00 AM - 6:00 PM</p>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="info-content">
                                    <h5>Email Us</h5>
                                    <p>info@universitycounseling.com<br>support@universitycounseling.com</p>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="info-content">
                                    <h5>Office Hours</h5>
                                    <p>Monday - Friday: 9:00 AM - 7:00 PM<br>Saturday: 10:00 AM - 4:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/contact.js') }}"></script>
@endpush