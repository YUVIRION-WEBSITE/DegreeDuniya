@props(['college'])

<div class="card h-100 border-0 shadow-sm animate-scroll-reveal" style="transition: transform 0.3s ease, box-shadow 0.3s ease; border-radius: 12px; overflow: hidden; transform-origin: center;">
    {{-- Banner Image --}}
    <div class="ratio ratio-16x9 overflow-hidden bg-light position-relative">
        <img alt="{{ $college->name }} Logo" class="w-100 h-100 object-fit-cover" src="{{ $college->logo_path ?: 'https://via.placeholder.com/400x225?text=College+Logo' }}" loading="lazy" style="transition: transform 0.5s ease;">
        <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
            <h3 class="fs-5 fw-bold text-white mb-0 text-truncate" title="{{ $college->name }}">{{ $college->name }}</h3>
            <p class="fs-7 text-white-50 mb-0 text-truncate">
                <i class="bi bi-geo-alt-fill me-1"></i>
                {{ $college->university ? $college->university->location : 'Location not available' }}
            </p>
        </div>
    </div>

    {{-- Validation and Details Tabular Data --}}
    <div class="card-body p-0 d-flex flex-column">
        <div class="d-flex border-bottom border-light-subtle text-center">
            <div class="flex-fill p-2 border-end border-light-subtle" style="width: 50%;">
                <small class="text-uppercase fw-semibold d-block" style="color: var(--bs-slate-500, #64748b); font-size: 0.7rem; letter-spacing: 0.5px;">Type</small>
                <span class="fs-6 fw-bold text-dark">{{ $college->university ? ucfirst($college->university->type) : 'Independent' }}</span>
            </div>
            <div class="flex-fill p-2" style="width: 50%;">
                <small class="text-uppercase fw-semibold d-block" style="color: var(--bs-slate-500, #64748b); font-size: 0.7rem; letter-spacing: 0.5px;">Rating</small>
                <span class="fs-6 fw-bold" style="color: #c71585;">
                    <i class="bi bi-star-fill me-1"></i>{{ $college->university && $college->university->rating ? number_format($college->university->rating, 1) : 'N/A' }}
                </span>
            </div>
        </div>
        
        <div class="p-3 flex-grow-1 text-center bg-gray-50 flex-column d-flex gap-2">
            {{-- Provide a quick summary of courses if any --}}
            @if($college->courses && $college->courses->count() > 0)
                <p class="fs-7 text-secondary mb-1">
                    <i class="bi bi-journal-check me-1"></i> Offers {{ $college->courses->count() }} Courses
                </p>
            @endif
            <a href="{{ route('public.colleges.show', ['slug' => $college->slug]) }}#courses" class="btn btn-outline-primary w-100 fw-semibold mt-auto" style="border-radius: 8px; border-color: #c71585; color: #c71585; transition: all 0.2s;">
               View Courses
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
