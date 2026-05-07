@extends('layouts.app')

@section('content')

<h2 class="mb-4">Create Blog</h2>

<form action="{{ route('admin.blogs.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label>Title</label>

        <input type="text"
               name="title"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Short Description</label>

        <textarea name="short_description"
                  class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Content</label>

        <textarea name="content"
                  id="content-editor"
                  rows="10"
                  class="form-control"></textarea>
    </div>

    <div class="mb-3">

        <label>Category</label>

        <select name="category_id"
                class="form-control">

            @foreach($categories as $category)

                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label>Image</label>

        <input type="file"
               name="image"
               class="form-control">

    </div>

    <button class="btn btn-success">
        Save Blog
    </button>

</form>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.3/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#content-editor',
        plugins: 'advlist autolink lists link image charmap preview anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking table emoticons template help',
        toolbar: 'undo redo | styles | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | table emoticons charmap | code fullscreen preview | pagebreak',
        menubar: 'file edit view insert format tools table help',
        height: 500,
        promotion: false,
        branding: false
    });
</script>
@endpush