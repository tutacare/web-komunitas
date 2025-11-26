<!DOCTYPE html>
<html>

<head>
    <title>{{ $title ?? 'Komunitas Motor' }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

    {{-- Navbar frontend --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Komunitas Motor</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="menu" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li><a class="nav-link" href="/">Beranda</a></li>
                    <li><a class="nav-link" href="#about">Tentang</a></li>
                    <li><a class="nav-link" href="#events">Event</a></li>
                    <li><a class="nav-link" href="#gallery">Galeri</a></li>
                    <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

</body>

</html>
