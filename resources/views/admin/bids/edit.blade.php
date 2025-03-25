@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Edit Bid</h1>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <form action="{{ route('admin.bids.update', $bid->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Bid Title -->
        <div class="form-group">
            <label for="title">Bid Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $bid->title }}" required>
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" required>{{ $bid->description }}</textarea>
        </div>

        <!-- Category -->
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control" required>
                @foreach(['software', 'hardware', 'consulting', 'construction', 'services'] as $category)
                    <option value="{{ $category }}" {{ $bid->category == $category ? 'selected' : '' }}>
                        {{ ucfirst($category) }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Deadline -->
        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="date" name="deadline" id="deadline" class="form-control" value="{{ $bid->deadline }}" >
        </div>

        <!-- Status -->
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                @foreach(['open', 'closed', 'awarded'] as $status)
                    <option value="{{ $status }}" {{ $bid->status == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Budget -->
        <div class="form-group">
            <label for="budget">Budget (Optional)</label>
            <input type="number" name="budget" id="budget" class="form-control" value="{{ $bid->budget }}">
        </div>

        <!-- Currency -->
        <div class="form-group">
            <label for="currency">Currency</label>
            <input type="text" name="currency" id="currency" class="form-control" value="{{ $bid->currency }}" required>
        </div>

        <!-- Evaluation Criteria -->
        <div class="form-group">
            <label for="evaluation_criteria">Evaluation Criteria</label>
            <textarea name="evaluation_criteria" id="evaluation_criteria" class="form-control" rows="3">{{ $bid->evaluation_criteria }}</textarea>
        </div>

        <!-- Minimum Experience -->
        <div class="form-group">
            <label for="minimum_experience">Minimum Experience (Years)</label>
            <input type="number" name="minimum_experience" id="minimum_experience" class="form-control" value="{{ $bid->minimum_experience }}">
        </div>

        <!-- Submission Method -->
        <div class="form-group">
            <label for="submission_method">Submission Method</label>
            <select name="submission_method" id="submission_method" class="form-control" required>
                @foreach(['online', 'physical', 'email'] as $method)
                    <option value="{{ $method }}" {{ $bid->submission_method == $method ? 'selected' : '' }}>
                        {{ ucfirst($method) }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Bid Opening Date -->
        <div class="form-group">
            <label for="bid_opening_date">Bid Opening Date</label>
            <input type="datetime-local" name="bid_opening_date" id="bid_opening_date" class="form-control" 
                value="{{ $bid->bid_opening_date ? date('Y-m-d\TH:i', strtotime($bid->bid_opening_date)) : '' }}">
        </div>

        <!-- Bid Document -->
        <div class="form-group">
            <label for="bid_document">Bid Document (Optional)</label>
            <input type="file" name="bid_document" id="bid_document" class="form-control">
        </div>

        <!-- Location -->
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $bid->location }}">
        </div>

        <!-- Contact Person -->
        <div class="form-group">
            <label for="contact_person">Contact Person</label>
            <input type="text" name="contact_person" id="contact_person" class="form-control" value="{{ $bid->contact_person }}">
        </div>

        <!-- Contact Email -->
        <div class="form-group">
            <label for="contact_email">Contact Email</label>
            <input type="email" name="contact_email" id="contact_email" class="form-control" value="{{ $bid->contact_email }}">
        </div>

        <!-- Requirements (JSON) -->
        <div class="form-group">
            <label for="requirements">Technical Requirements </label>
            <textarea name="requirements" id="requirements" class="form-control">{{ $bid->requirements }}</textarea>
        </div>

        <!-- Attachments -->
        <div class="form-group">
            <label for="attachments">Attachments (Multiple Files)</label>
            <input type="file" name="attachments[]" id="attachments" class="form-control" multiple>
        </div>

        <!-- Winner Company -->
        <div class="form-group">
            <label for="winner_company_id">Winner Company (Optional)</label>
            <input type="number" name="winner_company_id" id="winner_company_id" class="form-control" value="{{ $bid->winner_company_id }}">
        </div>

        <button type="submit" class="btn btn-warning mt-3">Update Bid</button>
    </form>
</div>
@endsection
