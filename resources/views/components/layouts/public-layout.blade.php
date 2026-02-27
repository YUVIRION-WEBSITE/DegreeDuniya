<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="EduConnect - Discover top universities, colleges, and courses to shape your academic future.">
    <meta name="theme-color" content="#1e1b4b">
    <meta name="robots" content="index, follow">
    <title>@yield('title', 'EduConnect - Your Academic Journey Starts Here')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="/favicon.ico">
    @yield('head')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet"> 
    @stack('styles')
</head>

    
<body>

    <style>
        .announcement-bar {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            height: 32px;
            overflow: hidden;
            display: flex;
            align-items: center;
            font-family: "Poppins", sans-serif;
            font-size: 0.85rem;
            color: #111827;
        }

        .announcement-track {
            display: inline-flex;
            gap: 2.5rem;
            white-space: nowrap;
            /* animation: marquee 18s linear infinite; */
            padding-left: 100%;
        }

        .announcement-track span {
            opacity: 0.8;
        }

        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    </style>
     <section>
        <!-- Thin Scrolling Announcement Bar -->
        <div class="announcement-bar">
            <div class="announcement-track">
                <span>Call: +1 (555) 123-4567</span>
                <span>Email: hello@client.com</span>
                <span>WhatsApp: +1 (555) 987-6543</span>
                <span>Office: 123 Main St, City</span>
            </div>
        </div>

    </section>

    <div class="d-flex flex-column min-vh-100">
        <!-- Header -->
        <header>
            <nav class="navbar navbar-expand-md">
                <div class="container">
                    <a href="{{ route('public.home') }}" class="navbar-brand animate-slide-in">
                        <svg class="logo-svg" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-14a6 6 0 100 12 6 6 0 000-12zm0 10a4 4 0 110-8 4 4 0 010 8z"/>
                        </svg>
                        <span class="fs-4 fw-bold" style="color: var(--primary);">EduConnect</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                        </svg>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto" style="gap: 16px;">
                            <li class="nav-item"><a href="{{ route('public.home') }}" class="nav-link animate-slide-in">Home</a></li>
                            <li class="nav-item"><a href="{{ route('public.universities.index') }}" class="nav-link animate-slide-in delay-100">Universities</a></li>
                            <li class="nav-item"><a href="{{ route('public.colleges.index') }}" class="nav-link animate-slide-in delay-100">Colleges</a></li>
                            <li class="nav-item"><a href="{{ route('public.courses.index') }}" class="nav-link animate-slide-in delay-100">Courses</a></li>
                            <li class="nav-item"><a href="{{ route('public.enquiry.create') }}" class="btn btn-apply animate-slide-in delay-200 blink-apply">Apply Now</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Main Content -->
        <main class="flex-grow-1">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer>
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-md-3 animate-slide-in">
                        <h3>About EduConnect</h3>
                        <p class="fs-6">EduConnect connects you with top universities and courses to shape your academic future.</p>
                    </div>
                    <div class="col-md-3 animate-slide-in delay-100">
                        <h3>Quick Links</h3>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('public.universities.index') }}" class="fs-6">Universities</a></li>
                            <li><a href="{{ route('public.colleges.index') }}" class="fs-6">Colleges</a></li>
                            <li><a href="{{ route('public.courses.index') }}" class="fs-6">Courses</a></li>
                            <li><a href="{{ route('public.contact.create') }}" class="fs-6">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 animate-slide-in delay-200">
                        <h3>Stay Updated</h3>
                        <form class="newsletter-form">
                            <input type="email" placeholder="Enter your email" aria-label="Email for newsletter" required>
                            <button type="submit" class="mt-2">Subscribe</button>
                        </form>
                    </div>
                    <div class="col-md-3 animate-slide-in delay-300">
                        <h3>Follow Us</h3>
                        <div class="social-icons d-flex gap-3">
                            <a href="#" aria-label="Facebook">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                            </a>
                            <a href="#" aria-label="Twitter">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                            <a href="#" aria-label="Instagram">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.33 3.608 1.305.975.975 1.243 2.242 1.305 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.33 2.633-1.305 3.608-.975.975-2.242 1.243-3.608 1.305-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.33-3.608-1.305-.975-.975-1.243-2.242-1.305-3.608-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.062-1.366.33-2.633 1.305-3.608.975-.975 2.242-1.243 3.608-1.305 1.266-.058 1.646-.07 4.85-.07m0-2.163c-3.259 0-3.67.014-4.947.072-1.314.064-2.554.343-3.501.831-1.002.504-1.846 1.348-2.351 2.351-.488.947-.767 2.187-.831 3.501-.058 1.277-.072 1.688-.072 4.947s.014 3.67.072 4.947c.064 1.314.343 2.554.831 3.501.504 1.002 1.348 1.846 2.351 2.351.947.488 2.187.767 3.501.831 1.277.058 1.688.072 4.947.072s3.67-.014 4.947-.072c1.314-.064 2.554-.343 3.501-.831 1.002-.504 1.846-1.348 2.351-2.351.488-.947.767-2.187.831-3.501.058-1.277.072-1.688.072-4.947s-.014-3.67-.072-4.947c-.064-1.314-.343-2.554-.831-3.501-.504-1.002-1.348-1.846-2.351-2.351-.947-.488-2.187-.767-3.501-.831-1.277-.058-1.688-.072-4.947-.072z"/><path d="M12 7.378c-2.552 0-4.622 2.07-4.622 4.622 0 2.552 2.07 4.622 4.622 4.622 2.552 0 4.622-2.07 4.622-4.622 0-2.552-2.07-4.622-4.622-4.622zm0 7.378c-1.681 0-3.045-1.364-3.045-3.045 0-1.681 1.364-3.045 3.045-3.045 1.681 0 3.045 1.364 3.045 3.045 0 1.681-1.364 3.045-3.045 3.045zm0-7.378c-2.552 0-4.622 2.07-4.622 4.622s2.07 4.622 4.622 4.622c2.552 0 4.622-2.07 4.622-4.622s-2.07-4.622-4.622-4.622z"/><circle cx="15.625" cy="8.375" r="1.125"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-top text-center">
                    <p class="fs-6">&copy; {{ date('Y') }} EduConnect. All rights reserved.</p>
                </div>
            </div>


        </footer>
    </div>

     @stack('scripts')
        <!-- JQUERY JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <!-- SLICK SLIDER JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>