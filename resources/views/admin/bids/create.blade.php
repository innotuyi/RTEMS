@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Create New Bid</h1>

    <form action="{{ route('admin.bids.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Bid Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control" required>
                <option value="software">Software</option>
                <option value="hardware">Hardware</option>
                <option value="consulting">Consulting</option>
            </select>
        </div>

        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="date" name="deadline" id="deadline" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="open">Open</option>
                <option value="closed">Closed</option>
                <option value="awarded">Awarded</option>
            </select>
        </div>

        <div class="form-group">
            <label for="winner_company_id">Winner Company (Optional)</label>
            <input type="number" name="winner_company_id" id="winner_company_id" class="form-control">
        </div>

        <button type="submit" class="btn btn-success mt-3">Create Bid</button>
    </form>
</div>
@endsection
