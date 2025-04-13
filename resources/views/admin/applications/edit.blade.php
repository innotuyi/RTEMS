@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Edit Bid Application</h2>

    <form action="{{ route('admin.applications.update', $application->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Select Bid -->
        <div class="form-group">
            <label for="bid_id">Select Bid:</label>
            <select name="bid_id" id="bid_id" class="form-control" required>
                @foreach($bids as $bid)
                    <option value="{{ $bid->id }}" {{ $bid->id == $application->bid_id ? 'selected' : '' }}>
                        {{ $bid->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Select Company -->
        <div class="form-group">
            <label for="company_id">Select Company:</label>
            <select name="company_id" id="company_id" class="form-control" required>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ $company->id == $application->company_id ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Upload Proposal -->
        <div class="form-group">
            <label for="proposal_file">Proposal File (PDF):</label>
            <input type="file" name="proposal_file" id="proposal_file" class="form-control">
            <small>Current: 
                <a href="{{ asset('storage/' . $application->proposal_file) }}" target="_blank">View Proposal</a>
            </small>
        </div>

        <!-- Status -->
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $application->status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>

<!-- Status -->
<div class="form-group">
    <label for="status">Status:</label>
    <select name="status" id="status" class="form-control" required onchange="toggleReasonField()">
        <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="approved" {{ $application->status == 'approved' ? 'selected' : '' }}>Approved</option>
        <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
    </select>
</div>

<!-- Reason (only if rejected) -->
<div class="form-group" id="reason-field" style="display: {{ $application->status == 'rejected' ? 'block' : 'none' }};">
    <label for="reason">Reason for Rejection:</label>
    <textarea name="reason" id="reason" class="form-control">{{ old('reason', $application->reason) }}</textarea>
</div>


<!-- Reason (only if rejected) -->
<div class="form-group" id="reason-field" style="display: {{ $application->status == 'rejected' ? 'block' : 'none' }};">
    <label for="reason">Reason for Rejection:</label>
    <textarea name="reason" id="reason" class="form-control">{{ old('reason', $application->reason) }}</textarea>
</div>


        <button type="submit" class="btn btn-primary">Update Application</button>
    </form>
</div>
@endsection
