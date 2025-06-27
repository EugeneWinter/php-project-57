<nav x-data="{ open: false }" class="bg-glass border-b border-blue-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="hidden sm:flex sm:items-center sm:ms-10">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Панель управления') }}
                    </x-nav-link>
                    <x-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.*')">
                        {{ __('Задачи') }}
                    </x-nav-link>
                    <x-nav-link :href="route('task_statuses.index')" :active="request()->routeIs('task_statuses.*')">
                        {{ __('Статусы') }}
                    </x-nav-link>
                    <x-nav-link :href="route('labels')" :active="request()->routeIs('labels')">
                        {{ __('Метки') }}
                    </x-nav-link>
                </div>
            </div>

            @auth
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-blue-800 bg-white hover:text-blue-600 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-blue-700 hover:bg-blue-50">
                            {{ __('Профиль') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full px-4 py-2 text-start text-sm leading-5 text-blue-700 hover:bg-blue-50 focus:outline-none focus:bg-blue-50 transition duration-150 ease-in-out">
                                {{ __('Выйти') }}
                            </button>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @endauth

            @auth
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-blue-600 hover:text-blue-800 hover:bg-blue-100 focus:outline-none transition duration-150 ease-in-out">
                    Меню
                </button>
            </div>
            @endauth
        </div>
    </div>

    @auth
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-glass">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Панель управления') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.*')">
                {{ __('Задачи') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('task_statuses.index')" :active="request()->routeIs('task_statuses.*')">
                {{ __('Статусы') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('labels')" :active="request()->routeIs('labels')">
                {{ __('Метки') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-4 pb-1 border-t border-blue-200">
            <div class="px-4">
                <div class="font-medium text-base text-blue-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-blue-600">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-blue-700">
                    {{ __('Профиль') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-blue-700 hover:text-blue-800 hover:bg-blue-50 hover:border-blue-300 focus:outline-none focus:text-blue-800 focus:bg-blue-50 focus:border-blue-300 transition duration-150 ease-in-out">
                        {{ __('Выйти') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endauth
</nav>