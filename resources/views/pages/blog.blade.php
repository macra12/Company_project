{{-- blog.blade.php --}}
@extends('layouts.app')

@section('title', 'Blog - Company Bootstrap Template')

@section('content')
<!-- Page Title -->
<div class="page-title accent-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Blog</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="current">Blog</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<!-- Blog Section -->
<section id="blog" class="blog section">
    @if(isset($user))
        <div class="container section-title" data-aos="fade-up">
            <h2>Posts by {{ $user->name }}</h2>
            <p>Browse all articles written by {{ $user->name }}</p>
        </div>
    @else
        <div class="container section-title" data-aos="fade-up">
            <h2>Blog</h2>
            <p>Stay updated with our latest news and insights</p>
        </div>
    @endif

    <div class="container">
        <!-- Search and Filter Bar -->
        <div class="row mb-4">
            <div class="col-lg-8">
                <form action="{{ route('blog') }}" method="GET" class="d-flex gap-3 align-items-end">
                    <div class="flex-grow-1">
                        <input type="text" name="search" class="form-control" placeholder="Search articles..."
                               value="{{ request('search') }}">
                    </div>
                    <div>
                        <select name="category" class="form-select">
                            <option value="">All Categories</option>
                            @foreach($categories ?? [] as $category)
                                <option value="{{ $category->slug }}"
                                        {{ request('category') == $category->slug ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i> Search
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        Sort by: {{ ucfirst(request('sort', 'latest')) }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'latest']) }}">Latest</a></li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'oldest']) }}">Oldest</a></li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'popular']) }}">Popular</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Results Summary -->
        @if(request()->hasAny(['search', 'category', 'tag']))
            <div class="row mb-4">
                <div class="col-12">
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle"></i>
                        {{ $posts->total() }} articles found
                        @if(request('search'))
                            for "<strong>{{ request('search') }}</strong>"
                        @endif
                        @if(request('category'))
                            in category "<strong>{{ $categories->where('slug', request('category'))->first()->name ?? request('category') }}</strong>"
                        @endif
                        @if(request('tag'))
                            with tag "<strong>{{ $popularTags->where('slug', request('tag'))->first()->name ?? request('tag') }}</strong>"
                        @endif
                        <a href="{{ route('blog') }}" class="ms-2 text-decoration-none">Clear filters</a>
                    </div>
                </div>
            </div>
        @endif

        <div class="row gy-4 posts-list">
            @forelse($posts as $index => $post)
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <article class="d-flex flex-column h-100">
                        <div class="post-img">
                            <img src="{{ $post->featured_image ? asset('storage/' . $post->featured_image) : asset('theme/assets/img/blog/default-blog.jpg') }}"
                                 alt="{{ $post->title }}" class="img-fluid">
                            @if($post->is_featured)
                                <div class="badge bg-warning position-absolute top-0 start-0 m-2">
                                    <i class="bi bi-star-fill"></i> Featured
                                </div>
                            @endif
                        </div>

                        <h2 class="title">
                            <a href="{{ route('blog-details', $post->slug) }}">{{ $post->title }}</a>
                        </h2>

                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-person"></i>
                                    <a href="{{ route('author.posts', $post->author->username ?? '') }}">{{ $post->author->name }}</a>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-clock"></i>
                                    <time datetime="{{ $post->published_at->format('Y-m-d') }}">
                                        {{ $post->published_at->format('F j, Y') }}
                                    </time>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-chat-dots"></i>
                                    <a href="{{ route('blog-details', $post->slug) }}#comments">
                                        {{ $post->comments_count }} {{ Str::plural('Comment', $post->comments_count) }}
                                    </a>
                                </li>
                                @if($post->category)
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-tag"></i>
                                        <a href="{{ route('blog', ['category' => $post->category->slug]) }}">
                                            {{ $post->category->name }}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>

                        <div class="content flex-grow-1">
                            <p>{{ $post->excerpt ?: Str::limit(strip_tags($post->content), 150) }}</p>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="read-more">
                                <a href="{{ route('blog-details', $post->slug) }}">
                                    Read More <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                            <div class="post-stats text-muted small">
                                <span class="me-3">
                                    <i class="bi bi-eye"></i> {{ $post->views_count }}
                                </span>
                                <span>
                                    <i class="bi bi-heart"></i> {{ $post->likes_count }}
                                </span>
                            </div>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="bi bi-journal-x display-1 text-muted"></i>
                        <h3 class="mt-3">No articles found</h3>
                        <p class="text-muted">
                            @if(request()->hasAny(['search', 'category', 'tag']))
                                Try adjusting your search criteria or <a href="{{ route('blog') }}">browse all articles</a>.
                            @else
                                Check back later for new content.
                            @endif
                        </p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($posts->hasPages())
            <div class="blog-pagination mt-5">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="pagination-info text-muted">
                        Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }} articles
                    </div>
                    <nav aria-label="Blog pagination">
                        {{ $posts->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
            </div>
        @endif

        <!-- Newsletter Subscription -->
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto">
                <div class="newsletter-section bg-light p-4 rounded">
                    <div class="text-center">
                        <h4>Stay Updated</h4>
                        <p class="text-muted">Subscribe to our newsletter for the latest articles and insights.</p>
                        <form action="{{ route('newsletter.subscribe') }}" method="POST" class="row g-2 justify-content-center">
                            @csrf
                            <div class="col-auto flex-grow-1" style="max-width: 300px;">
                                <input type="email" name="email" class="form-control"
                                       placeholder="Enter your email" required>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-submit form on category change
    const categorySelect = document.querySelector('select[name="category"]');
    if (categorySelect) {
        categorySelect.addEventListener('change', function() {
            this.closest('form').submit();
        });
    }

    // Newsletter subscription
    const newsletterForm = document.querySelector('form[action*="newsletter"]');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;

            submitBtn.textContent = 'Subscribing...';
            submitBtn.disabled = true;

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.innerHTML = '<div class="alert alert-success mb-0">Thank you for subscribing!</div>';
                } else {
                    throw new Error(data.message || 'Subscription failed');
                }
            })
            .catch(error => {
                alert('Subscription failed. Please try again.');
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            });
        });
    }
});
</script>
@endpush
@endsection
