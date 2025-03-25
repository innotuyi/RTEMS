@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Bids List</h1>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif 

    <a href="{{ route('admin.create') }}" class="btn btn-primary mb-3">Create New Bid</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Budget</th>
                <th>Currency</th>
                <th>Deadline</th>
                <th>Bid Opening Date</th>
                <th>Contact Person</th>
                <th>Contact Email</th>
                <th>Status</th>
                <th>Winner Company</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bids as $bid)
                <tr>
                    <td>{{ $bid->id }}</td>
                    <td>{{ $bid->title }}</td>
                    <td>{{ ucfirst($bid->category) }}</td>
                    <td>{{ number_format($bid->budget, 2) }}</td>
                    <td>{{ strtoupper($bid->currency) }}</td>
                    <td>{{ $bid->deadline }}</td>
                    <td>{{ $bid->bid_opening_date }}</td>
                    <td>{{ $bid->contact_person }}</td>
                    <td>{{ $bid->contact_email }}</td>
                    <td>{{ ucfirst($bid->status) }}</td>
                    <td>
                        @if ($bid->winner_company)
                            {{ $bid->winner_company->name }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.bids.edit', $bid->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.bids.destroy', $bid->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
