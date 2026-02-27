@extends('components.layouts.public-layout')

@section('title', 'Universities - EduConnect')

@section('content')
    <!-- Search Section -->
    <section class="py-5" style="background: linear-gradient(to bottom, var(--background-light), transparent);">
        <div class="container" style="max-width: 1280px;">
            <div class="position-relative animate-slide-in">
                <svg class="position-absolute start-0 top-50 translate-middle-y" style="width: 20px; height: 20px; color: #6c757d;" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="search" placeholder="Search universities..." class="w-100 rounded-3 border border-secondary-subtle bg-white py-2 ps-5 pe-3 fs-6" style="transition: all 0.3s ease;" aria-label="Search for universities">
            </div>
        </div>
    </section>

    <!-- Universities List -->
    <section class="py-5 bg-white">
        <div class="container" style="max-width: 1536px;">
            <h2 class="fs-3 fs-sm-2 fw-bold text-primary text-center mb-4 animate-slide-in">Explore Universities</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4">
                @forelse ($universities as $university)
                    <a href="{{ route('public.universities.show', ['slug' => $university->slug]) }}" class="col text-decoration-none" aria-label="View details for {{ $university->name }}">
                        <div class="card h-100 border-0 shadow-sm animate-slide-in" style="transition: all 0.3s ease;">
                            <div class="ratio ratio-16x9 overflow-hidden rounded-top">
                                <img alt="{{ $university->name }}" class="w-100 h-100 object-fit-cover" src="{{ $university->logo_path ?: 'https://via.placeholder.com/400x225' }}" loading="lazy">
                            </div>
                            <div class="card-body p-3">
                                <h3 class="fs-6 fw-semibold text-primary text-truncate">{{ $university->name }}</h3>
                                <p class="fs-7 text-secondary text-truncate">{{ $university->location ?? 'Location not available' }}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="text-center fs-6 text-dark animate-slide-in" role="alert">No universities are currently available. Please check back later.</p>
                @endforelse
            </div>
            <!-- Pagination -->
            @if ($universities->hasPages())
                <nav aria-label="University pagination" class="mt-4">
                    <ul class="pagination justify-content-center">
                        <!-- Previous Page Link -->
                        @if ($universities->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $universities->previousPageUrl() }}" aria-label="Previous page">Previous</a>
                            </li>
                        @endif

                        <!-- Pagination Links -->
                        @foreach ($universities->getUrlRange(1, $universities->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $universities->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        <!-- Next Page Link -->
                        @if ($universities->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $universities->nextPageUrl() }}" aria-label="Next page">Next</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">Next</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            @endif
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5" style="background: rgba(199, 21, 133, 0.1);">
        <div class="container text-center animate-slide-in" style="max-width: 1280px;">
            <h2 class="fs-3 fs-sm-2 fw-bold text-primary">Ready to Find Your Perfect University?</h2>
            <a href="{{ route('public.enquiry.create') }}" class="mt-3 d-inline-flex align-items-center justify-content-center btn btn-apply fw-semibold shadow" style="height: 40px; padding: 0 20px; transition: all 0.3s ease;" aria-label="Start your application">Start Your Application</a>
        </div>
    </section>
@endsection