
@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Create Program</h1>

    <form action="{{ route('admin.programs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="icon">Icon</label>
            <input type="file" name="icon" id="icon" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Create Program</button>
    </form>
</div>
@endsection
