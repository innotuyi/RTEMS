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
                            <p class="text-muted"><i class="fas fa-calendar-alt text-primary"></i> Deadline:
                                <strong>{{ $bid->deadline }}</strong>
                            </p>
                            <p class="text-muted"><i class="fas fa-tags text-warning"></i> Category:
                                <strong>{{ ucfirst($bid->category) }}</strong>
                            </p>
                            <span
                                class="badge {{ $bid->status == 'open' ? 'bg-success' : ($bid->status == 'closed' ? 'bg-danger' : 'bg-secondary') }}">
                                {{ ucfirst($bid->status) }}
                            </span>
                            <button class="btn btn-primary btn-sm mt-3" data-toggle="modal"
                                data-target="#bidModal{{ $bid->id }}">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="bidModal{{ $bid->id }}" tabindex="-1" role="dialog" aria-labelledby="bidModalLabel{{ $bid->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" style="background-color: #fff; color: #333;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="bidModalLabel{{ $bid->id }}" style="font-size: 1.25rem; font-weight: bold; color: #000;">
                                    {{ $bid->title }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 1.5rem;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="font-size: 1rem; line-height: 1.6;">
                                <div class="mb-3">
                                    <strong>Description:</strong>
                                    <p>{{ $bid->description }}</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Category:</strong>
                                    <p>{{ ucfirst($bid->category) }}</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Deadline:</strong>
                                    <p>{{ $bid->deadline }}</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Status:</strong>
                                    <span class="badge {{ $bid->status == 'open' ? 'bg-success' : ($bid->status == 'closed' ? 'bg-danger' : 'bg-secondary') }}">
                                        {{ ucfirst($bid->status) }}
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <strong>Budget:</strong>
                                    <p>{{ number_format($bid->budget, 2) }} {{ strtoupper($bid->currency) }}</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Minimum Experience:</strong>
                                    <p>{{ $bid->minimum_experience }} years</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Submission Method:</strong>
                                    <p>{{ ucfirst($bid->submission_method) }}</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Location:</strong>
                                    <p>{{ $bid->location }}</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Contact Person:</strong>
                                    <p>{{ $bid->contact_person }}</p>
                                </div>
                                <div class="mb-3">
                                    <strong>Contact Email:</strong>
                                    <p>{{ $bid->contact_email }}</p>
                                </div>
                
                                @if ($bid->bid_document)
                                    <div class="mb-3">
                                        <strong>Bid Document:</strong>
                                        <a href="{{ asset('storage/' . $bid->bid_document) }}" target="_blank" style="color: #007bff;">Download</a>
                                    </div>
                                @endif
                
                                @if (!empty($bid->requirements))
                                    {{-- <div class="mb-3">
                                        <strong>Requirements:</strong>
                                        <ul style="line-height: 1.8;">
                                            <li>{{ $bid->requirements }}</li>
                                        </ul>
                                    </div> --}}
                                @endif
                
                                @if (!empty($bid->attachments))
                                    <div class="mb-3">
                                        <strong>Attachments:</strong>
                                        <ul>
                                            @foreach (json_decode($bid->attachments, true) as $attachment)
                                                <li><a href="{{ asset('storage/' . $attachment) }}" target="_blank" style="color: #007bff;">View Attachment</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 1rem;">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                

            @empty
                <p class="text-center text-muted">No bidding opportunities available at the moment.</p>
            @endforelse
        </div>
    </div>
@endsection
