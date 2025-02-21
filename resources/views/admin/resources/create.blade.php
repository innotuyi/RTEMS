@extends('admin.layout')

@section('content')
<h1>{{ isset($resource) ? 'Edit Resource' : 'Add New Resource' }}</h1>

<form action="{{ isset($resource) ? route('admin.resources.update', $resource->id) : route('admin.resources.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($resource))
    @method('PUT')
    @endif

    <div class="form-group">
        <label for="type">Resource Type</label>
        <select name="type" id="type" class="form-control" required>
            <option value="download" {{ isset($resource) && $resource->type == 'download' ? 'selected' : '' }}>Download</option>
            <option value="video" {{ isset($resource) && $resource->type == 'video' ? 'selected' : '' }}>Video</option>
            <option value="link" {{ isset($resource) && $resource->type == 'link' ? 'selected' : '' }}>Link</option>
        </select>
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $resource->title ?? '') }}" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control">{{ old('description', $resource->description ?? '') }}</textarea>
    </div>

    <div class="form-group">
        <label for="file_path">File (PDF/Video)</label>
        <input type="file" name="file_path" id="file_path" class="form-control">
    </div>

    <div class="form-group">
        <label for="url">URL</label>
        <input type="url" name="url" id="url" class="form-control" value="{{ old('url', $resource->url ?? '') }}">
    </div>

    <button type="submit" class="btn btn-success">{{ isset($resource) ? 'Update' : 'Add' }} Resource</button>
</form>
@endsection
