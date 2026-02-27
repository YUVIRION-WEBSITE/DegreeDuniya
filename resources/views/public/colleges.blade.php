@extends('components.layouts.public-layout')

@section('title', 'Colleges - EduConnect')

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

    <!-- Colleges List -->
    <section class="py-5" style="background: linear-gradient(to bottom, var(--background-light), transparent);">
        <div class="container" style="max-width: 1536px;">
            <h2 class="fs-3 fs-sm-2 fw-bold text-primary text-center mb-4 animate-slide-in">Explore Colleges</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4">
                @forelse ($colleges as $college)
                    <a href="{{ route('public.colleges.show', ['slug' => $college->slug]) }}" class="col text-decoration-none" aria-label="View details for {{ $college->name }}">
                        <div class="card h-100 border-0 shadow-sm animate-slide-in" style="transition: all 0.3s ease;">
                            <div class="ratio ratio-16x9 overflow-hidden rounded-top">
                                <img alt="{{ $college->name }}" class="w-100 h-100 object-fit-cover" src="{{ $college->logo_path ?: 'https://via.placeholder.com/400x225' }}" loading="lazy">
                            </div>
                            <div class="card-body p-3">
                                <h3 class="fs-6 fw-semibold text-primary text-truncate">{{ $college->name }}</h3>
                                <p class="fs-7 text-secondary text-truncate">
                                    {{ $college->university_id ? \App\Models\University::find($college->university_id)->name ?? 'N/A' : 'Independent' }}
                                </p>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="text-center fs-6 text-dark animate-slide-in" role="alert">No colleges are currently available. Please check back later.</p>
                @endforelse
            </div>
            <!-- Pagination -->
            @if ($colleges->hasPages())
                <nav aria-label="College pagination" class="mt-4">
                    <ul class="pagination justify-content-center">
                        <!-- Previous Page Link -->
                        @if ($colleges->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $colleges->previousPageUrl() }}" aria-label="Previous page">Previous</a>
                            </li>
                        @endif

                        <!-- Pagination Links -->
                        @foreach ($colleges->getUrlRange(1, $colleges->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $colleges->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        <!-- Next Page Link -->
                        @if ($colleges->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $colleges->nextPageUrl() }}" aria-label="Next page">Next</a>
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
@endsection