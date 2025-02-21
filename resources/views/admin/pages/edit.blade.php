@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h6 class="card-title">Edit Page</h6>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.pages.update', $page->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Page Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" 
                       value="{{ old('title', $page->title) }}" required>
                @error('title')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Page Content</label>
                <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" 
                          rows="10" required>{{ old('content', $page->content) }}</textarea>
                @error('content')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group text-right">
                <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Page</button>
            </div>
        </form>
    </div>
</div>
@endsection
