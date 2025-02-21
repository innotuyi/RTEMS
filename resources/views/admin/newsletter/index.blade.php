@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Newsletter Subscriptions</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Subscribed At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subscriptions as $subscription)
            <tr>
                <td>{{ $subscription->id }}</td>
                <td>{{ $subscription->email }}</td>
                <td>{{ $subscription->created_at->format('Y-m-d') }}</td>
                <td>
                    <form action="{{ route('admin.newsletter.destroy', $subscription->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this subscription?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $subscriptions->links() }} <!-- Pagination links -->
</div>
@endsection
