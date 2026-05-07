@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3 mb-5">
    <div class="col-lg-10 col-xl-8 border-bottom pb-4">
        
        <div class="overflow-auto hide-scrollbar mb-4 mt-2">
            <div class="d-flex flex-nowrap gap-3 align-items-center" id="category-pills" style="white-space: nowrap;">
                <button class="btn btn-link text-decoration-none text-dark fw-bold px-0 category-btn active border-bottom border-dark border-2 rounded-0 pb-1" data-id="" style="line-height: 1;">
                    For you
                </button>
                @foreach($categories as $category)
                    <button class="btn btn-link text-decoration-none text-muted px-0 category-btn pb-1" data-id="{{ $category->id }}" style="line-height: 1;">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
            <input type="hidden" id="category" value="">
        </div>

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 bg-light rounded-pill px-4 py-2">
            <div class="input-group border-0 bg-transparent flex-grow-1">
                <span class="input-group-text bg-transparent border-0 pe-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search text-muted" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </span>
                <input type="text"
                       id="search"
                       class="form-control bg-transparent border-0 shadow-none ps-0"
                       placeholder="Search stories...">
            </div>
            <div class="d-flex align-items-center border-start ps-3 border-secondary border-opacity-25 flex-shrink-0">
                <input type="date" id="date_filter" class="form-control bg-transparent border-0 shadow-none text-muted" style="cursor: pointer; width: 140px;">
            </div>
            <div class="d-flex align-items-center border-start ps-3 border-secondary border-opacity-25 flex-shrink-0" style="width: 140px;">
                <select id="sort" class="form-select bg-transparent border-0 shadow-none text-muted fw-medium py-0 w-100" style="cursor: pointer;">
                    <option value="latest">Latest</option>
                    <option value="oldest">Oldest</option>
                </select>
            </div>
        </div>

    </div>
</div>

<!-- Blog List Container -->
<div id="blog-container">
    @include('frontend.partials.blog-list')
</div>

<style>
    body {
        background-color: #fff;
    }
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    
    .category-btn {
        font-size: 0.95rem;
        transition: color 0.2s;
    }
    .category-btn:not(.active):hover {
        color: #212529 !important;
    }
    .category-btn.active {
        border-bottom: 2px solid #212529 !important;
    }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .medium-card {
        transition: opacity 0.2s;
    }
    .medium-card:hover {
        opacity: 0.85;
    }
    
    .bookmark-icon:hover {
        color: #212529 !important;
    }

    .custom-pagination .pagination {
        gap: 0.25rem;
    }
    .custom-pagination .page-item .page-link {
        border-radius: 50%;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6c757d;
        border: none;
        font-weight: 500;
    }
    .custom-pagination .page-item.active .page-link {
        background-color: #212529;
        color: white;
    }
    .custom-pagination .page-item:not(.active) .page-link:hover {
        background-color: #f8f9fa;
        color: #212529;
    }
    .custom-pagination .page-item.disabled .page-link {
        background-color: transparent;
    }
</style>

@endsection

@push('scripts')
<script>
$(document).ready(function () {
    let debounceTimer;

    function fetchBlogs(page = 1) {
        $('#blog-container').css('opacity', '0.5');
        
        $.ajax({
            url: "{{ route('blogs.filter') }}?page=" + page,
            type: "GET",
            data: {
                search: $('#search').val(),
                category: $('#category').val(),
                sort: $('#sort').val(),
                date: $('#date_filter').val()
            },
            success: function (response) {
                $('#blog-container').html(response).css('opacity', '1');
            },
            error: function() {
                $('#blog-container').css('opacity', '1');
            }
        });
    }

    $('#search').on('keyup', function () {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(function() {
            fetchBlogs();
        }, 300);
    });

    $('#sort, #date_filter').on('change', function () {
        fetchBlogs();
    });

    $('.category-btn').on('click', function() {
        $('.category-btn').removeClass('text-dark fw-bold active border-bottom border-dark border-2 rounded-0').addClass('text-muted');
        $(this).removeClass('text-muted').addClass('text-dark fw-bold active border-bottom border-dark border-2 rounded-0');
        
        $('#category').val($(this).data('id'));
        fetchBlogs();
    });

    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var url = new URL($(this).attr('href'));
        var page = url.searchParams.get("page");
        fetchBlogs(page);
        
        $('html, body').animate({
            scrollTop: 0
        }, 200);
    });
});
</script>
@endpush