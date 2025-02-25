@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Notifications Report</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Message</th>
                    <th>Type</th>
                    <th>Read At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notifications as $notification)
                    <tr>
                        <td>{{ $notification->id }}</td>
                        <td>{{ $notification->user_id }}</td>
                        <td>{{ $notification->message }}</td>
                        <td>{{ $notification->type }}</td>
                        <td>{{ $notification->read_at ? $notification->read_at : 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
