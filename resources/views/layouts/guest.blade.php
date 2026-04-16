<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TripStack</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <nav class="guest-navbar shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('home') }}" class="logo-link">
                TripStack ✈️
            </a>

            <div class="auth-links">
                @if(Auth::check())
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary border-0 rounded-pill px-3 shadow-sm">
                    <i class="bi bi-person-gear me-1"></i> Area Admin
                </a>
                @else
                <a href="{{ route('login') }}" class="btn btn-link text-decoration-none text-dark me-2">Accedi</a>
                <a href="{{ route('register') }}" class="btn btn-primary rounded-pill px-4">Registrati</a>
                @endif
            </div>
        </div>
    </nav>

    <main class="py-5">
        @yield('content')
    </main>
</body>

</html>