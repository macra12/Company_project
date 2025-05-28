@extends('layouts.app')

@section('title', 'Services - Company Bootstrap Template')

@section('content')
<!-- Page Title -->
<div class="page-title accent-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Services</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="current">Services</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<section id="services" class="services section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div>

    <div class="container">
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <a href="{{ route('services.create') }}" class="btn btn-success mb-3">
            <i class="bi bi-plus-circle"></i> Create New Service
        </a>

        @if($services->count() > 0)
            <div class="row gy-4">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * $loop->iteration }}">
                        <div class="service-item item-{{ ['cyan', 'orange', 'teal', 'red', 'indigo', 'pink'][$loop->index % 6] }} position-relative">
                            <div class="icon">
                                @if ($service->image && file_exists(public_path('storage/' . $service->image)))
                                    <img src="{{ asset('storage/' . $service->image) }}"
                                         alt="{{ $service->title }}"
                                         class="service-image rounded"
                                         style="width: 100px; height: 100px; object-fit: cover;"
                                         loading="lazy">
                                @else
                                    <img src="{{ asset('theme/assets/img/portfolio/books-1.jpg') }}"
                                         alt="Service placeholder"
                                         class="service-image rounded"
                                         style="width: 100px; height: 100px; object-fit: cover;"
                                         loading="lazy">
                                @endif
                            </div>

                            <div class="service-content">
                                <h3>{{ $service->title }}</h3>
                                <p>{{ Str::limit($service->description, 100) }}</p>
                            </div>

                            <div class="service-actions mt-3 d-flex gap-2">
                                <a href="{{ route('services.edit', $service->slug) }}"
                                   class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>

                                <form action="{{ route('services.destroy', $service->slug) }}"
                                      method="POST"
                                      class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-danger btn-sm delete-btn"
                                            data-service-title="{{ $service->title }}">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <div class="mb-3">
                    <i class="bi bi-inbox" style="font-size: 3rem; color: #6c757d;"></i>
                </div>
                <h4 class="text-muted">No Services Found</h4>
                <p class="text-muted">Start by creating your first service.</p>
                <a href="{{ route('services.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Create First Service
                </a>
            </div>
        @endif
    </div>
</section>


<!-- Features Section -->
<section id="features" class="features section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Features</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div>

    <div class="container">
        <a href="{{ route('features.create') }}" class="btn btn-success mb-3">Create New Feature</a>
        <div class="row gy-4">
            @foreach ($features as $feature)
                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="{{ 100 * $loop->iteration }}">
                    <div class="card shadow-sm feature-card h-100">
                        <img src="{{ $feature->image ? asset('storage/' . $feature->image) : asset('theme/assets/img/team/team-1.jpg') }}"
                             class="card-img-top feature-image"
                             alt="{{ $feature->title }}"
                             style="height: 150px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title feature-title">{{ $feature->title }}</h5>
                            <div class="mt-auto d-flex justify-content-between">
                                <a href="{{ route('features.edit', $feature->id) }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('features.destroy', $feature->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section><!-- /Features Section -->
@endsection
<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const serviceTitle = this.getAttribute('data-service-title');
            const form = this.closest('.delete-form');

            if (confirm(`Are you sure you want to delete the service "${serviceTitle}"? This action cannot be undone.`)) {
                form.submit();
            }
        });
    });
});
</script>

<style>
.service-item {
    background: white;
    border-radius: 10px;
    padding: 2rem;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.service-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.service-content {
    flex-grow: 1;
}

.service-actions {
    margin-top: auto;
    padding-top: 1rem;
    border-top: 1px solid #eee;
}

.service-image {
    border: 3px solid #f8f9fa;
}

.alert {
    border: none;
    border-radius: 10px;
}
</style>
