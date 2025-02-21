@extends('layouts.layout')

@section('content')
<section class="programs">
    <!-- Header Section -->
    <div class="banner text-white" style="background: #6a1b9a; padding: 50px; text-align: center;">
        <h1>Our Impactful Programs</h1>
    </div>

    <!-- Programs Section -->
    <div class="fade-in container py-5">
        <div class="row">
            @foreach ($programs as $program)
                <div class="col-md-4">
                    <div class="card" style="border-radius: 10px; box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1); border: 2px solid {{ $program->color ?? '#388e3c' }};">
                        <div class="card-body">
                            <h3 class="card-title" style="color: {{ $program->color ?? '#388e3c' }};">
                                @if($program->icon)
                                    <img src="{{ asset('storage/' . $program->icon) }}" alt="{{ $program->title }} icon" style="width: 30px; height: 30px; margin-right: 10px; vertical-align: middle;">
                                @else
                                    <i class="fas fa-gavel"></i> <!-- Default Icon -->
                                @endif
                                {{ $program->title }}
                            </h3>
                            <p class="card-text">{{ $program->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $programs->links() }}
        </div>
    </div>
</section>

<!-- Impact Stories Section -->
<section class="fade-in impact-stories py-5" style="background: #fff;">
    <div class="container">
        <h2 class="text-center" style="color: #6a1b9a;">Impact Stories</h2>
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Testimonial 1 -->
                <div class="carousel-item active">
                    <div class="testimonial text-center">
                        <p style="color: #6a1b9a;">"This program changed my life. The support was incredible!"</p>
                        <h5 style="color: #6a1b9a;">- John Doe</h5>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div class="carousel-item">
                    <div class="testimonial text-center">
                        <p style="color: #6a1b9a;">"A wonderful experience that has made a huge difference in my community."</p>
                        <h5 style="color: #6a1b9a;">- Jane Smith</h5>
                    </div>
                </div>
                <!-- Testimonial 3 -->
                <div class="carousel-item">
                    <div class="testimonial text-center">
                        <p style="color: #6a1b9a;">"Empowering and inspiring programs. Highly recommend them."</p>
                        <h5 style="color: #6a1b9a;">- Alex Johnson</h5>
                    </div>
                </div>
            </div>
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
@endsection
