@extends('layouts.layout')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <div class="row">
                <!-- Company Logo -->
                <div class="col-md-4 text-center">
                    {{-- <img src="{{ $company->logo ? asset('storage/' . $company->logo) : 'https://www.ishyiga.net/web/assets/images/logo-company.png' }}" class="img-fluid rounded-circle mb-3" alt="Company Logo"> --}}
                    <h3 class="text-primary fw-bold">{{ $company->name }}</h3>
                    <span class="badge bg-warning text-dark">Industry: {{ $company->industry }}</span>
                </div>

                <!-- Company Info -->
                <div class="col-md-8">
                    <h4 class="fw-bold text-dark">About Us</h4>
                    <p class="text-muted">
                        {{ $company->description ?? 'No description available.' }}
                    </p>

                    <h5 class="fw-bold text-dark mt-4">Mission</h5>
                    <p>{{ $company->mission ?? 'No mission statement available.' }}</p>

                    <h5 class="fw-bold text-dark mt-4">Services</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check-circle text-success"></i> {{ $company->service ?? 'No services listed.' }}</li>
                    </ul>

                    <h5 class="fw-bold text-dark mt-4">Contact Information</h5>
                    <p><i class="fas fa-envelope text-primary"></i> {{ $company->email ?? 'No email provided.' }}</p>
                    <p><i class="fas fa-phone text-primary"></i> {{ $company->phone ?? 'No phone number provided.' }}</p>
                    <p><i class="fas fa-map-marker-alt text-primary"></i> {{ $company->address ?? 'No address provided.' }}</p>

                    @if($company->website)
                        <a href="{{ $company->website }}" target="_blank" class="btn btn-primary btn-lg mt-3">Visit Website</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
