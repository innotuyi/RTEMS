@extends('layouts.layout')

@section('content')
<!-- About Section -->
<div id="about" class="container py-5">
    <h2 class="text-center text-warning fw-bold">About Us</h2>
    <p class="text-center text-secondary">Empowering Rwandan tech companies to compete and succeed in the global market.</p>

    <div class="row mt-5">
        <!-- Mission & Vision -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 p-4">
                <h4 class="text-primary fw-bold"><i class="fas fa-bullseye"></i> Our Mission</h4>
                <p class="text-muted">To connect Rwandan tech companies with international opportunities, fostering innovation and economic growth through seamless global trade.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm border-0 p-4">
                <h4 class="text-primary fw-bold"><i class="fas fa-lightbulb"></i> Our Vision</h4>
                <p class="text-muted">To position Rwanda as a leading exporter of cutting-edge technology solutions by enabling fair competition and efficient global market access.</p>
            </div>
        </div>
    </div>

    <!-- Our Services -->
    <div class="mt-5">
        <h3 class="text-center text-warning fw-bold">What We Offer</h3>
        <p class="text-center text-secondary">A robust platform that supports tech businesses in international expansion.</p>
        <div class="row">
            @foreach([
                ['title' => 'Bidding & Contracts', 'icon' => 'fas fa-handshake', 'desc' => 'Access global bidding opportunities and secure international contracts.'],
                ['title' => 'Tech Export Support', 'icon' => 'fas fa-globe', 'desc' => 'Guidance on exporting tech services and scaling businesses beyond borders.'],
                ['title' => 'Networking & Partnerships', 'icon' => 'fas fa-users', 'desc' => 'Connect with industry leaders and international partners for growth.'],
                ['title' => 'Market Insights', 'icon' => 'fas fa-chart-line', 'desc' => 'Data-driven insights on global tech markets and emerging trends.']
            ] as $service)
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-0 text-center p-4">
                    <i class="{{ $service['icon'] }} fa-3x text-warning mb-3"></i>
                    <h5 class="text-dark fw-bold">{{ $service['title'] }}</h5>
                    <p class="text-muted">{{ $service['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Impact Section -->
    <div class="mt-5">
        <h3 class="text-center text-warning fw-bold">Our Impact</h3>
        <p class="text-center text-secondary">We have helped numerous companies thrive in the global market.</p>
        <div class="row text-center">
            @foreach([
                ['count' => '200+', 'label' => 'Tech Companies Onboarded'],
                ['count' => '500+', 'label' => 'International Contracts Secured'],
                ['count' => '20+', 'label' => 'Global Partners Collaborating']
            ] as $stat)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 p-4">
                    <h2 class="text-primary fw-bold">{{ $stat['count'] }}</h2>
                    <p class="text-muted">{{ $stat['label'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
