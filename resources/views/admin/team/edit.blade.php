@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h6 class="card-title">Edit Team Member</h6>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                    value="{{ old('name', $team->name) }}" required>
                @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <!-- Role Field -->
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" name="role" id="role" class="form-control @error('role') is-invalid @enderror" 
                    value="{{ old('role', $team->role) }}" required>
                @error('role')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <!-- Bio Field -->
            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror">{{ old('bio', $team->bio) }}</textarea>
                @error('bio')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <!-- Photo Field -->
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror">
                @if($team->photo)
                    <small>Current Photo: <a href="{{ asset('storage/' . $team->photo) }}" target="_blank">View</a></small>
                @endif
                @error('photo')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <!-- Contact Link Field -->
            <div class="form-group">
                <label for="contact_link">Contact Link</label>
                <input type="text" name="contact_link" id="contact_link" 
                    class="form-control @error('contact_link') is-invalid @enderror" 
                    value="{{ old('contact_link', $team->contact_link) }}">
                @error('contact_link')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Member</button>
            </div>
        </form>
    </div>
</div>
@endsection
