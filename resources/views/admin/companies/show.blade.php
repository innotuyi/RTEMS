@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg rounded-4 p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary fw-bold">{{ $company->name }}</h2>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <h5 class="text-muted">Company Information</h5>
                <p><strong>Email:</strong> {{ $company->email }}</p>
                <p><strong>Phone:</strong> {{ $company->phone ?? 'N/A' }}</p>
                <p><strong>Website:</strong> 
                    @if($company->website)
                        <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                    @else
                        N/A
                    @endif
                </p>
                <p><strong>Industry:</strong> {{ $company->industry }}</p>
                <p><strong>Status:</strong> 
                    <span class="badge 
                        @if($company->status == 'approved') bg-success
                        @elseif($company->status == 'pending') bg-warning
                        @else bg-danger @endif">
                        {{ ucfirst($company->status) }}
                    </span>
                </p>
            </div>

            <div class="col-md-6">
                <h5 class="text-muted">Address & Certificate</h5>
                <p><strong>Address:</strong> {{ $company->address }}</p>

                @if($company->registration_certificate)
                    <p>
                        <strong>Certificate:</strong> 
                        <a href="{{ asset('storage/' . $company->registration_certificate) }}" target="_blank" class="btn btn-primary btn-sm">
                            View Certificate
                        </a>
                    </p>
                @else
                    <p><strong>Certificate:</strong> N/A</p>
                @endif
            </div>

            <div class="col-md-12 mt-4">
                <h5 class="text-muted">Additional Information</h5>
                <p><strong>Mission:</strong> {{ $company->mission }}</p>
                <p><strong>Target:</strong> {{ $company->target }}</p>
                <p><strong>Achievements:</strong> {{ $company->achievements }}</p>
                <p><strong>Number of Employees:</strong> {{ $company->number_of_employees }}</p>
                <p><strong>Education Level:</strong> {{ $company->education_level }}</p>
                <p><strong>Company Experience:</strong> {{ $company->company_experience }}</p>
                <p><strong>Partners:</strong> {{ $company->partners }}</p>
            </div>
        </div>

        <hr>

        <div class="mt-4">
            <a href="{{ route('admin.companies.edit', $company->id) }}" class="btn btn-primary me-2">Edit Company</a>
            
            <form action="{{ route('admin.companies.destroy', $company->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this company?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Company</button>
            </form>
        </div>
    </div>
</div>
@endsection
