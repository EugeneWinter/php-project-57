<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Task Manager') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ route('dashboard') }}" class="logo">Task Manager</a>
            
            <div class="nav-links">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    {{ __('Панель управления') }}
                </a>
                <a href="{{ route('tasks.index') }}" class="nav-link {{ request()->routeIs('tasks.*') ? 'active' : '' }}">
                    {{ __('Задачи') }}
                </a>
                <a href="{{ route('labels.index') }}" class="nav-link {{ request()->routeIs('labels.*') ? 'active' : '' }}">
                    {{ __('Метки') }}
                </a>
            </div>
            
            @auth
            <div class="user-menu">
                <button class="user-btn">
                    <span>{{ Auth::user()->name }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                
                <div class="user-dropdown">
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        {{ __('Профиль') }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item w-full text-left">
                            {{ __('Выйти') }}
                        </button>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </nav>

    <main class="main-content">
        <div class="container">
            @if (isset($header))
                <div class="mb-6">
                    <h1 class="text-3xl font-bold text-blue-800">{{ $header }}</h1>
                </div>
            @endif

            {{ $slot }}
        </div>
    </main>

    <footer class="mt-12 text-center text-gray-600">
        <div class="container">
            <p>© {{ date('Y') }} Task Manager. Никаких прав нет, воруйте.</p>
        </div>
    </footer>
</body>
</html>