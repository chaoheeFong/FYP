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
</head>

<body>
    <div class="admin-panel">
        <nav class="sidebar">
            <ul class="nav">
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
</body>
</html>