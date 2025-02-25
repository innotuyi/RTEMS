@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Edit Bid</h1>

    <form action="{{ route('admin.bids.update', $bid->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Bid Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $bid->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" required>{{ $bid->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control" required>
                <option value="software" {{ $bid->category == 'software' ? 'selected' : '' }}>Software</option>
                <option value="hardware" {{ $bid->category == 'hardware' ? 'selected' : '' }}>Hardware</option>
                <option value="consulting" {{ $bid->category == 'consulting' ? 'selected' : '' }}>Consulting</option>
            </select>
        </div>

        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="date" name="deadline" id="deadline" class="form-control" value="{{ $bid->deadline }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="open" {{ $bid->status == 'open' ? 'selected' : '' }}>Open</option>
                <option value="closed" {{ $bid->status == 'closed' ? 'selected' : '' }}>Closed</option>
                <option value="awarded" {{ $bid->status == 'awarded' ? 'selected' : '' }}>Awarded</option>
            </select>
        </div>

        <div class="form-group">
            <label for="winner_company_id">Winner Company (Optional)</label>
            <input type="number" name="winner_company_id" id="winner_company_id" class="form-control" value="{{ $bid->winner_company_id }}">
        </div>

        <button type="submit" class="btn btn-warning mt-3">Update Bid</button>
    </form>
</div>
@endsection
