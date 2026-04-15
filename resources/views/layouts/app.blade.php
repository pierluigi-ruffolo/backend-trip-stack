<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - TripStack</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>

<body>
    <div id="admin-container">
        <aside class="sidebar d-flex flex-column">
            <div class="sidebar-logo text-uppercase">
                TripStack Admin
            </div>

            <ul class="sidebar-nav">
                <li><a href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a></li>
                <li><a href="#"><i class="bi bi-geo-alt me-2"></i> Destinazioni</a></li>
                <li><a href="#"><i class="bi bi-globe me-2"></i> Paesi</a></li>
                <li><a href="#"><i class="bi bi-tags me-2"></i> Tag</li>
            </ul>

            <div class="user-section">
                <div class="dropdown">
                    <a href="#" class="text-white text-decoration-none dropdown-toggle user-info" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle user-icon"></i>
                        <span>{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="{{ url('profile') }}">Profilo</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item text-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>

        <main class="flex-grow-1 p-5">
            @yield('content')
        </main>
    </div>
</body>

</html>