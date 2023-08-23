<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cat Boarding App') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Add your own CSS style -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .admin-panel {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #007bff; /* Blue color */
            color: white;
            padding-top: 20px;
        }

        .nav-item {
            margin-bottom: 10px;
        }

        .nav-link {
            color: #fff; /* White text */
            text-decoration: none;
            padding: 10px 20px;
            display: block;
            transition: background-color 0.3s;
        }

        .nav-link:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .content {
            flex: 1;
            padding: 20px;
        }
        .navbar-brand {
             display: flex;
             align-items: center;
             justify-content: center;
            }

        .navbar-logo {
            border-radius: 50%; /* Make the image round */
            overflow: hidden; /* Hide overflow to ensure round shape */
        }
    </style>
</head>

<body>
    <div class="admin-panel">
        <nav class="sidebar">
            <ul class="nav">
                <div class="container mt-6">
                    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                        <div class="navbar-logo">
                    <img src="{{ asset('assets/img/kittycamp.png') }}" alt="Kitty Camp" width="80" height="80">
                        </div>
                    </a>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.userManagement') }}">User Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.bookingManagement') }}">Booking Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.feedbackManagement') }}">Feedback Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.catStatusNotification') }}">Cat Status Notification</a>
                </li>
            </ul>
        </nav>
        <main class="content">
            @yield('content')
        </main>
    </div>
    </div>
</body>
</html>