@extends('layouts.layout')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-warning fw-bold text-center">Registered Tech Companies</h2>
    <p class="text-center text-secondary">Explore leading Rwandan tech companies specializing in various industries.</p>

    <div class="row">
        @forelse($companies as $company)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-dark fw-bold">{{ $company->name }}</h5>
                        <p class="text-muted">{{ $company->mission ?? 'Providing cutting-edge technology services to global markets.' }}</p>
                        <a href="{{ route('profile.index', ['id' => $company->id]) }}" class="btn btn-primary btn-sm">View Profile</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center text-muted">No tech companies found.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
