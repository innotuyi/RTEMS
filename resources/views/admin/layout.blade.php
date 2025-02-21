<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEJ+2KwG41Q8PzEurTHbTpNidwq0dyt0ri0X0/zurWX+2fFJZfvTtiJJq1ZB3" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>RYFPL Admin</h2>
            <ul>
                {{-- <li><a href="{{ route('admin.pages.index') }}"><i class="fas fa-file-alt"></i> Manage Pages</a></li> --}}
                <li><a href="{{ route('admin.blogs.index') }}"><i class="fas fa-file-alt"></i> Manage Blog</a></li>
                <li><a href="{{ route('admin.team.index') }}"><i class="fas fa-users"></i> Manage Team</a></li>
                <li><a href="{{ route('admin.programs.index') }}"><i class="fas fa-building"></i> Manage Programs</a></li>
                <li><a href="{{ route('admin.contact.index') }}"><i class="fas fa-building"></i> Manage Contact</a></li>
                <li><a href="{{ route('admin.resources.index') }}"><i class="fas fa-building"></i> Manage Resources</a></li>
                <li><a href="{{ route('users.index') }}"><i class="fas fa-hand-holding-heart"></i>Manage User</a></li>
                <li><a href="{{ route('admin.newsletter.index') }}"><i class="fas fa-hand-holding-heart"></i>Manage subscriber</a></li>

                <li><a href="#"><i class="fas fa-hand-holding-heart"></i> Donation Settings</a></li>
                <li><a href="{{ route('logout') }}"><i class="fas fa-hand-holding-heart"></i>Logout</a></li>

                {{-- <li><a href="{{ route('analytics') }}"><i class="fas fa-chart-line"></i> View Analytics</a></li> --}}
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1>Welcome to the Admin Dashboard</h1>
                <p>Manage and oversee your organization effectively.</p>
            </div>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fadeElements = document.querySelectorAll('.fade-in');
    
            function checkInView() {
                fadeElements.forEach(function (element) {
                    const rect = element.getBoundingClientRect();
                    if (rect.top >= 0 && rect.bottom <= window.innerHeight) {
                        element.classList.add('fade-in-visible');
                    }
                });
            }
    
            window.addEventListener('scroll', checkInView);
            checkInView(); // Initial check
        });
    </script>
    
</body>

</html>
