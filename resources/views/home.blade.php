@extends('layouts.layout')

@section('content')
<!-- Hero Section -->
<div class="text-center py-5 position-relative text-white" style="
    background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('{{ asset('image/banner.webp') }}') center/cover no-repeat;
    min-height: 70vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
">
    <h1 class="display-4 text-warning fw-bold fade-in">Connect, Compete & Export Your Tech Globally</h1>
    <p class="lead fade-in">Join Rwanda’s top tech companies and expand your reach.</p>
    <div class="mt-4">
        <a href="/register" class="btn btn-primary btn-lg me-2 fade-in">Register Your Company</a>
        <a href="/bidding" class="btn btn-outline-light btn-lg fade-in">View Bidding Opportunities</a>
    </div>
</div>

{{-- <!-- About Section -->
<div id="about" class="container my-5 text-center">
    <h2 class="text-warning fw-bold fade-in">About Us</h2>
    <p class="text-muted fade-in">Rwanda Tech Export is a gateway for Rwandan tech companies to access global markets through fair competition and streamlined export processes.</p>
</div> --}}

<!-- How It Works Section -->
<div id="how-it-works" class="bg-light py-5">
    <div class="container">
        <h2 class="text-center text-warning fw-bold fade-in">How It Works</h2>
        <div class="row text-center mt-4">
            @foreach([
                ['icon' => 'fa-user-plus', 'title' => 'Register', 'desc' => 'Sign up and showcase your tech services.'],
                ['icon' => 'fa-check-circle', 'title' => 'Get Approved', 'desc' => 'Our team verifies and approves eligible companies.'],
                ['icon' => 'fa-globe', 'title' => 'Bid & Export', 'desc' => 'Compete for international contracts and expand globally.']
            ] as $step)
            <div class="col-md-4 fade-in">
                <i class="fas {{ $step['icon'] }} fa-3x text-warning"></i>
                <h4 class="text-light fw-bold mt-3">{{ $step['title'] }}</h4>
                <p class="text-light">{{ $step['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Featured Tech Companies -->
<div id="tech-companies" class="container my-5 text-center">
    <h2 class="text-warning fw-bold fade-in">Featured Tech Companies</h2>
    <p class="text-muted fade-in">Explore Rwanda’s top-performing tech companies.</p>
    <div class="row">
        @foreach([
            ['name' => 'Smart AI Ltd', 'industry' => 'Artificial Intelligence'],
            ['name' => 'CyberSecure Ltd', 'industry' => 'Cybersecurity'],
            ['name' => 'CloudBase Ltd', 'industry' => 'Cloud Computing']
        ] as $company)
        <div class="col-md-4 fade-in">
            <div class="card shadow-sm border-0 p-4">
                <h5 class="text-dark fw-bold">{{ $company['name'] }}</h5>
                <p class="text-muted">{{ $company['industry'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Bidding Opportunities -->
<div id="bidding" class="bg-dark text-white py-5 text-center">
    <div class="container">
        <h2 class="text-warning fw-bold fade-in">Bidding Opportunities</h2>
        <p class="fade-in">Discover lucrative international opportunities tailored for Rwandan tech companies.</p>
        <a href="/bidding" class="btn btn-success btn-lg fade-in">View Open Bids</a>
    </div>
</div>

<!-- JavaScript for Animations -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const elements = document.querySelectorAll(".fade-in");
        elements.forEach((el, index) => {
            setTimeout(() => {
                el.style.opacity = 1;
                el.style.transform = "translateY(0)";
            }, 200 * index);
        });
    });
</script>

<style>
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }
</style>
@endsection
