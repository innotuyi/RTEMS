@extends('admin.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Cards for Key Metrics -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Bids</h5>
                    <p class="card-text display-4">{{ $totalBids }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Bid Applications</h5>
                    <p class="card-text display-4">{{ $totalBidApplications }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Regulatory Approvals</h5>
                    <p class="card-text display-4">{{ $totalRegulatoryApprovals }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Notifications</h5>
                    <p class="card-text display-4">{{ $totalNotifications }}</p>
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
                data: @json($userGrowthValues),
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
