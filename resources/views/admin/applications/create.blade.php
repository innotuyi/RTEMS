@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Create Bid Application</h2>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Display Session Error Messages -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.applications.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Select Bid -->
        <div class="form-group">
            <label for="bid_id">Select Bid:</label>
            <select name="bid_id" id="bid_id" class="form-control" required>
                <option value="">Choose a Bid</option>
                @foreach($bids as $bid)
                    <option value="{{ $bid->id }}" {{ old('bid_id') == $bid->id ? 'selected' : '' }}>{{ $bid->title }}</option>
                @endforeach
            </select>
        </div>

        <!-- Select Company -->
        <div class="form-group">
            <label for="company_id">Select Company:</label>
            <select name="company_id" id="company_id" class="form-control" required>
                <option value="">Choose a Company</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Upload Proposal -->
        <div class="form-group">
            <label for="proposal_file">Upload Proposal (PDF):</label>
            <input type="file" name="proposal_file" id="proposal_file" class="form-control" required>
        </div>

        <!-- Status -->
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ old('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Submit Application</button>
    </form>
</div>
@endsection
