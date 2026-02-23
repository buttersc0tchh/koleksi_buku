<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Koleksi Buku - Aplikasi Manajemen Koleksi Buku">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Koleksi Buku')</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    
    <!-- ======= Style Global (Berlaku untuk semua halaman) ======= -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}">
    
    <!-- MDI Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    
    <!-- Template Global Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
    <!-- Custom Styles (Global) -->
    <style>
        /* Layout Styles */
        body {
            font-family: 'Ubuntu', sans-serif;
            background-color: #f8f9fa;
        }
        
        /* Navbar Styles */
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            color: #fff !important;
        }
        
        .navbar-nav .nav-link {
            color: rgba(255,255,255,0.9) !important;
            transition: color 0.3s;
        }
        
        .navbar-nav .nav-link:hover {
            color: #fff !important;
        }
        
        /* Sidebar Styles */
        .sidebar {
            min-height: calc(100vh - 56px);
            background: #fff;
            box-shadow: 2px 0 10px rgba(0,0,0,0.05);
            padding: 0;
        }
        
        .sidebar .nav-item {
            border-bottom: 1px solid #f0f0f0;
        }
        
        .sidebar .nav-link {
            color: #333;
            padding: 15px 20px;
            transition: all 0.3s;
        }
        
        .sidebar .nav-link:hover {
            background-color: #f8f9fa;
            color: #667eea;
        }
        
        .sidebar .nav-link.active {
            background-color: #667eea;
            color: #fff;
        }
        
        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        /* Main Content Styles */
        .main-content {
            padding: 20px;
            min-height: calc(100vh - 56px - 60px);
        }
        
        /* Footer Styles */
        .footer {
            background: #fff;
            padding: 15px 0;
            border-top: 1px solid #e9ecef;
            text-align: center;
            font-size: 0.9rem;
            color: #6c757d;
        }
        
        /* Card Styles */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            border-radius: 10px 10px 0 0 !important;
            border: none;
        }
        
        /* Button Styles */
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 5px;
            padding: 10px 25px;
            transition: transform 0.3s;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #5a6fd6 0%, #6a4190 100%);
        }
    </style>
    
    <!-- ======= Style Page (Berlaku hanya untuk halaman tertentu) ======= -->
    @yield('style-page')
</head>
<body>
    <!-- ======= Header ======= -->
    <nav class="navbar navbar-expand-md navbar-dark sticky-top">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-book-reader mr-2"></i>
                Koleksi Buku
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                                <i class="fas fa-user-circle mr-1"></i>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt mr-1"></i>
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt mr-1"></i>
                                Login
                            </a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fas fa-user-plus mr-1"></i>
                                Register
                            </a>
                        </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- ======= Sidebar ======= -->
            @auth
            <nav class="col-md-2 d-md-block sidebar">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ url('/home') }}">
                                <i class="fas fa-home"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('buku*') ? 'active' : '' }}" href="{{ route('buku.index') }}">
                                <i class="fas fa-book"></i>
                                Buku
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('kategori*') ? 'active' : '' }}" href="{{ route('kategori.index') }}">
                                <i class="fas fa-tags"></i>
                                Kategori
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('penulis*') ? 'active' : '' }}" href="#">
                                <i class="fas fa-pen"></i>
                                Penulis
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('penerbit*') ? 'active' : '' }}" href="#">
                                <i class="fas fa-building"></i>
                                Penerbit
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            @endauth

            <!-- ======= Content ======= -->
            <main class="col-md-10 ms-sm-auto main-content">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- ======= Footer ======= -->
    <footer class="footer mt-auto">
        <div class="container">
            <span>&copy; {{ date('Y') }} Koleksi Buku. All rights reserved.</span>
        </div>
    </footer>

    <!-- ======= Javascript Global (Berlaku untuk semua halaman) ======= -->
    <!-- jQuery -->
    <script src="{{ asset('assets/vendors/js/jquery.min.js') }}"></script>
    
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <!-- Custom Scripts (Global) -->
    <script>
        // CSRF Token for AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        // Add active class to current nav item
        $(document).ready(function() {
            $('.sidebar .nav-link').each(function() {
                if (window.location.href.includes($(this).attr('href'))) {
                    $(this).addClass('active');
                }
            });
        });
    </script>
    
    <!-- ======= Javascript Page (Berlaku hanya untuk halaman tertentu) ======= -->
    @yield('javascript-page')
</body>
</html>
