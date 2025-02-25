@extends('layouts.layout')

@section('content')
    <div class="container">
        <h2>Regulatory Approvals Report</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Company ID</th>
                    <th>Product ID</th>
                    <th>Status</th>
                    <th>Comment</th>
                    <th>Approved By</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($regulatoryApprovals as $approval)
                    <tr>
                        <td>{{ $approval->id }}</td>
                        <td>{{ $approval->company_id }}</td>
                        <td>{{ $approval->product_id ?? 'N/A' }}</td>
                        <td>{{ $approval->status }}</td>
                        <td>{{ $approval->comment }}</td>
                        <td>{{ $approval->approved_by }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
