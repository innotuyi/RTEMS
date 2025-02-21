@extends('layouts.layout')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-warning fw-bold text-center">Bidding Opportunities</h2>
    <p class="text-center text-secondary">Discover the latest technology tenders and contracts available for bidding.</p>
    
    <div class="row">
        @foreach([
            ['title' => 'Government AI Project', 'deadline' => '2025-03-01', 'budget' => '$500,000', 'category' => 'Artificial Intelligence', 'status' => 'Open'],
            ['title' => 'Cloud Infrastructure Setup', 'deadline' => '2025-04-15', 'budget' => '$700,000', 'category' => 'Cloud Computing', 'status' => 'Open'],
            ['title' => 'Cybersecurity Audit', 'deadline' => '2025-05-10', 'budget' => '$300,000', 'category' => 'Cybersecurity', 'status' => 'Open'],
            ['title' => 'Blockchain-Based Payment System', 'deadline' => '2025-06-05', 'budget' => '$900,000', 'category' => 'Blockchain', 'status' => 'Upcoming'],
            ['title' => 'E-Government Portal Development', 'deadline' => '2025-07-20', 'budget' => '$1,200,000', 'category' => 'Web Development', 'status' => 'Upcoming'],
            ['title' => 'Fintech Mobile App Development', 'deadline' => '2025-08-15', 'budget' => '$600,000', 'category' => 'Fintech', 'status' => 'Upcoming']
        ] as $bid)
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-dark fw-bold">{{ $bid['title'] }}</h5>
                    <p class="text-muted"><i class="fas fa-calendar-alt text-primary"></i> Deadline: <strong>{{ $bid['deadline'] }}</strong></p>
                    <p class="text-muted"><i class="fas fa-dollar-sign text-success"></i> Budget: <strong>{{ $bid['budget'] }}</strong></p>
                    <p class="text-muted"><i class="fas fa-tags text-warning"></i> Category: <strong>{{ $bid['category'] }}</strong></p>
                    <span class="badge {{ $bid['status'] == 'Open' ? 'bg-success' : 'bg-secondary' }}">{{ $bid['status'] }}</span>
                    <a href="#" class="btn btn-primary btn-sm mt-3">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
