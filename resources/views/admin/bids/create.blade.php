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


        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


        <!-- Form -->
        <form action="{{ route('admin.bids.store') }}" method="POST" enctype="multipart/form-data">
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

                <!-- Budget -->
                <div class="col">
                    <label for="budget" class="form-label fw-semibold text-muted">Budget</label>
                    <input type="number" name="budget" id="budget" class="form-control shadow-sm rounded-3" placeholder="Enter bid budget" required>
                </div>

                <!-- Currency -->
                <div class="col">
                    <label for="currency" class="form-label fw-semibold text-muted">Currency</label>
                    <select name="currency" id="currency" class="form-select shadow-sm rounded-3" required>
                        <option value="USD">USD</option>
                        <option value="RWF">RWF</option>
                        <option value="EUR">EUR</option>
                    </select>
                </div>

                <!-- Deadline -->
                <div class="col">
                    <label for="deadline" class="form-label fw-semibold text-muted">Deadline</label>
                    <input type="date" name="deadline" id="deadline" class="form-control shadow-sm rounded-3" required>
                </div>

                <!-- Bid Opening Date -->
                <div class="col">
                    <label for="bid_opening_date" class="form-label fw-semibold text-muted">Bid Opening Date</label>
                    <input type="datetime-local" name="bid_opening_date" id="bid_opening_date" class="form-control shadow-sm rounded-3" required>
                </div>

                <!-- Evaluation Criteria -->
                <div class="col">
                    <label for="evaluation_criteria" class="form-label fw-semibold text-muted">Evaluation Criteria</label>
                    <textarea name="evaluation_criteria" id="evaluation_criteria" rows="2" class="form-control shadow-sm rounded-3" placeholder="Enter evaluation criteria" required></textarea>
                </div>

                <!-- Minimum Experience -->
                <div class="col">
                    <label for="minimum_experience" class="form-label fw-semibold text-muted">Minimum Experience (Years)</label>
                    <input type="number" name="minimum_experience" id="minimum_experience" class="form-control shadow-sm rounded-3" placeholder="Enter required experience" required>
                </div>

                <!-- Submission Method -->
                <div class="col">
                    <label for="submission_method" class="form-label fw-semibold text-muted">Submission Method</label>
                    <select name="submission_method" id="submission_method" class="form-select shadow-sm rounded-3" required>
                        <option value="online">Online</option>
                        <option value="physical">Physical</option>
                        <option value="email">Email</option>
                    </select>
                </div>
                

                <!-- Location -->
                <div class="col">
                    <label for="location" class="form-label fw-semibold text-muted">Location</label>
                    <input type="text" name="location" id="location" class="form-control shadow-sm rounded-3" placeholder="Enter bid location">
                </div>

                <!-- Contact Person -->
                <div class="col">
                    <label for="contact_person" class="form-label fw-semibold text-muted">Contact Person</label>
                    <input type="text" name="contact_person" id="contact_person" class="form-control shadow-sm rounded-3" placeholder="Enter contact person's name" required>
                </div>

                <!-- Contact Email -->
                <div class="col">
                    <label for="contact_email" class="form-label fw-semibold text-muted">Contact Email</label>
                    <input type="email" name="contact_email" id="contact_email" class="form-control shadow-sm rounded-3" placeholder="Enter contact email" required>
                </div>

                <!-- Requirements -->
                <div class="col">
                    <label for="requirements" class="form-label fw-semibold text-muted">Requirements (Comma Separated)</label>
                    <input type="text" name="requirements" id="requirements" class="form-control shadow-sm rounded-3" placeholder="Enter bid requirements">
                </div>

                <!-- Bid Document -->
                <div class="col">
                    <label for="bid_document" class="form-label fw-semibold text-muted">Bid Document (PDF)</label>
                    <input type="file" name="bid_document" id="bid_document" class="form-control shadow-sm rounded-3" accept=".pdf">
                </div>

                <!-- Attachments -->
                <div class="col">
                    <label for="attachments" class="form-label fw-semibold text-muted">Attachments (Multiple Files)</label>
                    <input type="file" name="attachments[]" id="attachments" class="form-control shadow-sm rounded-3" multiple>
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

                <!-- Winner Company -->
                <div class="col">
                    <label for="winner_company_id" class="form-label fw-semibold text-muted">Winning Company (Optional)</label>
                    <select name="winner_company_id" id="winner_company_id" class="form-select shadow-sm rounded-3">
                        <option selected disabled>-- Select Winning Company --</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
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
