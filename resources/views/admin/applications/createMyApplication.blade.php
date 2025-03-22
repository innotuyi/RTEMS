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

    <!-- Display Session Error Message -->
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Display Success Message -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.applications.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Select Bid -->
        <div class="form-group">
            <label for="bid_id">Select Bid:</label>
            <select name="bid_id" id="bid_id" class="form-control @error('bid_id') is-invalid @enderror" required>
                <option value="">Choose a Bid</option>
                @foreach($bids as $bid)
                    <option value="{{ $bid->id }}" {{ old('bid_id') == $bid->id ? 'selected' : '' }}>{{ $bid->title }}</option>
                @endforeach
            </select>
            @error('bid_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Auto-Selected Company (Disabled) -->
        <div class="form-group">
            <label for="company_id">Your Company:</label>
            <input type="text" class="form-control" value="{{ $company->name }}" disabled>
            <input type="hidden" name="company_id" value="{{ $company->id }}">
        </div>

        <!-- Upload Proposal -->
        <div class="form-group">
            <label for="proposal_file">Upload Proposal (PDF):</label>
            <input type="file" name="proposal_file" id="proposal_file" class="form-control @error('proposal_file') is-invalid @enderror" required>
            @error('proposal_file')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Submit Application</button>
    </form>
</div>
@endsection
