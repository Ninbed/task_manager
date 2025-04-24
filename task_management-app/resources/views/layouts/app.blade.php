<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Task Manager</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Scripts and Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Nunito', sans-serif;
        }

        .navbar {
            background: #ffffff;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            padding: 1rem;
        }

        .navbar-brand {
            font-weight: 700;
            color: #0d47a1;
            transition: color 0.3s ease;
        }

        .navbar-brand:hover {
            color: #1976d2;
        }

        .nav-link {
            color: #455a64;
            font-weight: 600;
            padding: 0.5rem 1rem;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #0d47a1;
        }

        .dropdown-toggle {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-radius: 10px;
            padding: 0.5rem;
        }

        .dropdown-item {
            border-radius: 8px;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background: #e3f2fd;
            color: #0d47a1;
        }

        /* Button Styles */
        .btn-custom {
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-login {
            background: linear-gradient(45deg, #0d47a1, #1976d2);
            color: white;
        }

        .btn-login:hover {
            background: linear-gradient(45deg, #1565c0, #2196f3);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(13, 71, 161, 0.3);
        }

        .btn-register {
            background: transparent;
            color: #0d47a1;
            border: 2px solid #0d47a1;
        }

        .btn-register:hover {
            background: #0d47a1;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(13, 71, 161, 0.2);
        }

        .btn-logout {
            background: #e53935;
            color: white;
            width: 100%;
            text-align: left;
            justify-content: start;
        }

        .btn-logout:hover {
            background: #c62828;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(229, 57, 53, 0.3);
        }

        .btn-nav {
            padding: 0.5rem;
            width: 20px;
            height: 40px;
            border-radius: 50%;
            background: #e3f2fd;
            color: #0d47a1;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-nav:hover {
            background: #0d47a1;
            color: white;
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(13, 71, 161, 0.2);
        }

        .btn-nav:disabled {
            background: #e0e0e0;
            color: #9e9e9e;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .navbar-toggler {
            border: none;
            padding: 0.5rem;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        main {
            min-height: calc(100vh - 80px);
        }

        @media (max-width: 768px) {
            .btn-custom, .btn-nav {
                padding: 0.4rem 1rem;
                font-size: 0.9rem;
            }
            .btn-nav {
                width: 35px;
                height: 35px;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="d-flex align-items-center">
                    <button class="btn-nav me-2" onclick="history.back()" title="Back">
                        <i class="bi bi-arrow-left"></i>
                    </button>
                    <button class="btn-nav me-3" onclick="history.forward()" title="Forward">
                        <i class="bi bi-arrow-right"></i>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Task Manager
                    </a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto align-items-center">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link btn-custom btn-login" href="{{ route('login') }}">
                                        <i class="bi bi-box-arrow-in-right"></i> {{ __('Login') }}
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item ms-2">
                                    <a class="nav-link btn-custom btn-register" href="{{ route('register') }}">
                                        <i class="bi bi-person-plus"></i> {{ __('Register') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> --}}
                                    <span class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                        {{ substr(Auth::user()->name, 0, 2) }}
                                    </span>
                                    <span class="ms-2">{{ Auth::user()->name }}</span>
                                </a>

                                {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item btn-custom btn-logout" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div> --}}
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const backBtn = document.querySelector('.btn-nav[title="Back"]');
            const forwardBtn = document.querySelector('.btn-nav[title="Forward"]');
            
            if (window.history.length <= 1) {
                backBtn.disabled = true;
            }
            forwardBtn.disabled = true; // Basic forward disable
        });
    </script>
</body>
</html>