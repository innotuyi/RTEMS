@extends('admin.layout')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Manage Pages</h6>
        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary float-right"><i class="icon-plus2"></i> Add New Page</a>
    </div>

    <div class="card-body">
        <table class="table datatable-button-html5-columns">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Slug</th>  <!-- Added column for Slug -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $page->title }}</td>
                        <td> {{$page->content}} </td>
                        <td>{{ $page->slug }}</td>  <!-- Display slug -->
                        <td>
                            <!-- Edit Button with Icon -->
                            <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> <!-- Edit Icon -->
                            </a>
                        
                            <!-- Delete Button with Icon -->
                            <form action="{{ route('admin.pages.destroy', $page->id) }}" method="POST" class="d-inline">
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
    </div>
</div>
@endsection
