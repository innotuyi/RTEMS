<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container">
      <a class="navbar-brand fw-bold text-warning" href="#">Rwanda Tech Export</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link text-light" href="/">Home</a></li>
              <li class="nav-item"><a class="nav-link text-light" href="/about">About Us</a></li>
              {{-- <li class="nav-item"><a class="nav-link text-light" href="/how-it-works">How It Works</a></li> --}}
              <li class="nav-item"><a class="nav-link text-light" href="{{ route('tech-companies.index') }}">Tech Companies</a></li>
              <li class="nav-item"><a class="nav-link text-light" href="{{ route('bidding.index') }}">Bidding Opportunities</a></li>
              <li class="nav-item">
                <a class="nav-link btn btn-warning text-dark fw-bold px-3" href="{{ route('login') }}">Login / Register</a>
            </li>
                      </ul>
      </div>
  </div>
</nav>