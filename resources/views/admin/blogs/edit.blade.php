@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h6 class="card-title">Edit Blog</h6>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $blog->title) }}" required>
                @error('title')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="5" required>{{ old('content', $blog->content) }}</textarea>
                @error('content')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Current Image</label>
                @if ($blog->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" style="max-width: 100px; height: auto;">
                    </div>
                @else
                    <p>No image uploaded</p>
                @endif
            </div>

            <div class="form-group">
                <label for="image">Change Image</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update Blog</button>
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
