<header class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="text-xl font-semibold text-gray-900">
                    {{ config('app.name') }}
                </a>
                <nav class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <x-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.*')">
                        {{ __('Задачи') }}
                    </x-nav-link>
                    <x-nav-link :href="route('task_statuses.index')" :active="request()->routeIs('task_statuses.*')">
                        {{ __('Статусы') }}
                    </x-nav-link>
                    <x-nav-link :href="route('labels.index')" :active="request()->routeIs('labels.*')">
                        {{ __('Метки') }}
                    </x-nav-link>
                </nav>
            </div>

            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                @auth
                <div class="relative">
                    <button class="flex items-center text-sm rounded-full focus:outline-none">
                        <span class="sr-only">{{ __('Открыть меню') }}</span>
                        <span class="font-medium text-gray-700">{{ Auth::user()->name }}</span>
                    </button>
                    <div class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                        <div class="py-1">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Профиль') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Выйти') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <div class="flex space-x-4">
                    <a href="{{ route('login') }}" class="btn btn-secondary">
                        {{ __('Вход') }}
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-primary">
                        {{ __('Регистрация') }}
                    </a>
                </div>
                @endauth
            </div>
        </div>
    </div>
</header>