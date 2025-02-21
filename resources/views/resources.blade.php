@extends('layouts.layout')

@section('content')
<section class="resources">
    <!-- Header Banner -->
    <div class="banner text-white" style="background: linear-gradient(to right, #6a1b9a, #00bcd4); padding: 50px; text-align: center; border-radius: 10px;">
        <h1>Our Resources</h1>
        <p>Access our publications, reports, videos, and helpful links to empower your journey.</p>
    </div>

    <!-- Resources Section -->
    <div class="container py-5">
        <!-- Downloadable Resources -->
        <section class="downloads mb-5">
            <h2 class="text-center mb-4" style="color: #6a1b9a;">Downloadable Resources</h2>
            <div class="row">
                @foreach ($resources->where('type', 'download') as $resource)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-lg border-light rounded">
                            <div class="card-body">
                                <h4 class="card-title text-center" style="color: #6a1b9a;">{{ $resource->title }}</h4>
                                <p class="card-text">{{ $resource->description }}</p>
                                <a href="{{ asset('storage/' . $resource->file_path) }}" class="btn btn-primary d-block w-100" target="_blank">Download</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Video Resources -->
        <section class="videos mb-5">
            <h2 class="text-center mb-4" style="color: #00bcd4;">Video Resources</h2>
            <div class="row">
                @foreach ($resources->where('type', 'video') as $resource)
                    <div class="col-md-6 mb-4">
                        <div class="video-container shadow-lg rounded">
                            <iframe 
                                src="{{ str_replace('watch?v=', 'embed/', $resource->url) }}" 
                                allowfullscreen 
                                title="{{ $resource->title }}">
                            </iframe>
                        </div>
                        
                        <h4 class="mt-3" style="color: #6a1b9a;">{{ $resource->title }}</h4>
                        <p>{{ $resource->description }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Useful Links -->
        <section class="links">
            <h2 class="text-center mb-4" style="color: #00bcd4;">Useful Links</h2>
            <ul class="list-group">
                @foreach ($resources->where('type', 'link') as $resource)
                    <li class="list-group-item">
                        <a href="{{ $resource->url }}" target="_blank" style="color: #6a1b9a;">{{ $resource->title }}</a>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
</section>
@endsection
