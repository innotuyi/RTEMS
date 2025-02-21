
@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Edit Program</h1>

    <form action="{{ route('admin.programs.update', $program->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $program->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $program->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="icon">Icon</label>
            <input type="file" name="icon" id="icon" class="form-control">
            @if($program->icon)
                <img src="{{ asset('storage/' . $program->icon) }}" alt="icon" width="50">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update Program</button>
    </form>
</div>
@endsection
