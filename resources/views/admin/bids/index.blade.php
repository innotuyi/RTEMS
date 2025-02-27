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
                <th>Deadline</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bids as $bid)
                <tr>
                    <td>{{ $bid->id }}</td>
                    <td>{{ $bid->title }}</td>
                    <td>{{ ucfirst($bid->category) }}</td>
                    <td>{{ $bid->deadline }}</td>
                    <td>{{ ucfirst($bid->status) }}</td>
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
