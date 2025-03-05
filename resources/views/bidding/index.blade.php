@extends('layouts.layout')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-warning fw-bold text-center">Bidding Opportunities</h2>
    <p class="text-center text-secondary">Discover the latest technology tenders and contracts available for bidding.</p>

    <div class="row">
        @forelse($bids as $bid)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-dark fw-bold">{{ $bid->title }}</h5>
                        <p class="text-muted"><i class="fas fa-calendar-alt text-primary"></i> Deadline: <strong>{{ $bid->deadline }}</strong></p>
                        <p class="text-muted"><i class="fas fa-tags text-warning"></i> Category: <strong>{{ ucfirst($bid->category) }}</strong></p>
                        <span class="badge {{ $bid->status == 'open' ? 'bg-success' : ($bid->status == 'closed' ? 'bg-danger' : 'bg-secondary') }}">
                            {{ ucfirst($bid->status) }}
                        </span>
                        {{-- <a href="{{ route('bidding.show', $bid->id) }}" class="btn btn-primary btn-sm mt-3">View Details</a> --}}
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">No bidding opportunities available at the moment.</p>
        @endforelse
    </div>
</div>
@endsection