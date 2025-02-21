@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h6 class="card-title">Create Blog</h6>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                @error('title')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="5" required>{{ old('content') }}</textarea>
                @error('content')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection
