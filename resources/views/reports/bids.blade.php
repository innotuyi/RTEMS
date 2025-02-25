@extends('layouts.layout')

@section('content')
    <div class="container">
        <h2>Bids Report</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Winner Company</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bids as $bid)
                    <tr>
                        <td>{{ $bid->id }}</td>
                        <td>{{ $bid->title }}</td>
                        <td>{{ $bid->description }}</td>
                        <td>{{ $bid->category }}</td>
                        <td>{{ $bid->deadline }}</td>
                        <td>{{ $bid->status }}</td>
                        <td>{{ $bid->winner_company_id ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
