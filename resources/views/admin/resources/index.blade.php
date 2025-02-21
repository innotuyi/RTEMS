@extends('admin.layout')

@section('content')
    <h1>Resources</h1>

    <a href="{{ route('admin.resources.create') }}" class="btn btn-primary mb-3">Add New Resource</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Title</th>
                <th>Description</th>
                <th>URL</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($resources as $resource)
                <tr>
                    <td>{{ $resource->id }}</td>
                    <td>{{ ucfirst($resource->type) }}</td>
                    <td>{{ $resource->title }}</td>
                    <td>{{ $resource->description }}</td>
                    <td>
                        @if ($resource->type === 'download' && $resource->file_path)
                            <a href="{{ asset('storage/' . $resource->file_path) }}" target="_blank">Download File</a>
                        @elseif($resource->type === 'video' && $resource->url)
                            <a href="{{ $resource->url }}" target="_blank">View Video</a>
                        @elseif($resource->type === 'link' && $resource->url)
                            <a href="{{ $resource->url }}" target="_blank">Visit Link</a>
                        @else
                            <span>No URL Available</span>
                        @endif
                    </td>
                    <td>
                        <!-- Edit Button with Icon -->
                        <a href="{{ route('admin.resources.edit', $resource->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> <!-- Edit Icon -->
                        </a>

                        <!-- Delete Button with Icon -->
                        <form action="{{ route('admin.resources.destroy', $resource->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i> <!-- Trash Icon for Delete -->
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
