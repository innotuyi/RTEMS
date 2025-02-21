@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h6 class="card-title">Add New Team Member</h6>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" name="role" id="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role') }}" required>
                @error('role')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror">{{ old('bio') }}</textarea>
                @error('bio')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror">
                @error('photo')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="contact_link">Contact Link</label>
                <input type="text" name="contact_link" id="contact_link" class="form-control @error('contact_link') is-invalid @enderror" value="{{ old('contact_link') }}">
                @error('contact_link')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group text-right">
                <a href="{{ route('admin.team.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Add Team Member</button>
            </div>
        </form>
    </div>
</div>
@endsection
