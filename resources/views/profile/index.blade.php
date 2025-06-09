@extends('layouts.layout')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <div class="row">
                <!-- Company Header -->
                <div class="col-12 text-center mb-4">
                    <h2 class="text-primary fw-bold">{{ $company->name }}</h2>
                    <span class="badge bg-warning text-dark">Industry: {{ $company->industry }}</span>
                </div>

                <!-- Company Overview -->
                <div class="col-md-4">
                    <div class="card bg-white mb-4">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-primary mb-4">Company Overview</h5>
                            <div class="company-info">
                                <div class="info-item mb-4">
                                    <div class="d-flex align-items-start">
                                        <i class="fas fa-envelope text-primary me-3 fs-5 mt-1"></i>
                                        <div>
                                            <div class="text-dark fw-semibold mb-1">Email</div>
                                            <div class="text-dark fs-6">{{ $company->email ?? 'No email provided' }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="info-item mb-4">
                                    <div class="d-flex align-items-start">
                                        <i class="fas fa-phone text-primary me-3 fs-5 mt-1"></i>
                                        <div>
                                            <div class="text-dark fw-semibold mb-1">Phone</div>
                                            <div class="text-dark fs-6">{{ $company->phone ?? 'No phone provided' }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="info-item mb-4">
                                    <div class="d-flex align-items-start">
                                        <i class="fas fa-map-marker-alt text-primary me-3 fs-5 mt-1"></i>
                                        <div>
                                            <div class="text-dark fw-semibold mb-1">Address</div>
                                            <div class="text-dark fs-6">{{ $company->address ?? 'No address provided' }}</div>
                                        </div>
                                    </div>
                                </div>

                                @if($company->website)
                                    <div class="info-item mb-4">
                                        <div class="d-flex align-items-start">
                                            <i class="fas fa-globe text-primary me-3 fs-5 mt-1"></i>
                                            <div>
                                                <div class="text-dark fw-semibold mb-1">Website</div>
                                                <a href="{{ $company->website }}" target="_blank" class="text-primary text-decoration-none fs-6">{{ $company->website }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($company->number_of_employees)
                                    <div class="info-item mb-4">
                                        <div class="d-flex align-items-start">
                                            <i class="fas fa-users text-primary me-3 fs-5 mt-1"></i>
                                            <div>
                                                <div class="text-dark fw-semibold mb-1">Employees</div>
                                                <div class="text-dark fs-6">{{ $company->number_of_employees }} Employees</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($company->company_experience)
                                    <div class="info-item mb-4">
                                        <div class="d-flex align-items-start">
                                            <i class="fas fa-clock text-primary me-3 fs-5 mt-1"></i>
                                            <div>
                                                <div class="text-dark fw-semibold mb-1">Experience</div>
                                                <div class="text-dark fs-6">{{ $company->company_experience }} Years</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Company Details -->
                <div class="col-md-8">
                    <!-- Mission -->
                    @if($company->mission)
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-primary">Mission</h5>
                                <p class="card-text">{{ $company->mission }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Services -->
                    @if($company->service)
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-primary">Services</h5>
                                <p class="card-text">{{ $company->service }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Target -->
                    @if($company->target)
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-primary">Target</h5>
                                <p class="card-text">{{ $company->target }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Achievements -->
                    @if($company->achievements)
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-primary">Achievements</h5>
                                <p class="card-text">{{ $company->achievements }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Education & Experience -->
                    @if($company->education_level || $company->company_experience)
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-primary">Qualifications & Experience</h5>
                                @if($company->education_level)
                                    <p><strong>Education Level:</strong> {{ $company->education_level }}</p>
                                @endif
                                @if($company->company_experience)
                                    <p><strong>Company Experience:</strong> {{ $company->company_experience }}</p>
                                @endif
                            </div>
                        </div>
                    @endif

                    <!-- Partners -->
                    @if($company->partners)
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-primary">Partners</h5>
                                <p class="card-text">{{ $company->partners }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Registration Certificate -->
                    @if($company->registration_certificate)
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-primary">Registration Certificate</h5>
                                <a href="{{ asset('storage/' . $company->registration_certificate) }}" target="_blank" class="btn btn-primary">
                                    <i class="fas fa-file-pdf me-2"></i>View Certificate
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.company-info .info-item {
    border-bottom: 1px solid rgba(0,0,0,0.1);
    padding-bottom: 1rem;
}

.company-info .info-item:last-child {
    border-bottom: none;
    margin-bottom: 0 !important;
    padding-bottom: 0;
}

.company-info .info-item .text-dark {
    color: #2c3e50 !important;
}

.company-info .info-item a:hover {
    color: #0056b3 !important;
    text-decoration: underline !important;
}

.card {
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.card-body {
    padding: 1.5rem;
}
</style>
@endsection
