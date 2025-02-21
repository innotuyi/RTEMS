@extends('admin.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Cards for Key Metrics -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text display-4">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Blogs</h5>
                    <p class="card-text display-4">{{ $totalBlogs }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Programs</h5>
                    <p class="card-text display-4">{{ $totalPrograms }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Contacts</h5>
                    <p class="card-text display-4">{{ $totalContacts }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">User Growth</h5>
                    <canvas id="userGrowthChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">Program Statistics</h5>
                    <canvas id="programStatsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Contacts Table -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Recent Contacts</h5>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentContacts as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ Str::limit($contact->message, 50) }}</td>
                                    <td>{{ $contact->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const userGrowthChart = new Chart(document.getElementById('userGrowthChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: @json($userGrowthLabels),
            datasets: [{
                label: 'User Growth',
                data: @json($userGrowthData),
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: false,
            }],
        },
    });

    const programStatsChart = new Chart(document.getElementById('programStatsChart').getContext('2d'), {
        type: 'pie',
        data: {
            labels: @json($programStatsLabels),
            datasets: [{
                data: @json($programStatsData),
                backgroundColor: ['#007bff', '#28a745', '#dc3545', '#ffc107'],
            }],
        },
    });
</script>
@endsection
