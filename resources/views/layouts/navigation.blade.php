<nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900 shadow-md">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
        <a href="{{ route('home') }}" class="flex items-center">
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">{{__('Task manager')}}</span>
        </a>

        @auth
            <div class="items-center justify-between lg:flex lg:w-auto lg:order-1">
                <ul class="flex flex-row font-medium lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="/tasks" class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0">
                            {{ __('nav.tasks') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('task_statuses.index') }}" class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0">
                            {{ __('nav.statuses') }}</a>
                    </li>
                    <li>
                        <a href="/labels" class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700 lg:p-0">
                            {{ __('nav.labels') }}</a>
                    </li>
                </ul>
            </div>
        @endauth

        <div class="flex items-center lg:order-2">
            @auth
                <a href="{{ route('logout') }}"
                   data-method="POST"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                    {{ __('nav.logout') }}
                </a>
            @else
                <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('nav.login') }}
                </a>
                <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                    {{ __('nav.register') }}
                </a>
            @endauth
        </div>
    </div>
</nav>
