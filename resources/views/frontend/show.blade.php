@extends('layouts.app')

@section('content')

<div class="row justify-content-center py-5">
    <!-- Main Reading Column (Max width ~700px for optimal readability) -->
    <div class="col-11 col-md-10 col-lg-8 col-xl-7">

        <div class="mb-5">
            <!-- Breadcrumb / Back -->
            <a href="{{ route('home') }}" class="text-decoration-none text-muted d-inline-flex align-items-center mb-4 small text-uppercase fw-bold letter-spacing-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                Back
            </a>

            <!-- Title -->
            <h1 class="fw-bolder text-dark mb-4" style="font-size: 2.5rem; line-height: 1.15; letter-spacing: -0.03em;">
                {{ $blog->title }}
            </h1>

            <!-- Author & Meta Info (Medium style) -->
            <div class="d-flex align-items-center mb-4">
                <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center me-3 fw-bold" style="width: 48px; height: 48px; font-size: 1.2rem;">
                    A
                </div>
                <div>
                    <div class="d-flex align-items-center">
                        <span class="fw-medium text-dark">Author Name</span>
                        <button class="btn btn-sm btn-link text-success text-decoration-none py-0">Follow</button>
                    </div>
                    <div class="text-muted small d-flex align-items-center mt-1">
                        <span>5 min read</span>
                        <span class="mx-2">&middot;</span>
                        <span>{{ \Carbon\Carbon::parse($blog->published_at)->format('M d, Y') }}</span>
                        <span class="mx-2">&middot;</span>
                        <span class="badge bg-light text-secondary rounded-pill fw-normal">{{ $blog->category->name }}</span>
                    </div>
                </div>
            </div>

            <!-- Social/Action Actions -->
            <div class="d-flex justify-content-between align-items-center py-3 border-top border-bottom mb-5">
                <div class="d-flex gap-4">
                    <span class="text-muted d-flex align-items-center" style="cursor: pointer;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="me-2"><path d="M12.5 21v-2c-2.4 0-4.6-.9-6.3-2.6S3.5 12.5 3.5 10H1.5c0 3 .1 5.8 2.2 7.9 2 2.1 4.8 3.1 8.8 3.1zm0-18v2c2.4 0 4.6.9 6.3 2.6S21.5 11.5 21.5 14h2c0-3-.1-5.8-2.2-7.9-2-2.1-4.8-3.1-8.8-3.1z" fill="currentColor"></path><path d="M12.5 18v-2c1.9 0 3.6-.7 4.9-2s2-3 2-4.9h2c0 2.4-.9 4.7-2.6 6.3-1.7 1.7-4 2.6-6.3 2.6z" fill="currentColor"></path><path d="M12.5 6v2c-1.9 0-3.6.7-4.9 2s-2 3-2 4.9h-2C3.6 12.5 4.5 10.2 6.2 8.6 7.9 6.9 10.2 6 12.5 6z" fill="currentColor"></path></svg>
                        1.2K
                    </span>
                    <span class="text-muted d-flex align-items-center" style="cursor: pointer;">
                        <svg width="24" height="24" viewBox="0 0 24 24" class="me-2" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M3 12c0-1.1.9-2 2-2h14a2 2 0 110 4H5a2 2 0 01-2-2zm0 7c0-1.1.9-2 2-2h14a2 2 0 110 4H5a2 2 0 01-2-2zm0-14c0-1.1.9-2 2-2h14a2 2 0 110 4H5a2 2 0 01-2-2z" fill="currentColor"></path></svg>
                        42
                    </span>
                </div>
                <div class="d-flex gap-3 text-muted">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16" style="cursor: pointer;">
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16" style="cursor: pointer;">
                      <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Featured Image -->
        @if($blog->image)
        <div class="mb-5 text-center">
            <img src="{{ asset('storage/' . $blog->image) }}"
                 class="img-fluid w-100"
                 alt="{{ $blog->title }}"
                 style="object-fit: cover;">
            <div class="text-muted mt-2 small text-center">Image related to {{ $blog->title }}</div>
        </div>
        @endif

        <!-- Blog Content -->
        <!-- Medium uses a serif font for body text for maximum readability, typically around 20px -->
        <div class="blog-content text-dark" style="font-family: 'Georgia', serif; font-size: 1.25rem; line-height: 1.8; letter-spacing: -0.003em; color: #242424 !important;">
            
            {!! $blog->content !!}

        </div>

    </div>
</div>

<style>
    /* Styling adjustments to match the rest of the site */
    body {
        background-color: #fff;
    }
    .letter-spacing-1 {
        letter-spacing: 0.1em;
    }
    
    /* TinyMCE output styles correction */
    .blog-content p {
        margin-bottom: 2rem;
    }
    .blog-content h2, .blog-content h3 {
        font-family: 'Inter', sans-serif;
        font-weight: 700;
        margin-top: 3rem;
        margin-bottom: 1rem;
        color: #242424;
    }
    .blog-content img {
        max-width: 100%;
        height: auto;
        margin: 2rem 0;
    }
    .blog-content blockquote {
        border-left: 3px solid #242424;
        padding-left: 1.5rem;
        margin-left: 0;
        font-style: italic;
        color: #6b6b6b;
    }
</style>

@endsection