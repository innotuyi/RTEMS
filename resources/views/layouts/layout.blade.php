<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rwanda Tech Export</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- FontAwesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --primary-color: #1E1E2F;
            --secondary-color: #4ECCA3;
            --accent-color: #FFCC29;
            --text-color: #F5F5F5;
        }
        body {
            background-color: var(--primary-color);
            color: var(--text-color);
        }
        .navbar {
            background-color: var(--secondary-color) !important;
        }
        .btn-primary {
            background-color: var(--accent-color);
            border: none;
            color: #000;
        }
        .btn-primary:hover {
            background-color: #E5B700;
        }
        .bg-light {
            background-color: #2A2A3A !important;
        }
        footer {
            background-color: var(--secondary-color) !important;
        }
    </style>
</head>
<body>
    @include('partials.header')
    <div class="container mt-4">
        @yield('content')
    </div>
    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/di
    st/js/bootstrap.bundle.min.js"></script>
</body>
</html>