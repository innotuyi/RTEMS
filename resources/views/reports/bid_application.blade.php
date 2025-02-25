@extends('layouts.layout')

@section('content')
    <div class="container">
        <h2>Bid Applications Report</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Bid ID</th>
                    <th>Company ID</th>
                    <th>Proposal File</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bidApplications as $application)
                    <tr>
                        <td>{{ $application->id }}</td>
                        <td>{{ $application->bid_id }}</td>
                        <td>{{ $application->company_id }}</td>
                        <td>{{ $application->proposal_file }}</td>
                        <td>{{ $application->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
