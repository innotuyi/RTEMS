@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4 p-5">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary fw-bold">Create New Bid</h2>
            <a href="{{ route('admin.bids.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i> Back to Bids List
            </a>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.bids.store') }}" method="POST">
            @csrf

            <div class="row g-4 row-cols-1 row-cols-md-2">
                <!-- Bid Title -->
                <div class="col">
                    <label for="title" class="form-label fw-semibold text-muted">Bid Title</label>
                    <input type="text" name="title" id="title" class="form-control shadow-sm rounded-3" placeholder="Enter bid title" required>
                </div>

                <!-- Description -->
                <div class="col">
                    <label for="description" class="form-label fw-semibold text-muted">Description</label>
                    <textarea name="description" id="description" rows="3" class="form-control shadow-sm rounded-3" placeholder="Enter bid requirements" required></textarea>
                </div>

                <!-- Category -->
                <div class="col">
                    <label for="category" class="form-label fw-semibold text-muted">Category</label>
                    <select name="category" id="category" class="form-select shadow-sm rounded-3" required>
                        <option selected disabled>-- Select Category --</option>
                        <option value="software">Software</option>
                        <option value="hardware">Hardware</option>
                        <option value="consulting">Consulting</option>
                    </select>
                </div>

                <!-- Deadline -->
                <div class="col">
                    <label for="deadline" class="form-label fw-semibold text-muted">Deadline</label>
                    <input type="date" name="deadline" id="deadline" class="form-control shadow-sm rounded-3" required>
                </div>

                <!-- Status -->
                <div class="col">
                    <label for="status" class="form-label fw-semibold text-muted">Status</label>
                    <select name="status" id="status" class="form-select shadow-sm rounded-3" required>
                        <option value="open">Open</option>
                        <option value="closed">Closed</option>
                        <option value="awarded">Awarded</option>
                    </select>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-5 text-end">
                <button type="submit" class="btn btn-primary px-5 py-2 fw-semibold shadow-sm">
                    <i class="fas fa-check-circle me-2"></i> Create Bid
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
