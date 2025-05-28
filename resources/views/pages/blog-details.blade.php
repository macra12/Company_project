{{-- blog-details.blade.php --}}
@extends('layouts.app')

@section('title', $post->title . ' - Company Bootstrap Template')
@section('meta_description', $post->excerpt ?: Str::limit(strip_tags($post->content), 160))

@push('head')
<!-- Open Graph meta tags -->
<meta property="og:title" content="{{ $post->title }}">
<meta property="og:description" content="{{ $post->excerpt ?: Str::limit(strip_tags($post->content), 160) }}">
<meta property="og:image" content="{{ $post->featured_image ? asset('storage/' . $post->featured_image) : asset('theme/assets/img/blog/default-blog.jpg') }}">
<meta property="og:url" content="{{ route('blog-details', $post->slug) }}">
<meta property="og:type" content="article">

<!-- Twitter Card meta tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $post->title }}">
<meta name="twitter:description" content="{{ $post->excerpt ?: Str::limit(strip_tags($post->content), 160) }}">
<meta name="twitter:image" content="{{ $post->featured_image ? asset('storage/' . $post->featured_image) : asset('theme/assets/img/blog/default-blog.jpg') }}">

<!-- JSON-LD structured data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "headline": "{{ $post->title }}",
  "description": "{{ $post->excerpt ?: Str::limit(strip_tags($post->content), 160) }}",
  "image": "{{ $post->featured_image ? asset('storage/' . $post->featured_image) : asset('theme/assets/img/blog/default-blog.jpg') }}",
  "author": {
    "@type": "Person",
    "name": "{{ $post->author->name }}"
  },
  "publisher": {
    "@type": "Organization",
    "name": "{{ config('app.name') }}"
  },
  "datePublished": "{{ $post->published_at->toISOString() }}",
  "dateModified": "{{ $post->updated_at->toISOString() }}"
}
</script>
@endpush

@section('content')
<!-- Page Title -->
<div class="page-title accent-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Blog Details</h1>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('blog') }}">Blog</a></li>
                <li class="current">{{ Str::limit($post->title, 50) }}</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <!-- Blog Details Section -->
            <section id="blog-details" class="blog-details section">
                <div class="container">
                    <article class="article">
                        @if($post->featured_image)
                            <div class="post-img">
                                <img src="{{ asset('storage/' . $post->featured_image) }}"
                                     alt="{{ $post->title }}" class="img-fluid">
                            </div>
                        @endif

                        <h1 class="title">{{ $post->title }}</h1>

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
                                    <a href="#comments">{{ $post->comments_count }} {{ Str::plural('Comment', $post->comments_count) }}</a>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-eye"></i> {{ $post->views_count }} views
                                </li>
                                @if($post->reading_time)
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-hourglass-split"></i> {{ $post->reading_time }} min read
                                    </li>
                                @endif
                            </ul>
                        </div><!-- End meta top -->

                        <!-- Share buttons -->
                        <div class="share-buttons mb-4">
                            <span class="me-3">Share this article:</span>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(route('blog-details', $post->slug)) }}"
                               target="_blank" class="btn btn-outline-primary btn-sm me-2">
                                <i class="bi bi-twitter"></i> Twitter
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog-details', $post->slug)) }}"
                               target="_blank" class="btn btn-outline-primary btn-sm me-2">
                                <i class="bi bi-facebook"></i> Facebook
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog-details', $post->slug)) }}"
                               target="_blank" class="btn btn-outline-primary btn-sm me-2">
                                <i class="bi bi-linkedin"></i> LinkedIn
                            </a>
                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="copyToClipboard('{{ route('blog-details', $post->slug) }}')">
                                <i class="bi bi-link-45deg"></i> Copy Link
                            </button>
                        </div>

                        <div class="content">
                            {!! $post->content !!}
                        </div><!-- End post content -->

                        <div class="meta-bottom">
                            @if($post->category)
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a href="{{ route('blog', ['category' => $post->category->slug]) }}">{{ $post->category->name }}</a></li>
                                </ul>
                            @endif

                            @if($post->tags->count() > 0)
                                <i class="bi bi-tags"></i>
                                <ul class="tags">
                                    @foreach($post->tags as $tag)
                                        <li><a href="{{ route('blog', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div><!-- End meta bottom -->

                        <!-- Author info -->
                        @if($post->author->bio)
                            <div class="author-info mt-5 p-4 bg-light rounded">
                                <div class="d-flex">
                                    <img src="{{ $post->author->avatar ? asset('storage/' . $post->author->avatar) : asset('theme/assets/img/default-avatar.jpg') }}"
                                         class="rounded-circle me-3" style="width: 80px; height: 80px; object-fit: cover;" alt="{{ $post->author->name }}">
                                    <div>
                                        <h5>About {{ $post->author->name }}</h5>
                                        <p class="mb-2">{{ $post->author->bio }}</p>
                                        @if($post->author->social_links)
                                            <div class="social-links">
                                                @foreach($post->author->social_links as $platform => $url)
                                                    <a href="{{ $url }}" target="_blank" class="me-2">
                                                        <i class="bi bi-{{ $platform }}"></i>
                                                    </a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Related posts -->
                        @if($relatedPosts->count() > 0)
                            <div class="related-posts mt-5">
                                <h4>Related Articles</h4>
                                <div class="row">
                                    @foreach($relatedPosts as $relatedPost)
                                        <div class="col-md-6 mb-3">
                                            <div class="card h-100">
                                                @if($relatedPost->featured_image)
                                                    <img src="{{ asset('storage/' . $relatedPost->featured_image) }}"
                                                         class="card-img-top" alt="{{ $relatedPost->title }}" style="height: 200px; object-fit: cover;">
                                                @endif
                                                <div class="card-body d-flex flex-column">
                                                    <h6 class="card-title">
                                                        <a href="{{ route('blog-details', $relatedPost->slug) }}" class="text-decoration-none">
                                                            {{ $relatedPost->title }}
                                                        </a>
                                                    </h6>
                                                    <p class="card-text text-muted small flex-grow-1">
                                                        {{ Str::limit(strip_tags($relatedPost->content), 100) }}
                                                    </p>
                                                    <div class="text-muted small">
                                                        <i class="bi bi-clock"></i> {{ $relatedPost->published_at->diffForHumans() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </article>
                </div>
            </section><!-- /Blog Details Section -->

            <!-- Blog Comments Section -->
            <section id="blog-comments" class="blog-comments section">
                <div class="container">
                    <h4 class="comments-count">{{ $post->comments_count }} {{ Str::plural('Comment', $post->comments_count) }}</h4>

                    @if($post->comments->count() > 0)
                        <div class="comments-list">
                            @foreach($post->comments->where('parent_id', null) as $comment)
                                @include('partials.comment', ['comment' => $comment])
                            @endforeach
                        </div>
                    @else
                        <div class="no-comments text-center py-4">
                            <i class="bi bi-chat-dots display-4 text-muted"></i>
                            <p class="text-muted mt-2">No comments yet. Be the first to share your thoughts!</p>
                        </div>
                    @endif
                </div>
            </section><!-- /Blog Comments Section -->

            <!-- Comment Form Section -->
            <section id="comment-form" class="comment-form section">
                <div class="container">
                    @auth
                        <form action="{{ route('blog.comment', $post->slug) }}" method="POST" class="comment-form-auth">
                            @csrf
                            <h4>Leave a Comment</h4>
                            <div class="d-flex mb-3">
                                <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('theme/assets/img/default-avatar.jpg') }}"
                                     class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;" alt="{{ auth()->user()->name }}">
                                <div class="flex-grow-1">
                                    <div class="form-group">
                                        <textarea name="content" class="form-control" rows="4"
                                                  placeholder="Share your thoughts..." required></textarea>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small class="text-muted">Commenting as {{ auth()->user()->name }}</small>
                                        <button type="submit" class="btn btn-primary">Post Comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="login-to-comment text-center py-4">
                            <h4>Join the Discussion</h4>
                            <p class="text-muted mb-3">Please log in to leave a comment</p>
                            <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary">Sign Up</a>
                        </div>
                    @endif
                </div>
            </section><!-- /Comment Form Section -->
        </div>

        <div class="col-lg-4 sidebar">
            <div class="widgets-container">
                <!-- Search Widget -->
                <div class="search-widget widget-item">
                    <h3 class="widget-title">Search</h3>
                    <form action="{{ route('blog') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control"
                                   placeholder="Search articles..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-outline-secondary">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div><!-- /Search Widget -->

                <!-- Recent Posts Widget -->
                <div class="recent-posts-widget widget-item">
                    <h3 class="widget-title">Recent Posts</h3>
                    @foreach($recentPosts ?? [] as $recentPost)
                        <div class="post-item">
                            <div class="d-flex">
                                @if($recentPost->featured_image)
                                    <img src="{{ asset('storage/' . $recentPost->featured_image) }}"
                                         class="me-3 rounded" style="width: 60px; height: 60px; object-fit: cover;"
                                         alt="{{ $recentPost->title }}">
                                @endif
                                <div>
                                    <h6><a href="{{ route('blog-details', $recentPost->slug) }}">{{ $recentPost->title }}</a></h6>
                                    <time class="text-muted small" datetime="{{ $recentPost->published_at->format('Y-m-d') }}">
                                        {{ $recentPost->published_at->format('M j, Y') }}
                                    </time>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div><!-- /Recent Posts Widget -->

                <!-- Categories Widget -->
                <div class="categories-widget widget-item">
                    <h3 class="widget-title">Categories</h3>
                    <ul class="list-unstyled">
                        @foreach($categories ?? [] as $category)
                            <li class="d-flex justify-content-between align-items-center mb-2">
                                <a href="{{ route('blog', ['category' => $category->slug]) }}"
                                   class="text-decoration-none">{{ $category->name }}</a>
                                <span class="badge bg-secondary">{{ $category->posts_count }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div><!-- /Categories Widget -->

                <!-- Tags Widget -->
                <div class="tags-widget widget-item">
                    <h3 class="widget-title">Popular Tags</h3>
                    <div class="tags-cloud">
                        @foreach($popularTags ?? [] as $tag)
                            <a href="{{ route('blog', ['tag' => $tag->slug]) }}"
                               class="badge bg-light text-dark me-1 mb-1 text-decoration-none">
                                {{ $tag->name }}
                                <span class="ms-1 text-muted">({{ $tag->posts_count }})</span>
                            </a>
                        @endforeach
                    </div>
                </div><!-- /Tags Widget -->

                <!-- Newsletter Widget -->
                <div class="newsletter-widget widget-item">
                    <h3 class="widget-title">Stay Updated</h3>
                    <p class="text-muted">Get our latest articles delivered to your inbox.</p>
                    <form action="{{ route('newsletter.subscribe') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control"
                                   placeholder="Your email address" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Subscribe</button>
                    </form>
                </div><!-- /Newsletter Widget -->
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function copyToClipboard(url) {
    navigator.clipboard.write(url).then(() => {
        alert('Link copied to clipboard!');
    }).catch(() => {
        alert('Failed to copy link.');
    });
}
</script>
@endpush
@endsection
