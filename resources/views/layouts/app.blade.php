<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Task Manager') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="layout">
    <header class="app-bar">
        <div class="app-bar-container">
            <div class="app-bar-brand">
                <a href="{{ route('dashboard') }}" class="logo">{{ config('app.name') }}</a>
            </div>
            
            <nav class="nav">
                <ul class="nav-list">
                    <li class="nav-item">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Панель управления') }}
                        </x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.*')">
                            {{ __('Задачи') }}
                        </x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link :href="route('task_statuses.index')" :active="request()->routeIs('task_statuses.*')">
                            {{ __('Статусы') }}
                        </x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link :href="route('labels.index')" :active="request()->routeIs('labels.*')">
                            {{ __('Метки') }}
                        </x-nav-link>
                    </li>
                </ul>
            </nav>

            @auth
            <div class="user-menu">
                <div class="user-btn">
                    <span class="user-name">{{ Auth::user()->name }}</span>
                    <div class="user-dropdown">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Профиль') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')">
                                {{ __('Выйти') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                </div>
            </div>
            @endauth
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            {{ $slot }}
        </div>
    </main>
</body>
</html>