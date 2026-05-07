@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-4">
    <h2>Manage Blogs</h2>
    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">Create Blog</a>
</div>

@if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">

            <thead class="table-light">

                <tr>
                    <th class="ps-4">Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th class="pe-4">Actions</th>
                </tr>

            </thead>

            <tbody>

                @forelse($blogs as $blog)

                    <tr>

                        <td width="120" class="ps-4">

                            @if($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}"
                                     class="rounded object-fit-cover" width="100" height="70">
                            @else
                                <div class="bg-light text-muted rounded d-flex align-items-center justify-content-center" style="width: 100px; height: 70px;">
                                    <small>No Image</small>
                                </div>
                            @endif

                        </td>

                        <td class="align-middle">
                            <span class="fw-medium">{{ $blog->title }}</span>
                        </td>

                        <td class="align-middle">
                            <span class="badge bg-secondary">{{ $blog->category->name }}</span>
                        </td>

                        <td class="align-middle text-muted">
                            {{ \Carbon\Carbon::parse($blog->published_at)->format('M d, Y') }}
                        </td>

                        <td class="align-middle pe-4">

                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                                   class="btn btn-outline-primary btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('admin.blogs.destroy', $blog->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this blog?');">
                                        Delete
                                    </button>

                                </form>
                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center py-4 text-muted">
                            No Blogs Found
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>
    </div>
</div>@endsection
