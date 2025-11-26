<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            overflow-x: hidden;
            background: #f4f6f9;
        }

        /* SIDEBAR */
        .main-sidebar {
            width: 250px;
            background: #343a40;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 60px;
            transition: all .3s;
        }

        .sidebar-mini {
            width: 70px !important;
        }

        .sidebar-brand {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 60px;
            background: #23272b;
            color: white;
            display: flex;
            align-items: center;
            padding-left: 20px;
            font-size: 20px;
            z-index: 1005;
            transition: width .3s;
        }

        .sidebar-mini .sidebar-brand {
            width: 70px !important;
            padding-left: 10px;
        }

        .sidebar-menu a {
            color: #c2c7d0;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 4px;
        }

        .sidebar-menu a:hover,
        .sidebar-menu .active {
            background: #0d6efd;
            color: white;
        }

        .menu-text {
            transition: opacity .3s;
        }

        .sidebar-mini .menu-text {
            opacity: 0;
        }

        /* CONTENT */
        .content-wrapper {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left .3s;
        }

        .content-mini {
            margin-left: 70px !important;
        }

        /* NAVBAR */
        .main-header {
            position: fixed;
            width: 100%;
            height: 60px;
            background: white;
            border-bottom: 1px solid #ddd;
            z-index: 1000;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* RESPONSIVE */
        @media(max-width: 992px) {
            .main-sidebar {
                left: -260px;
            }

            .main-sidebar.show {
                left: 0;
            }

            .content-wrapper,
            .content-mini {
                margin-left: 0 !important;
            }

            .sidebar-brand {
                left: -260px;
            }

            .sidebar-brand.show {
                left: 0;
            }
        }

        .backdrop {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .5);
            z-index: 900;
        }

        .backdrop.show {
            display: block;
        }
    </style>
</head>

<body>

    <!-- Backdrop (Mobile) -->
    <div id="backdrop" class="backdrop"></div>

    <!-- HEADER -->
    <header class="main-header">
        <button id="toggleSidebar" class="btn btn-outline-primary me-2" type="button">
            <i class="bi bi-list"></i>
        </button>

        <button id="minimizeSidebar" class="btn btn-outline-secondary d-none d-lg-inline me-3" type="button">
            <i class="bi bi-chevron-double-left"></i>
        </button>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                @yield('breadcrumb')
            </ol>
        </nav>

        <!-- USER DROPDOWN -->
        <div class="dropdown">
            <button class="btn btn-light fw-bold dropdown-toggle" type="button" id="userDropdownBtn"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle me-1"></i>
                {{ Auth::user()->name }}
            </button>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdownBtn">
                <li>
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="bi bi-person me-2"></i> Profile
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button class="dropdown-item text-danger" type="submit">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </header>



    <!-- SIDEBAR BRAND -->
    <div id="sidebarBrand" class="sidebar-brand">
        KM
    </div>

    <!-- SIDEBAR -->
    <aside id="sidebar" class="main-sidebar">
        <div class="sidebar-menu mt-3">

            <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                <span class="menu-text">Dashboard</span>
            </a>

            <a href="/admin/articles">
                <i class="bi bi-journal-text"></i>
                <span class="menu-text">Articles</span>
            </a>

            <a href="/admin/events">
                <i class="bi bi-calendar-event"></i>
                <span class="menu-text">Events</span>
            </a>

            <a href="/admin/galleries">
                <i class="bi bi-images"></i>
                <span class="menu-text">Gallery</span>
            </a>

            <a href="/admin/members">
                <i class="bi bi-people"></i>
                <span class="menu-text">Members</span>
            </a>

            <a href="/admin/settings">
                <i class="bi bi-gear"></i>
                <span class="menu-text">Settings</span>
            </a>


        </div>
    </aside>

    <!-- CONTENT -->
    <main id="contentWrapper" class="content-wrapper">
        @yield('content')
    </main>
    <!-- Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const sidebar = document.getElementById("sidebar");
        const brand = document.getElementById("sidebarBrand");
        const content = document.getElementById("contentWrapper");
        const toggle = document.getElementById("toggleSidebar");
        const backdrop = document.getElementById("backdrop");
        const minimizeBtn = document.getElementById("minimizeSidebar");

        // === HAMBURGER BUTTON ===
        toggle.addEventListener("click", function() {
            if (window.innerWidth < 992) {
                // MOBILE: buka/offcanvas
                sidebar.classList.toggle("show");
                brand.classList.toggle("show");
                backdrop.classList.toggle("show");
            } else {
                // DESKTOP: toggle mini sidebar
                sidebar.classList.toggle("sidebar-mini");
                brand.classList.toggle("sidebar-mini");
                content.classList.toggle("content-mini");
            }
        });

        // === BACKDROP UNTUK MOBILE ===
        backdrop.addEventListener("click", function() {
            sidebar.classList.remove("show");
            brand.classList.remove("show");
            backdrop.classList.remove("show");
        });

        // === MINIMIZE SIDEBAR BUTTON (DESKTOP ONLY) ===
        minimizeBtn.addEventListener("click", function() {
            sidebar.classList.toggle("sidebar-mini");
            brand.classList.toggle("sidebar-mini");
            content.classList.toggle("content-mini");

            // Ganti ikon tombol otomatis
            if (sidebar.classList.contains("sidebar-mini")) {
                minimizeBtn.innerHTML = `<i class="bi bi-chevron-double-right"></i>`;
            } else {
                minimizeBtn.innerHTML = `<i class="bi bi-chevron-double-left"></i>`;
            }
        });
    </script>


</body>

</html>
