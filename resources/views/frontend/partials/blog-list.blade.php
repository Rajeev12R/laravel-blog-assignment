<div class="row justify-content-center">
    <div class="col-lg-10 col-xl-8">
        
        @forelse($blogs as $blog)
            <div class="card border-0 mb-4 pb-4 px-4 border-bottom rounded-0 medium-card bg-transparent">
                <div class="row g-4 align-items-center">
                    
                    <div class="col-8 col-md-9 order-2 order-md-1">
                        <div class="d-flex align-items-center mb-2">
                            <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center me-2 fw-bold" style="width: 24px; height: 24px; font-size: 12px;">
                                A
                            </div>
                            <span class="text-dark fw-medium small me-2">Author Name</span>
                        </div>
                        
                        <a href="{{ route('blog.show', $blog->slug) }}" class="text-decoration-none text-dark">
                            <h2 class="fw-bold mb-2 medium-title line-clamp-2" style="font-size: 1.4rem; letter-spacing: -0.02em;">
                                {{ $blog->title }}
                            </h2>
                            <p class="text-muted d-none d-md-block mb-3 medium-excerpt line-clamp-2" style="font-family: 'Georgia', serif; font-size: 1.05rem; line-height: 1.5;">
                                {{ \Illuminate\Support\Str::limit($blog->short_description, 160) }}
                            </p>
                        </a>
                        
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center text-muted small">
                                <span>{{ \Carbon\Carbon::parse($blog->published_at)->format('M d') }}</span>
                                <span class="mx-2">&middot;</span>
                                <span>5 min read</span>
                                <span class="mx-2">&middot;</span>
                                <span class="badge bg-light text-secondary rounded-pill px-3">{{ $blog->category->name }}</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmark text-muted bookmark-icon" viewBox="0 0 16 16" style="cursor: pointer;">
                                  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-4 col-md-3 order-1 order-md-2 d-flex justify-content-end">
                        <a href="{{ route('blog.show', $blog->slug) }}">
                            @if($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" 
                                     alt="{{ $blog->title }}" 
                                     class="img-fluid rounded" 
                                     style="width: 120px; height: 120px; object-fit: cover;">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted" style="width: 120px; height: 120px; font-size: 0.8rem;">
                                    No Image
                                </div>
                            @endif
                        </a>
                    </div>

                </div>
            </div>
        @empty
            <div class="text-center py-5">
                <h4 class="text-muted fw-bold">No Stories Found</h4>
                <p class="text-secondary">Try a different search or category.</p>
            </div>
        @endforelse

    </div>
</div>

<div class="mt-4 d-flex justify-content-center custom-pagination">
    {{ $blogs->links() }}
</div>