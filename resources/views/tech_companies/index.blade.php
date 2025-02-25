@extends('layouts.layout')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-warning fw-bold text-center">Registered Tech Companies</h2>
    <p class="text-center text-secondary">Explore leading Rwandan tech companies specializing in various industries.</p>
    <div class="row">
        @foreach(range(1, 6) as $index)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-dark fw-bold">Company {{ $index }} - {{ ['AI Solutions', 'Cyber Security', 'Cloud Computing', 'Fintech', 'Blockchain', 'E-commerce'][array_rand(['AI Solutions', 'Cyber Security', 'Cloud Computing', 'Fintech', 'Blockchain', 'E-commerce'])] }}</h5>
                    <p class="text-muted">Providing cutting-edge technology services to global markets.</p>
                    <a href="{{ route('profile.index') }}" class="btn btn-primary btn-sm">View Profile</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection