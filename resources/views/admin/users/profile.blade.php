@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg rounded-4 p-4">
        
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary fw-bold">User Profile</h2>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
        </div>

        <!-- Profile Overview -->
        <div class="row g-4">
            <!-- Left Section: Profile Info -->
            <div class="col-md-4 text-center">
                <div class="profile-avatar mb-3">
                    <img src="{{ asset($profile->avatar ?? 'assets/default-avatar.png') }}" class="rounded-circle img-fluid" alt="User Avatar" width="150">
                </div>
                <h4 class="fw-bold">{{ $profile->name }}</h4>
                <p class="text-muted">{{ ucfirst($profile->role) }}</p>
            </div>

            <!-- Right Section: User Details -->
            <div class="col-md-8">
                <h5 class="text-muted">Profile Information</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Email:</strong> {{ $profile->email }}</li>
                    <li class="list-group-item"><strong>Phone:</strong> {{ $profile->phone ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Address:</strong> {{ $profile->address ?? 'N/A' }}</li>
                    {{-- <li class="list-group-item"><strong>Status:</strong> 
                        <span class="badge 
                            @if($profile->status == 'active') bg-success 
                            @else bg-danger @endif">
                            {{ ucfirst($profile->status) }}
                        </span>
                    </li> --}}
                    <li class="list-group-item"><strong>Joined:</strong> {{ date('F d, Y', strtotime($profile->created_at)) }}</li>
                </ul>
            </div>
        </div>

        <!-- Profile Actions -->
        <div class="mt-4 d-flex justify-content-end gap-3">
            <a href="{{ route('admin.users.edit', $profile->id) }}" class="btn btn-primary">Edit Profile</a>

            <form action="{{ route('admin.users.destroy', $profile->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete User</button>
            </form>
        </div>
    </div>
</div>
@endsection
