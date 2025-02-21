
@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Programs</h1>
    <a href="{{ route('admin.programs.create') }}" class="btn btn-primary mb-3">Create Program</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Icon</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($programs as $program)
            <tr>
                <td>{{ $program->id }}</td>
                <td>{{ $program->title }}</td>
                <td>{{ $program->description }}</td>
                <td><img src="{{ asset('storage/' . $program->icon) }}" alt="icon" width="50"></td>
                <td>{{ $program->created_at->format('Y-m-d') }}</td>
                <td>
                    <!-- Edit Button with Icon -->
                    <a href="{{ route('admin.programs.edit', $program->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> <!-- Edit Icon -->
                    </a>
                
                    <!-- Delete Button with Icon -->
                    <form action="{{ route('admin.programs.destroy', $program->id) }}" method="POST" style="display: inline-block;">
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

    {{ $programs->links() }} <!-- Pagination links -->
</div>
@endsection
