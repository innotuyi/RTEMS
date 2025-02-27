@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Bid Applications</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.applications.create') }}" class="btn btn-primary mb-3">Create New Application</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Bid Title</th>
                <th>Company Name</th>
                <th>Proposal File</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bidApplications as $application)
                <tr>
                    <td>{{ $application->id }}</td>
                    <td>{{ $application->bid_title }}</td>
                    <td>{{ $application->company_name }}</td>
                    <td>
                        <a href="{{ asset($application->proposal_file) }}" target="_blank">View Proposal</a>
                    </td>
                    <td>{{ ucfirst($application->status) }}</td>
                    <td>
                        <a href="{{ route('admin.applications.edit', $application->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('admin.applications.destroy', $application->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
