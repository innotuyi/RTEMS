@extends('admin.layout')

@section('content')
<div class="container">
    <h1 class="mb-4">{{ isset($page) ? 'Edit Page' : 'Add Page' }}</h1>
    <form action="{{ isset($page) ? route('admin.pages.update', $page->id) : route('admin.pages.store') }}" method="POST">
        @csrf
        @if(isset($page))
            @method('PUT')
        @endif
        
        <div class="mb-3">
            <label for="title" class="form-label">Page Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $page->title ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Page Content</label>
            <textarea name="content" id="content" class="form-control">{{ old('content', $page->content ?? '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($page) ? 'Update Page' : 'Create Page' }}</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('content');
</script>
@endsection
