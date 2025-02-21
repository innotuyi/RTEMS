@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h6 class="card-title">Blogs</h6>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary float-right">Create Blog</a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Author</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->content }}</td>
                        <td>{{ $blog->user_name ?? 'Unknown' }}</td>
                        <td>{{ \Carbon\Carbon::parse($blog->created_at)->format('Y-m-d') }}</td>
                        <td>
                            <!-- Edit Button with Icon -->
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> <!-- Edit Icon -->
                            </a>
                        
                            <!-- Delete Button with Icon -->
                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i> <!-- Trash Icon for Delete -->
                                </button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- Pagination links -->
        <div class="pagination-wrapper">
            {{ $blogs->links() }} <!-- Display pagination links -->
        </div>
        

        {{ $blogs->links() }}
    </div>
</div>
@endsection
