@extends('layouts.layout')

@section('content')
<section class="team">
    <!-- Header Section -->
    <div class="banner text-white" style="background: #6a1b9a; padding: 50px; text-align: center;">
        <h1>Meet Our Team</h1>
    </div>

    <!-- Team Section -->
    <div class="fade-in container py-5">
        <div class="row">
            @foreach ($team as $member)
                <div class="col-md-4">
                    <div class="card text-center" style="border-radius: 10px; box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1); border: 2px solid #6a1b9a;">
                        <div class="card-body">
                            <!-- Team Member Photo -->
                            @if($member->photo)
                                <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }} photo" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                            @else
                                <div class="rounded-circle mb-3" style="width: 100px; height: 100px; background-color: #6a1b9a; display: inline-block; line-height: 100px; color: white; font-size: 20px;">
                                    {{ strtoupper(substr($member->name, 0, 1)) }}
                                </div>
                            @endif

                            <!-- Team Member Info -->
                            <h3 class="card-title" style="color: #6a1b9a;">{{ $member->name }}</h3>
                            <h5 class="card-subtitle mb-3" style="color: #388e3c;">{{ $member->role }}</h5>
                            <p class="card-text">{{ $member->bio }}</p>

                            <!-- Contact Links -->
                            @if($member->contact_link)
                                <a href="{{ $member->contact_link }}" target="_blank" class="btn btn-outline-primary mb-2">
                                    <i class="fas fa-link"></i> View Profile
                                </a>
                            @endif

                            <!-- Additional Contact Options (e.g., Email) -->
                            @if($member->email)
                                <a href="mailto:{{ $member->email }}" class="btn btn-outline-success">
                                    <i class="fas fa-envelope"></i> Email
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
