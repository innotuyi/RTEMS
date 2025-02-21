@extends('admin.layout')

@section('content')
<div class="main-content">
    <div class="header">
        <h1>Analytics Dashboard</h1>
        <p>Visual Summary of Key Metrics</p>
    </div>

    <!-- Dashboard Stats -->
    <div class="dashboard-stats">
        <div class="stat-card">
            <h3>Total Users</h3>
            <p>2</p>
        </div>
        {{-- <div class="stat-card">
            <h3>Total Loans</h3>
            <p>{{ $totalLoans }} RWF</p>
        </div>
        <div class="stat-card">
            <h3>Total Expenditures</h3>
            <p>{{ $totalExpenditures }} RWF</p>
        </div>
        <div class="stat-card">
            <h3>Total Properties</h3>
            <p>{{ $totalProperties }}</p>
        </div> --}}
    </div>

    <!-- Recent Activities -->
    <div class="recent-activities">
        <h2>Recent Activities</h2>
        {{-- <ul>
            @foreach($recentActivities as $activity)
                <li>
                    <strong>{{ $activity->name }}</strong> - {{ $activity->description }}
                    <span class="activity-time">{{ $activity->created_at->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul> --}}
    </div>

    <!-- Graphs Section -->
    <div class="charts">
        <h2>Trends & Insights</h2>
        
        <!-- Example Loan Trends Chart -->
        <div class="chart-card">
            <h3>Loan Trends Over the Last 6 Months</h3>
            <canvas id="loanTrendsChart"></canvas>
        </div>
        
        <!-- Example User Growth Chart -->
        <div class="chart-card">
            <h3>User Growth Over the Last 6 Months</h3>
            <canvas id="userGrowthChart"></canvas>
        </div>
    </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Loan Trends Chart
    var ctx1 = document.getElementById('loanTrendsChart').getContext('2d');
    var loanTrendsChart = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: {!! json_encode(30) !!},  // Array of months (e.g., Jan, Feb, Mar)
            datasets: [{
                label: 'Loan Amount (RWF)',
                data: {!! json_encode(30) !!},  // Array of loan amounts for each month
                borderColor: 'rgba(75, 192, 192, 1)',
                fill: false,
                tension: 0.1
            }]
        }
    });

    // User Growth Chart
    var ctx2 = document.getElementById('3').getContext('2d');
    var userGrowthChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: {!! json_encode(3) !!},  // Array of months
            datasets: [{
                label: 'Number of Users',
                data: {!! json_encode(4) !!},  // Array of user counts for each month
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        }
    });
</script>

@endsection

@push('styles')
    <style>
        .dashboard-stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .stat-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            width: 23%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .stat-card h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .recent-activities ul {
            list-style: none;
            padding: 0;
        }

        .recent-activities li {
            margin-bottom: 10px;
            padding: 10px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .recent-activities .activity-time {
            font-size: 12px;
            color: #777;
            margin-left: 10px;
        }

        .charts {
            margin-top: 40px;
        }

        .chart-card {
            background: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        canvas {
            width: 100%;
            height: 400px;
        }
    </style>
@endpush
