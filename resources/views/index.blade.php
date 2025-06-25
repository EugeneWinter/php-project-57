<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('Добро пожаловать в менеджер задач') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-glass overflow-hidden shadow-xl rounded-lg p-8 text-center">
                <h1 class="text-4xl font-bold text-blue-800 mb-6">
                    {{ __('Система управления задачами') }}
                </h1>
                <p class="text-xl text-blue-700 mb-8 max-w-2xl mx-auto">
                    {{ __('Эффективно управляйте задачами с помощью этой мега ультра хайповой платформы') }}
                </p>
                <div class="flex justify-center">
                    <a href="{{ route('login') }}" 
                       class="btn-blue px-6 py-3 text-lg">
                        {{ __('Начать работу') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>