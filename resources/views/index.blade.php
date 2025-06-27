<x-app-layout>
    <x-slot name="header">
        <div class="text-h1 text-primary-900">
            {{ __('Добро пожаловать в менеджер задач') }}
        </div>
    </x-slot>

    <div class="py-8 px-4">
        <div class="max-w-3xl mx-auto">
            <div class="card elevation-4">
                <div class="card-body text-center">
                    <h1 class="text-h1 text-primary-700 mb-6">
                        {{ __('Система управления задачами') }}
                    </h1>
                    <p class="text-body-1 text-primary-600 mb-8">
                        {{ __('Эффективно управляйте задачами с помощью этой мега ультра хайповой платформы') }}
                    </p>
                    <div class="flex justify-center">
                        <a href="{{ route('login') }}" 
                           class="btn btn-primary">
                            {{ __('Начать работу →') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>