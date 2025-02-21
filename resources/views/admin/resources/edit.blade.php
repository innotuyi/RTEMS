@extends('admin.layout')
@section('content')
<section class="edit-resource">
    <div class="container py-5">
        <h1 class="text-center mb-4">Edit Resource</h1>
        
        <!-- Edit Form -->
        <form action="{{ route('resources.update', $resource->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Resource Title -->
            <div class="form-group">
                <label for="title">Resource Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $resource->title }}" required>
            </div>

            <!-- Resource Type -->
            <div class="form-group">
                <label for="type">Resource Type</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="download" {{ $resource->type == 'download' ? 'selected' : '' }}>Downloadable</option>
                    <option value="video" {{ $resource->type == 'video' ? 'selected' : '' }}>Video</option>
                    <option value="link" {{ $resource->type == 'link' ? 'selected' : '' }}>Useful Link</option>
                </select>
            </div>

            <!-- Resource Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="4" class="form-control" required>{{ $resource->description }}</textarea>
            </div>

            <!-- File Upload (for Downloadable Resources) -->
            <div class="form-group" id="file-upload-group" style="{{ $resource->type == 'download' ? '' : 'display: none;' }}">
                <label for="file">Upload File</label>
                <input type="file" name="file" id="file" class="form-control">
                @if ($resource->file)
                    <p>Current File: <a href="{{ asset('storage/uploads/' . $resource->file) }}" target="_blank">{{ $resource->file }}</a></p>
                @endif
            </div>

            <!-- Video URL (for Video Resources) -->
            <div class="form-group" id="video-url-group" style="{{ $resource->type == 'video' ? '' : 'display: none;' }}">
                <label for="video_url">Video URL</label>
                <input type="url" name="video_url" id="video_url" class="form-control" value="{{ $resource->video_url }}">
            </div>

            <!-- Link URL (for Useful Links) -->
            <div class="form-group" id="link-url-group" style="{{ $resource->type == 'link' ? '' : 'display: none;' }}">
                <label for="link_url">Link URL</label>
                <input type="url" name="link_url" id="link_url" class="form-control" value="{{ $resource->link_url }}">
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update Resource</button>
                <a href="{{ route('resources.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Show/Hide fields based on resource type
    document.getElementById('type').addEventListener('change', function () {
        const type = this.value;
        document.getElementById('file-upload-group').style.display = type === 'download' ? '' : 'none';
        document.getElementById('video-url-group').style.display = type === 'video' ? '' : 'none';
        document.getElementById('link-url-group').style.display = type === 'link' ? '' : 'none';
    });
</script>
@endpush
