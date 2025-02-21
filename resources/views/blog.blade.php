@extends('layouts.layout')

@section('content')
    <!-- Header Section -->
    <div class="header" style="background-color: #ADD8E6; padding: 30px; text-align: center;">
        <h1 style="color: purple; font-weight: bold;">Insights and Updates from RYFPL</h1>
    </div>

    <!-- Blog Posts Section -->
    <div class="container py-5">
        <h2>Featured Blog Posts</h2>
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <!-- Blog Card -->
                    <div class="card" style="border-radius: 10px; overflow: hidden; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);">
                        <!-- Thumbnail Image -->
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <!-- Title in Bold Green -->
                            <h4 class="card-title" style="color: #388e3c; font-weight: bold;">{{ $blog->title }}</h4>

                            <!-- Excerpt -->
                            <p id="excerpt{{ $blog->id }}" class="card-text" style="color: #555;">
                                {{ Str::limit($blog->content, 100) }}...
                            </p>

                            <!-- Full Content (Hidden by default) -->
                            <p id="fullContent{{ $blog->id }}" class="card-text" style="color: #555; display: none;">
                                {{ $blog->content }}
                            </p>

                            <!-- Read More Button -->
                            <button class="btn btn-outline-primary" onclick="toggleReadMore({{ $blog->id }})">
                                Read More
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="pagination justify-content-center">
            {{ $blogs->links() }} <!-- Pagination links -->
        </div>
    </div>

    <!-- JavaScript to toggle between Read More / Read Less -->
    <script>
        function toggleReadMore(postId) {
            const excerpt = document.getElementById('excerpt' + postId);
            const fullContent = document.getElementById('fullContent' + postId);
            const btn = event.target; // Get the clicked button

            if (fullContent.style.display === 'none') {
                fullContent.style.display = 'block';
                excerpt.style.display = 'none';
                btn.textContent = 'Read Less'; // Change button text to "Read Less"
            } else {
                fullContent.style.display = 'none';
                excerpt.style.display = 'block';
                btn.textContent = 'Read More'; // Change button text back to "Read More"
            }
        }
    </script>
@endsection
