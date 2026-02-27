<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="UMS Admin - Manage universities, colleges, courses, and more.">
    <meta name="theme-color" content="#1e1b4b">
    <meta name="robots" content="noindex, nofollow">
    <title>{{ $title ?? 'UMS Admin' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="/favicon.ico">
    <style>
        :root {
            --primary: #c71585; /* Magenta */
            --secondary: #1e1b4b; /* Navy Blue */
            --accent: #e6e6fa; /* Light lavender */
            --background-light: #f9f9f9;
            --background-dark: #1e1b4b;
            --text-light: #2d2d2d;
            --text-dark: #e0e0e0;
        }

        body {
            font-family: 'Noto Sans JP', sans-serif;
            background-color: var(--background-light);
            color: var(--text-light);
            margin: 0;
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .sidebar {
            background-color: var(--secondary);
            color: var(--text-dark);
            height: 100vh;
            width: 240px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: transform 0.3s ease-in-out;
            overflow-y: auto;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar.hidden {
            transform: translateX(-240px);
        }

        .sidebar .brand {
            font-size: 1.5rem;
            font-weight: 700;
            padding: 1.5rem;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-dark);
        }

        .sidebar .nav-link {
            color: var(--text-dark);
            padding: 0.75rem 1.5rem;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            transition: background-color 0.2s, color 0.2s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: var(--primary);
            color: var(--text-dark);
        }

        .sidebar .nav-link i {
            margin-right: 0.75rem;
            width: 20px;
            text-align: center;
        }

        .main-content {
            margin-left: 240px;
            padding: 1.5rem;
            min-height: 100vh;
            transition: margin-left 0.3s ease-in-out;
            background-color: var(--background-light);
        }

        .main-content.expanded {
            margin-left: 0;
        }

        .navbar {
            background-color: #ffffff;
            padding: 0.75rem 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 900;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .navbar-brand {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--secondary);
        }

        .navbar .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .navbar .user-info .user-name {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .navbar .user-info .profile-link {
            color: var(--secondary);
            text-decoration: none;
            font-weight: 500;
        }

        .navbar .user-info .profile-link:hover {
            color: var(--primary);
            text-decoration: underline;
        }

        .navbar .btn-logout {
            background-color: var(--primary);
            border-color: var(--primary);
            color: #ffffff;
            padding: 0.4rem 1rem;
            font-size: 0.9rem;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .navbar .btn-logout:hover {
            background-color: var(--secondary);
            border-color: var(--secondary);
            transform: scale(1.05);
        }

        .footer {
            background-color: #ffffff;
            padding: 1rem;
            text-align: center;
            font-size: 0.85rem;
            color: var(--text-light);
            border-top: 1px solid #e5e7eb;
            margin-top: auto;
        }

        .alert {
            border-radius: 6px;
            margin-bottom: 1rem;
        }

        .mobile-toggle {
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1100;
            background-color: var(--secondary);
            border: none;
            color: var(--text-dark);
            padding: 0.5rem;
            border-radius: 4px;
        }

        #mobile-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 240px;
            height: 100vh;
            background-color: var(--secondary);
            z-index: 1050;
            transform: translateX(-240px);
            transition: transform 0.3s ease-in-out;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
        }

        #mobile-sidebar.show {
            transform: translateX(0);
        }

        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-240px);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .main-content.expanded {
                margin-left: 0;
            }
            .mobile-toggle {
                display: block;
            }
        }

        @media (min-width: 992px) {
            .mobile-toggle {
                display: none;
            }
            #mobile-sidebar {
                display: none;
            }
        }

        /* Animation */
        @keyframes slide-in {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-slide-in {
            animation: slide-in 0.5s ease-out forwards;
        }

        /* Ensure no overlap */
        .main-content, .navbar, .footer {
            position: relative;
            z-index: 1;
        }

        /* Optimize for fast loading */
        img, svg {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="d-flex flex-column min-vh-100">
        <!-- Sidebar Toggle Button -->
        <button class="btn mobile-toggle" id="sidebar-toggle"><i class="fas fa-bars"></i></button>

        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="brand animate-slide-in">UMS Admin</div>
            <nav class="nav flex-column">
    <a class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }} animate-slide-in" href="{{ route('admin.dashboard') }}">Dashboard</a>
    <a class="nav-link {{ Route::is('admin.profile.*') ? 'active' : '' }} animate-slide-in" href="{{ route('admin.profile.index') }}">Profile</a>
    <a class="nav-link {{ Route::is('admin.universities.*') ? 'active' : '' }} animate-slide-in" href="{{ route('admin.universities.index') }}">Universities</a>
    <a class="nav-link {{ Route::is('admin.colleges.*') ? 'active' : '' }} animate-slide-in" href="{{ route('admin.colleges.index') }}">Colleges</a>
    <a class="nav-link {{ Route::is('admin.courses.*') ? 'active' : '' }} animate-slide-in" href="{{ route('admin.courses.index') }}">Courses</a>
    <!-- <a class="nav-link {{ Route::is('admin.students.*') ? 'active' : '' }} animate-slide-in" href="{{ route('admin.students.index') }}">Students</a> -->
    <a class="nav-link {{ Route::is('admin.cms.*') ? 'active' : '' }} animate-slide-in" href="{{ route('admin.cms.index') }}">CMS</a>
    <a class="nav-link {{ Route::is('admin.enquiries.*') ? 'active' : '' }} animate-slide-in" href="{{ route('admin.enquiries.index') }}">Enquiries</a>
    <a class="nav-link {{ Route::is('admin.settings.*') ? 'active' : '' }} animate-slide-in" href="{{ route('admin.settings.index') }}">Settings</a>
    <a class="nav-link {{ Route::is('admin.notifications.*') ? 'active' : '' }} animate-slide-in" href="{{ route('admin.notifications.index') }}">Notifications</a>
    <a class="nav-link {{ Route::is('admin.support.*') ? 'active' : '' }} animate-slide-in" href="{{ route('admin.support.index') }}">Support</a>
</nav>

        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Navbar -->
            <header class="navbar">
                <div class="d-flex align-items-center">
                    <button class="btn d-none d-lg-block me-2" id="desktop-sidebar-toggle"><i class="fas fa-bars"></i></button>
                    <h2 class="navbar-brand mb-0 animate-slide-in">{{ $title ?? 'Dashboard' }}</h2>
                </div>
                <div class="user-info">
                    <span class="user-name animate-slide-in">{{ auth()->guard('admin')->user()->name }}</span>
                    <a href="{{ route('admin.profile.index') }}" class="profile-link animate-slide-in">Profile</a>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-logout animate-slide-in">Logout</button>
                    </form>
                </div>
            </header>

            <!-- Content -->
            <main class="py-4 flex-grow-1">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show animate-slide-in" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-info alert-dismissible fade show animate-slide-in" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show animate-slide-in" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="footer animate-slide-in">
                <p>&copy; {{ date('Y') }} University Management System. All rights reserved.</p>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.querySelector('.main-content');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const desktopSidebarToggle = document.getElementById('desktop-sidebar-toggle');

        function toggleSidebar() {
            sidebar.classList.toggle('hidden');
            mainContent.classList.toggle('expanded');
            localStorage.setItem('sidebarHidden', sidebar.classList.contains('hidden'));
        }

        sidebarToggle.addEventListener('click', toggleSidebar);
        desktopSidebarToggle.addEventListener('click', toggleSidebar);

        if (localStorage.getItem('sidebarHidden') === 'true') {
            sidebar.classList.add('hidden');
            mainContent.classList.add('expanded');
        }

        // Prevent overlap on reload
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.animate-slide-in');
            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate');
                            observer.unobserve(entry.target);
                        }
                    });
                },
                { threshold: 0.1 }
            );
            elements.forEach((el) => observer.observe(el));
        });
    </script>
</body>
</html>