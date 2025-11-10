@props(['item'])

<div class="card mb-3 shadow-sm">
    <div class="card-body p-3 border border-dark" style="background-color: #F2E6E8; border-radius: 15px; object-fit:cover; overflow:hidden; min-width: 100%">
        <div class="d-flex align-items-center">
            <!-- Artist Avatar -->
            <div class="flex-shrink-0 me-3">
                <img src="{{ asset($item->profile_photo ?? 'image/foto-cewek-2.jpg') }}" 
                    alt="{{ $item->name }}" 
                    class="rounded-circle object-fit-cover border border-dark" 
                    style="width: 70px; height: 70px; object-fit: cover;">
            </div>
            
            <!-- Artist Info -->
            <div class="flex-grow-1">
                <a href="{{ route('mua.description', $item->id) }}" class="text-decoration-none text-dark artist-name-link">
                    <h5 class="card-title mb-1 fw-semibold">{{ $item->name }}</h5>
                </a>
                <div class="d-flex flex-wrap align-items-center">
                    <span class="badge bg-primary me-2 mb-1">{{ $item->category }}</span>
                    <small class="text-muted mb-1">
                        <i class="bi bi-geo-alt"></i> {{ $item->address->kota }}, {{ $item->address->kecamatan ?? '' }}
                    </small>
                </div>
            </div>
            
            <!-- Action Button -->
            <div class="flex-shrink-0 ms-3">
                <a href="{{ $item->address->link_map }}" 
                class="btn btn-sm" 
                target="_blank">
                    <i class="bi bi-geo-alt-fill me-1" style="font-size: 2rem;"></i>
                </a>
            </div>
        </div>
    </div>
</div>