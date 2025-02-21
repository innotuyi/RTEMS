@extends('layouts.layout')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <div class="row">
                <!-- Company Logo -->
                <div class="col-md-4 text-center">
                    <img src="https://www.ishyiga.net/web/assets/images/logo-company.png" class="img-fluid rounded-circle mb-3" alt="Company Logo">
                    <h3 class="text-primary fw-bold">Tech Company Name</h3>
                    <span class="badge bg-warning text-dark">Industry: AI Solutions</span>
                </div>
                <!-- Company Info -->
                <div class="col-md-8">
                    <h4 class="fw-bold text-dark">About Us</h4>
                    <p class="text-muted">
                        We are a leading AI solutions provider specializing in automation, machine learning, and big data analytics. Our mission is to bring cutting-edge AI technology to businesses worldwide.
                    </p>

                    <h5 class="fw-bold text-dark mt-4">Services</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check-circle text-success"></i> AI-Powered Analytics</li>
                        <li><i class="fas fa-check-circle text-success"></i> Cloud-Based Machine Learning</li>
                        <li><i class="fas fa-check-circle text-success"></i> Custom AI Solutions</li>
                    </ul>

                    <h5 class="fw-bold text-dark mt-4">Contact Information</h5>
                    <p><i class="fas fa-envelope text-primary"></i> contact@techcompany.com</p>
                    <p><i class="fas fa-phone text-primary"></i> +250 788 123 456</p>
                    <p><i class="fas fa-map-marker-alt text-primary"></i> Kigali, Rwanda</p>

                    <a href="#" class="btn btn-primary btn-lg mt-3">Visit Website</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
