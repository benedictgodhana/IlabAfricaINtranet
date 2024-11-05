<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- FullCalendar CSS -->
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />

<!-- FullCalendar JS -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>





    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Apply Poppins font */
        body, a, button {
            font-family: 'Poppins', sans-serif;
        }

        /* Background color */
        body {
            background-color: #f5f5f5;
            margin: 0; /* Remove default margin */
            overflow: hidden; /* Prevent body scroll */
        }

        /* Sidebar styling */
        #sidebar {
            position: fixed; /* Fix the sidebar */
            top: 0;
            left: 0;
            height: 100%; /* Full height */
            width: 240px; /* Set fixed width for sidebar */
            background-color:darkblue;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
            z-index: 1000; /* Above other content */
            transition: transform 0.3s ease-in-out;
            color:white;
        }

        /* Elevated header */
        header {
            background: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.05);
        }

        /* Modern button styling */
        a, button {
            transition: background-color 0.2s, box-shadow 0.2s;
        }

        a:hover, button:hover {
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        /* Sidebar Links */
        .sidebar-link {
            padding: 12px 16px;
            border-radius: 8px;
            transition: background-color 0.2s;
            font-size: 12px;
            font-weight: 900;
        }

        .sidebar-link:hover {
            background-color: white;
            color: #1e88e5;
        }

        .sidebar-active {
            background-color: #2196f3;
            color: white;
        }

        /* Logo Styling */
        .sidebar-logo img {
            max-width: 200px;
            margin: 0 auto;
            display: block;
            height: 60px;
        }

        /* Footer text */
        footer {
            margin-top: auto;
            text-align: center;
            color: #9e9e9e;
            font-size: 12px;
        }

        /* Main content */
        .main-content {
            margin-left: 240px; /* Leave space for the fixed sidebar */
            padding: 1rem; /* Default padding */
            overflow-y: auto; /* Allow scrolling within the main content */
            transition: margin-left 0.3s ease; /* Smooth transition when the sidebar toggles */
        }

        /* Toggle button styling */
        .toggle-button {
            display: none; /* Hide toggle button on larger screens */
            background-color: transparent;
            border: none;
            font-size: 24px;
            cursor: pointer;
            position: absolute;
            top: 15px;
            left: 15px;
            z-index: 1001; /* Above sidebar */
        }

        /* Responsive styling */
        @media (max-width: 768px) {
            #sidebar {
                width: 240px; /* Set fixed width for sidebar */
                transform: translateX(-100%); /* Hide by default */
            }

            #sidebar.active {
                transform: translateX(0); /* Show sidebar */
            }

            .toggle-button {
                display: block; /* Show toggle button on small screens */
            }

            .main-content {
                margin-left: 0; /* Remove margin for mobile view */
                padding: 1rem; /* Add padding for mobile */
            }
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex">

        <!-- Sidebar -->
        <aside id="sidebar">
            <!-- Logo -->
            <div class="p-6 sidebar-logo">
                <img src="/images/iLab white Logo-01.png" style="height:240px" alt="App Logo">
            </div>

            <div class="p-6 flex flex-col">
                <ul class="space-y-4">
                    <li>
                        <a href="/dashboard" class="sidebar-link flex items-center {{ request()->is('dashboard') ? 'sidebar-active' : '' }}">
                            <span class="fa fa-tachometer-alt mr-3"></span> Dashboard
                        </a>
                    </li>
                    <li>
    <a href="/events" class="sidebar-link flex items-center {{ request()->is('events') ? 'sidebar-active' : '' }}">
        <span class="fa fa-calendar mr-3"></span> Events
    </a>
</li>

                    <li>
                        <a href="/notices" class="sidebar-link flex items-center {{ request()->is('notices') ? 'sidebar-active' : '' }}">
                            <span class="fa fa-bell mr-3"></span> Notices
                        </a>
                    </li>
                    <li>
                        <a href="/birthdays" class="sidebar-link flex items-center {{ request()->is('birthdays') ? 'sidebar-active' : '' }}">
                            <span class="fa fa-calendar-alt mr-3"></span> Birthdays
                        </a>
                    </li>
                    <li>
                        <a href="/users" class="sidebar-link flex items-center {{ request()->is('users') ? 'sidebar-active' : '' }}">
                            <span class="fa fa-users mr-3"></span> Manage Users
                        </a>
                    </li>
                    <li>
                        <a href="/settings" class="sidebar-link flex items-center {{ request()->is('settings') ? 'sidebar-active' : '' }}">
                            <span class="fa fa-cogs mr-3"></span> Settings
                        </a>
                    </li>
                    <li>
                        <a href="/profile" class="sidebar-link flex items-center {{ request()->is('profile') ? 'sidebar-active' : '' }}">
                            <span class="fa fa-user-circle mr-3"></span> Profile
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="sidebar-link flex items-center">
                                <span class="fa fa-sign-out-alt mr-3"></span> Logout
                            </button>
                        </form>
                    </li>
                </ul>

                <footer class="mt-8">
                    Copyright &copy; <script>document.write(new Date().getFullYear());</script>
                    All rights reserved.
                </footer>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 bg-gray-100 relative main-content">
            <button class="toggle-button" id="sidebarCollapse">
                <span class="fa fa-bars"></span>
            </button>

            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="p-9 mt-16">
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Sidebar Toggle Script -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleButton = document.getElementById('sidebarCollapse');

        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    </script>
</body>
</html>
