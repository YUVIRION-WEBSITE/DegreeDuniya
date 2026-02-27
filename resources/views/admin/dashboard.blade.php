@extends('components.layouts.admin-layout')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container py-4">
            <!-- Stats Cards -->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm animate-slide-in">
                        <div class="card-body p-4">
                            <h3 class="fs-5 fw-semibold text-primary">Universities</h3>
                            <p class="fs-2 fw-bold text-secondary">{{ $stats['universities'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm animate-slide-in">
                        <div class="card-body p-4">
                            <h3 class="fs-5 fw-semibold text-primary">Colleges</h3>
                            <p class="fs-2 fw-bold text-secondary">{{ $stats['colleges'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm animate-slide-in">
                        <div class="card-body p-4">
                            <h3 class="fs-5 fw-semibold text-primary">Courses</h3>
                            <p class="fs-2 fw-bold text-secondary">{{ $stats['courses'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm animate-slide-in">
                        <div class="card-body p-4">
                            <h3 class="fs-5 fw-semibold text-primary">Students</h3>
                            <p class="fs-2 fw-bold text-secondary">{{ $stats['students'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm animate-slide-in">
                        <div class="card-body p-4">
                            <h3 class="fs-5 fw-semibold text-primary">Enquiries</h3>
                            <p class="fs-2 fw-bold text-secondary">{{ $stats['enquiries'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Charts Section -->
        <div class="row g-4">
            <!-- Bar Chart: Overview of Stats -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm animate-slide-in">
                    <div class="card-body p-4">
                        <h3 class="fs-5 fw-semibold text-primary mb-4">Overview</h3>
                        <canvas id="overviewChart" style="max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>
            <!-- Pie Chart: Distribution of Stats -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm animate-slide-in">
                    <div class="card-body p-4">
                        <h3 class="fs-5 fw-semibold text-primary mb-4">Distribution</h3>
                        <canvas id="distributionChart" style="max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Bar Chart
            const overviewChart = new Chart(document.getElementById('overviewChart'), {
                type: 'bar',
                data: {
                    labels: ['Universities', 'Colleges', 'Courses', 'Students', 'Enquiries'],
                    datasets: [{
                        label: 'Stats',
                        data: [
                            {{ $stats['universities'] }},
                            {{ $stats['colleges'] }},
                            {{ $stats['courses'] }},
                            {{ $stats['students'] }},
                            {{ $stats['enquiries'] }}
                        ],
                        backgroundColor: [
                            'rgba(199, 21, 133, 0.6)', // Magenta
                            'rgba(30, 27, 75, 0.6)',  // Navy Blue
                            'rgba(230, 230, 250, 0.6)', // Light lavender
                            'rgba(199, 21, 133, 0.4)',
                            'rgba(30, 27, 75, 0.4)'
                        ],
                        borderColor: [
                            'rgba(199, 21, 133, 1)',
                            'rgba(30, 27, 75, 1)',
                            'rgba(230, 230, 250, 1)',
                            'rgba(199, 21, 133, 0.8)',
                            'rgba(30, 27, 75, 0.8)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#1e1b4b',
                            titleColor: '#e0e0e0',
                            bodyColor: '#e0e0e0'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: '#e5e7eb' },
                            ticks: { color: '#2d2d2d' }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { color: '#2d2d2d' }
                        }
                    }
                }
            });

            // Pie Chart
            const distributionChart = new Chart(document.getElementById('distributionChart'), {
                type: 'pie',
                data: {
                    labels: ['Universities', 'Colleges', 'Courses', 'Students', 'Enquiries'],
                    datasets: [{
                        data: [
                            {{ $stats['universities'] }},
                            {{ $stats['colleges'] }},
                            {{ $stats['courses'] }},
                            {{ $stats['students'] }},
                            {{ $stats['enquiries'] }}
                        ],
                        backgroundColor: [
                            'rgba(199, 21, 133, 0.6)', // Magenta
                            'rgba(30, 27, 75, 0.6)',  // Navy Blue
                            'rgba(230, 230, 250, 0.6)', // Light lavender
                            'rgba(199, 21, 133, 0.4)',
                            'rgba(30, 27, 75, 0.4)'
                        ],
                        borderColor: '#ffffff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: { color: '#2d2d2d', font: { size: 12 } }
                        },
                        tooltip: {
                            backgroundColor: '#1e1b4b',
                            titleColor: '#e0e0e0',
                            bodyColor: '#e0e0e0'
                        }
                    }
                }
            });

            // Scroll-Triggered Animations
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

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        @keyframes slide-in {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-slide-in.animate {
            animation: slide-in 0.5s ease-out forwards;
        }

        /* Ensure no overlap */
        .container, .card, canvas {
            position: relative;
            z-index: 1;
        }

        /* Optimize for fast loading */
        canvas {
            max-width: 100%;
            height: auto;
        }
    </style>
@endsection