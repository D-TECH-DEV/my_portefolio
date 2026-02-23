<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard') - You-Soft Admin</title>

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Noto+Serif:wght@400;700&display=swap"
        rel="stylesheet">

    <link rel="shortcut icon"
    href="{{ asset('assets/images/favicon.png') }}">

    <style>
        :root {
            --admin-bg: #0a1128;
            --admin-bg-secondary: #0d1b3e;
            --admin-accent: #dca73a;
            --admin-lighter: #142850;
            --admin-text-base: #aab8c5;
            --admin-text-heading: #FFFFFF;
            --admin-border: rgba(220, 167, 58, 0.15);
            --admin-sidebar-width: 260px;
            --admin-topbar-height: 70px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Lato', sans-serif;
            background: var(--admin-bg);
            color: var(--admin-text-base);
            font-size: 15px;
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Noto Serif', serif;
            color: var(--admin-text-heading);
            font-weight: 700;
        }

        /* Sidebar Styles */
        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--admin-sidebar-width);
            height: 100vh;
            background: rgba(13, 27, 62, 0.8);
            backdrop-filter: blur(15px);
            border-right: 1px solid rgba(220, 167, 58, 0.1);
            z-index: 1000;
            overflow-y: auto;
            transition: all 0.3s ease;
        }

        .admin-sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .admin-sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .admin-sidebar::-webkit-scrollbar-thumb {
            background: rgba(220, 167, 58, 0.2);
            border-radius: 3px;
        }

        .admin-sidebar .brand {
            padding: 25px;
            border-bottom: 1px solid rgba(220, 167, 58, 0.1);
            display: flex;
            justify-content: center;
        }

        .admin-sidebar .brand img {
            max-height: 40px;
            filter: drop-shadow(0 0 5px rgba(220, 167, 58, 0.3));
        }

        /* Topbar Styles */
        .admin-topbar {
            position: fixed;
            top: 0;
            left: var(--admin-sidebar-width);
            right: 0;
            height: var(--admin-topbar-height);
            background: rgba(13, 27, 62, 0.7);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(220, 167, 58, 0.1);
            z-index: 999;
            display: flex;
            align-items: center;
            padding: 0 30px;
            transition: all 0.3s ease;
        }

        .admin-breadcrumb {
            flex: 1;
        }

        .admin-breadcrumb .breadcrumb {
            margin: 0;
            background: transparent;
            padding: 0;
        }

        .admin-breadcrumb .breadcrumb-item {
            color: var(--admin-text-base);
            font-size: 14px;
        }

        .admin-breadcrumb .breadcrumb-item.active {
            color: var(--admin-accent);
        }

        .admin-breadcrumb .breadcrumb-item a {
            color: var(--admin-text-base);
            text-decoration: none;
        }

        .admin-breadcrumb .breadcrumb-item a:hover {
            color: var(--admin-accent);
        }

        .admin-topbar-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .admin-search {
            position: relative;
        }

        .admin-search input {
            background: var(--admin-lighter);
            border: 1px solid var(--admin-border);
            border-radius: 20px;
            padding: 8px 40px 8px 20px;
            color: var(--admin-text-heading);
            width: 250px;
            font-size: 14px;
        }

        .admin-search input::placeholder {
            color: var(--admin-text-base);
        }

        .admin-search input:focus {
            outline: none;
            border-color: var(--admin-accent);
        }

        .admin-search i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--admin-text-base);
        }

        .admin-icon-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--admin-lighter);
            border: none;
            color: var(--admin-text-base);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .admin-icon-btn:hover {
            background: var(--admin-accent);
            color: var(--admin-bg-secondary);
        }

        .admin-icon-btn .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #dc3545;
            font-size: 10px;
            padding: 3px 6px;
        }

        .admin-user-dropdown {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            padding: 5px 15px;
            border-radius: 25px;
            background: var(--admin-lighter);
            transition: all 0.3s ease;
        }

        .admin-user-dropdown:hover {
            background: var(--admin-accent);
        }

        .admin-user-dropdown img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
        }

        .admin-user-dropdown span {
            color: var(--admin-text-heading);
            font-size: 14px;
            font-weight: 600;
        }

        /* Main Content */
        .admin-content {
            margin-left: var(--admin-sidebar-width);
            margin-top: var(--admin-topbar-height);
            padding: 30px;
            min-height: calc(100vh - var(--admin-topbar-height));
        }

        /* Cards */
        .admin-card {
            background: var(--admin-bg-secondary);
            border: 1px solid var(--admin-border);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .admin-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--admin-border);
        }

        .admin-card-header h5 {
            margin: 0;
            font-size: 18px;
            color: var(--admin-text-heading);
        }

        /* Buttons */
        .btn-admin-primary {
            background: var(--admin-accent);
            color: var(--admin-bg-secondary);
            border: none;
            padding: 10px 25px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-admin-primary:hover {
            background: #c99632;
            color: var(--admin-bg-secondary);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 167, 58, 0.3);
        }

        .btn-admin-secondary {
            background: var(--admin-lighter);
            color: var(--admin-text-heading);
            border: 1px solid var(--admin-border);
            padding: 10px 25px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-admin-secondary:hover {
            background: var(--admin-accent);
            color: var(--admin-bg-secondary);
            border-color: var(--admin-accent);
        }

        /* Tables */
        .admin-table {
            width: 100%;
            color: var(--admin-text-base);
        }

        .admin-table thead th {
            background: var(--admin-lighter);
            color: var(--admin-text-heading);
            font-weight: 600;
            padding: 15px;
            border: none;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .admin-table tbody td {
            padding: 15px;
            border-bottom: 1px solid var(--admin-border);
            vertical-align: middle;
        }

        .admin-table tbody tr:hover {
            background: var(--admin-lighter);
        }

        /* Badges */
        .badge-admin-success {
            background: #28a745;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-admin-warning {
            background: #ffc107;
            color: var(--admin-bg-secondary);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-admin-danger {
            background: #dc3545;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-admin-info {
            background: #17a2b8;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        /* Forms */
        .admin-form-control {
            background: var(--admin-lighter);
            border: 1px solid var(--admin-border);
            border-radius: 10px;
            padding: 12px 15px;
            color: var(--admin-text-heading);
            font-size: 14px;
        }

        .admin-form-control:focus {
            background: var(--admin-lighter);
            border-color: var(--admin-accent);
            color: var(--admin-text-heading);
            box-shadow: 0 0 0 0.2rem rgba(220, 167, 58, 0.25);
        }

        .admin-form-control::placeholder {
            color: var(--admin-text-base);
        }

        .admin-form-label {
            color: var(--admin-text-base);
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }

        /* Mobile Menu Toggle */
        .admin-mobile-toggle {
            display: none;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--admin-lighter);
            border: none;
            color: var(--admin-text-heading);
            cursor: pointer;
        }

        .admin-nav {
            padding: 20px 0;
        }

        .admin-nav-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .admin-nav-item {
            padding: 0 15px;
            margin-bottom: 5px;
        }

        .admin-nav-link {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 20px;
            color: var(--admin-text-base);
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .admin-nav-link i {
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .admin-nav-link:hover {
            background: rgba(220, 167, 58, 0.1);
            color: var(--admin-accent);
            transform: translateX(5px);
        }

        .admin-nav-link.active {
            background: var(--admin-accent);
            color: var(--admin-bg-secondary);
            box-shadow: 0 4px 15px rgba(220, 167, 58, 0.3);
        }

        .admin-nav-link.active i {
            color: var(--admin-bg-secondary);
        }

        .admin-nav-divider {
            height: 1px;
            background: rgba(220, 167, 58, 0.1);
            margin: 20px 25px;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .admin-sidebar {
                left: -260px;
            }

            .admin-sidebar.show {
                left: 0;
            }

            .admin-topbar {
                left: 0;
            }

            .admin-content {
                margin-left: 0;
            }

            .admin-mobile-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .admin-search {
                display: none;
            }
        }

        @media (max-width: 575px) {
            .admin-content {
                padding: 15px;
            }

            .admin-topbar {
                padding: 0 15px;
            }

            .admin-user-dropdown span {
                display: none;
            }
        }
    </style>

    @yield('styles')
</head>

<body>

    <aside class="admin-sidebar" id="adminSidebar">
        <div class="brand">
            <img src="{{ asset("assets/images/logos/logo.png") }}" class="img-fluid" alt="">
        </div>

        <nav class="admin-nav">
            <ul class="admin-nav-list">
                <li class="admin-nav-item">
                    <a href="{{ route('admin') }}"
                        class="admin-nav-link {{ request()->routeIs('admin') ? 'active' : '' }} ">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="admin-nav-item">
                    <a href="{{ route('admin.projects') }}"
                        class="admin-nav-link {{ request()->routeIs('admin.projects*') ? 'active' : '' }} ">
                        <i class="bi bi-folder"></i>
                        <span>Projets</span>
                    </a>
                </li>

                <li class="admin-nav-item">
                    <a href="{{ route('admin.skills') }}"
                        class="admin-nav-link {{ request()->routeIs('admin.skills*') ? 'active' : '' }} ">
                        <i class="bi bi-star"></i>
                        <span>Compétences</span>
                    </a>
                </li>

                <li class="admin-nav-item">
                    <a href="{{ route('admin.services') }}"
                        class="admin-nav-link {{ request()->routeIs('admin.services*') ? 'active' : '' }} ">
                        <i class="bi bi-briefcase"></i>
                        <span>Services</span>
                    </a>
                </li>

                <li class="admin-nav-item">
                    <a href="{{ route('admin.blog') }}"
                        class="admin-nav-link {{ request()->routeIs('admin.blog*') ? 'active' : '' }}">
                        <i class="bi bi-newspaper"></i>
                        <span>Blog</span>
                    </a>
                </li>

                <li class="admin-nav-item">
                    <a href="{{ route('admin.messages') }}"
                        class="admin-nav-link {{ request()->routeIs('admin.messages*') ? 'active' : '' }} ">
                        <i class="bi bi-envelope"></i>
                        <span>Messages</span>
                    </a>
                </li>

                <li class="admin-nav-item">
                    <a href="{{ route('admin.testimonials') }}"
                        class="admin-nav-link {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }} ">
                        <i class="bi bi-chat-quote"></i>
                        <span>Témoignages</span>
                    </a>
                </li>

                <li class="admin-nav-divider"></li>

                <li class="admin-nav-item">
                    <a href="{{ route('admin.profile') }}"
                        class="admin-nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }} ">
                        <i class="bi bi-person"></i>
                        <span>Profil</span>
                    </a>
                </li>

                <li class="admin-nav-item">
                    <a href="{{ route('admin.settings') }}"
                        class="admin-nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }} ">
                        <i class="bi bi-gear"></i>
                        <span>Paramètres</span>
                    </a>
                </li>

                <li class="admin-nav-divider"></li>

                <li class="admin-nav-item">
                    <a href="{{ route('index') }}" target="_blank" class="admin-nav-link">
                        <i class="bi bi-arrow-left-circle"></i>
                        <span>Retour au site</span>
                    </a>
                </li>

                <li class="admin-nav-item">
                    <a href="{{ route("logout") }}" class="admin-nav-link text-danger"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Déconnexion</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Topbar -->
    <header class="admin-topbar">
        <button class="admin-mobile-toggle" onclick="toggleSidebar()">
            <i class="bi bi-list"></i>
        </button>

        <div class="admin-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @yield('breadcrumb')
                </ol>
            </nav>
        </div>

        <div class="admin-topbar-actions">
            <div class="admin-search">
                <input type="text" placeholder="Rechercher...">
                <i class="bi bi-search"></i>
            </div>

            <button class="admin-icon-btn">
                <i class="bi bi-bell"></i>
                <span class="badge">3</span>
            </button>

            <div class="admin-user-dropdown" data-bs-toggle="dropdown">
                <img src="{{ auth()->user() && auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name ?? 'Admin') . '&background=dca73a&color=0a1128' }}"
                    alt="User">
                <span>{{ auth()->user()->name ?? 'Admin' }}</span>
                <i class="bi bi-chevron-down"></i>
            </div>
            <ul class="dropdown-menu dropdown-menu-end"
                style="background: var(--admin-bg-secondary); border: 1px solid var(--admin-border);">
                <li><a class="dropdown-item" href="{{ route('admin.profile') }}"
                        style="color: var(--admin-text-base);">Mon Profil</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.settings') }}"
                        style="color: var(--admin-text-base);">Paramètres</a></li>
                <li>
                    <hr class="dropdown-divider" style="border-color: var(--admin-border);">
                </li>
                <li><a class="dropdown-item" href="#" style="color: #dc3545;">Déconnexion</a></li>
            </ul>
        </div>
    </header>

    <!-- Main Content -->
    <main class="admin-content">
        @yield('content')
    </main>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Toggle Sidebar on Mobile
        function toggleSidebar() {
            document.getElementById('adminSidebar').classList.toggle('show');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function (event) {
            const sidebar = document.getElementById('adminSidebar');
            const toggle = document.querySelector('.admin-mobile-toggle');

            if (window.innerWidth <= 991) {
                if (!sidebar.contains(event.target) && !toggle.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });
    </script>

    @yield('scripts')
</body>

</html>