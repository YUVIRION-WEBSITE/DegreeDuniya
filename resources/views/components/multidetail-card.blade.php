@props(['university'])

<div class="card h-100 border-0 shadow-sm animate-scroll-reveal" style="transition: transform 0.3s ease, box-shadow 0.3s ease; border-radius: 12px; overflow: hidden; transform-origin: center;">
    {{-- Banner Image --}}
    <div class="ratio ratio-16x9 overflow-hidden bg-light position-relative">
        <img alt="{{ $university->name }} Logo" class="w-100 h-100 object-fit-cover" src="{{ $university->logo_path ?: 'https://via.placeholder.com/400x225?text=University+Logo' }}" loading="lazy" style="transition: transform 0.5s ease;">
        <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
            <h3 class="fs-5 fw-bold text-white mb-0 text-truncate" title="{{ $university->name }}">{{ $university->name }}</h3>
            <p class="fs-7 text-white-50 mb-0 text-truncate"><i class="bi bi-geo-alt-fill me-1"></i>{{ $university->location ?? 'Location not available' }}</p>
        </div>
    </div>

    {{-- Validation and Details Tabular Data --}}
    <div class="card-body p-0 d-flex flex-column">
        <div class="d-flex border-bottom border-light-subtle text-center">
            <div class="flex-fill p-2 border-end border-light-subtle">
                <small class="text-uppercase fw-semibold d-block" style="color: var(--bs-slate-500, #64748b); font-size: 0.7rem; letter-spacing: 0.5px;">Type</small>
                <span class="fs-6 fw-bold text-dark">{{ ucfirst($university->type ?? 'Private') }}</span>
            </div>
            <div class="flex-fill p-2">
                <small class="text-uppercase fw-semibold d-block" style="color: var(--bs-slate-500, #64748b); font-size: 0.7rem; letter-spacing: 0.5px;">Rating</small>
                <span class="fs-6 fw-bold" style="color: #c71585;">
                    <i class="bi bi-star-fill me-1"></i>{{ $university->rating ? number_format($university->rating, 1) : 'N/A' }}
                </span>
            </div>
        </div>
        
        <div class="p-3 flex-grow-1 text-center bg-gray-50">
           <a href="{{ route('public.universities.show', ['slug' => $university->slug]) }}" class="btn btn-outline-primary w-100 fw-semibold" style="border-radius: 8px; border-color: #c71585; color: #c71585; transition: all 0.2s;">
               View Details
           </a>
        </div>
    </div>
</div>

<style>
    /* Card Hover Effects */
    .animate-scroll-reveal:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(199, 21, 133, 0.15) !important;
    }
    .animate-scroll-reveal:hover img {
        transform: scale(1.05);
    }
    .btn-outline-primary:hover {
        background-color: #c71585 !important;
        border-color: #c71585 !important;
        color: white !important;
    }
    .bg-gray-50 {
        background-color: #f8fafc;
    }
</style>
