@extends('components.layouts.public-layout')

@section('title', 'Universities - EduConnect')

@section('content')

{{-- Hero Pattern SVG defined --}}
<style>
    .bg-hero-pattern {
        background-color: #f8fafc;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23c71585' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    .custom-accent {
        color: #c71585;
    }
    .bg-custom-accent {
        background-color: #c71585;
        color: #fff;
    }
    
    /* Initially hide items before scroll reveal triggers */
    .reveal-item {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s cubic-bezier(0.5, 0, 0, 1);
    }
    .reveal-item.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

{{-- Top Banner --}}
<section class="py-5 bg-hero-pattern">
    <div class="container text-center py-sm-5 reveal-item" style="max-width: 900px;">
        <h1 class="display-4 fw-bold mb-3" style="color: #1e293b;">Explore Leading Universities</h1>
        <p class="lead" style="color: #475569;">Find the perfect foundation for your future career. Browse, filter, and discover highly-rated programs from government and private institutions.</p>
    </div>
</section>

{{-- Filter & Search Bar + Grid --}}
<section class="py-5 bg-white">
    <div class="container" style="max-width: 1280px;">
        
        {{-- Search & Filter Form --}}
        <div class="card border-0 shadow-sm mb-5 p-4 reveal-item" style="border-radius: 16px; background: #f8fafc;">
            <form method="GET" action="{{ route('public.universities.index') }}">
                <div class="row g-3 align-items-end">
                    <div class="col-md-5">
                        <label for="search" class="form-label fw-semibold text-secondary small text-uppercase">Search</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="bi bi-search text-muted"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0" id="search" name="search" value="{{ request('search') }}" placeholder="University name or location...">
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <label class="form-label fw-semibold text-secondary small text-uppercase">Type</label>
                        <div class="d-flex gap-3 mt-1">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="type_all" value="" {{ request('type') == '' ? 'checked' : '' }}>
                                <label class="form-check-label" for="type_all">All</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="type_gov" value="government" {{ request('type') == 'government' ? 'checked' : '' }}>
                                <label class="form-check-label" for="type_gov">Govt.</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="type_private" value="private" {{ request('type') == 'private' ? 'checked' : '' }}>
                                <label class="form-check-label" for="type_private">Private</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                        <label for="sort" class="form-label fw-semibold text-secondary small text-uppercase">Sort By</label>
                        <select id="sort" name="sort" class="form-select">
                            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A-Z)</option>
                            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z-A)</option>
                            <option value="rating_desc" {{ request('sort') == 'rating_desc' ? 'selected' : '' }}>Highest Rating</option>
                        </select>
                    </div>
                    
                    <div class="col-md-2">
                        <button type="submit" class="btn bg-custom-accent w-100 fw-semibold" style="border-radius: 8px;">Filter</button>
                    </div>
                </div>
            </form>
        </div>

        {{-- Grid --}}
        <div class="row row-cols-2 row-cols-md-3 g-4" id="university-grid">
            @forelse ($universities as $university)
                <div class="col reveal-item">
                    <x-multidetail-card :university="$university" />
                </div>
            @empty
                <div class="col-12 text-center py-5 reveal-item">
                    <div class="p-5 bg-light rounded-4 shadow-sm border border-light-subtle">
                        <i class="bi bi-search fs-1 text-muted mb-3"></i>
                        <h3 class="fs-4 text-dark fw-bold">No Universities Found</h3>
                        <p class="text-secondary">Try adjusting your filters or search terms.</p>
                        <a href="{{ route('public.universities.index') }}" class="btn btn-outline-secondary mt-2">Clear Filters</a>
                    </div>
                </div>
            @endforelse
        </div>
        
        {{-- Pagination --}}
        @if ($universities->hasPages())
            <div class="mt-5 d-flex justify-content-center reveal-item">
                {{ $universities->links('pagination::bootstrap-5') }}
            </div>
        @endif
        
    </div>
</section>

{{-- Vanilla JS Scroll Reveal --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                // Add a slight stagger effect based on element index in the viewport chunk
                setTimeout(() => {
                    entry.target.classList.add('visible');
                }, index * 100); 
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.reveal-item').forEach(element => {
        observer.observe(element);
    });
});
</script>

<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> a7659ad03ab9c8da35082f472ad7c37f32c5eaa4
