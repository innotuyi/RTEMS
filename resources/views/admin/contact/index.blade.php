<!-- In resources/views/admin/contacts/index.blade.php -->

@extends('admin.layout')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Submitted Contacts</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ Str::limit($contact->message, 50) }}</td>
                    <td>{{ $contact->created_at->format('Y-m-d') }}</td>
                    <td>
                        <!-- Delete form -->
                        <form action="{{ route('admin.contact.destroy', $contact->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    {{ $contacts->links() }}
</div>
@endsection
