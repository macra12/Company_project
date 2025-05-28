@extends('layouts.app')

@section('title', $service->title)

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- Back Button -->
            <div class="mb-4">
                <a href="{{ route('services') }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left"></i> Back to Services
                </a>
            </div>

            <!-- Service Details Card -->
            <div class="card shadow-lg border-0">
                @if($service->image && file_exists(public_path('storage/' . $service->image)))
                    <div class="card-img-top-wrapper" style="height: 400px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $service->image) }}"
                             alt="{{ $service->title }}"
                             class="card-img-top w-100 h-100"
                             style="object-fit: cover;">
                    </div>
                @endif

                <div class="card-body p-5">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <h1 class="card-title h2 mb-0">{{ $service->title }}</h1>

                        <!-- Admin Actions -->
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle"
                                    type="button"
                                    data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('services.edit', $service->slug) }}">
                                        <i class="bi bi-pencil"></i> Edit Service
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('services.destroy', $service->slug) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="dropdown-item text-danger"
                                                onclick="return confirm('Are you sure you want to delete this service?')">
                                            <i class="bi bi-trash"></i> Delete Service
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Service Description -->
                    <div class="service-description">
                        <p class="lead text-muted mb-4">{{ $service->description }}</p>
                    </div>

                    <!-- Service Meta Information -->
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <div class="card bg-light border-0">
                                <div class="card-body">
                                    <h6 class="card-title text-muted mb-2">Created</h6>
                                    <p class="card-text">{{ $service->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-light border-0">
                                <div class="card-body">
                                    <h6 class="card-title text-muted mb-2">Last Updated</h6>
                                    <p class="card-text">{{ $service->updated_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border-radius: 15px;
    transition: transform 0.3s ease;
}

.service-description {
    font-size: 1.1rem;
    line-height: 1.8;
}

.card-img-top-wrapper {
    border-radius: 15px 15px 0 0;
}

.dropdown-item:hover {
    background-color: #f8f9fa;
}

.dropdown-item.text-danger:hover {
    background-color: #f8d7da;
    color: #721c24 !important;
}
</style>
@endsection
