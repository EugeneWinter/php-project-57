<x-app-layout>
    <x-slot name="header">
        <div class="text-h1 text-primary-900">{{ __('Панель управления') }}</div>
    </x-slot>

    <div class="py-8 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="grid gap-6 mb-8 md:grid-cols-3">
                <!-- Статистика задач -->
                <div class="card elevation-2">
                    <div class="card-body text-center">
                        <h3 class="text-h3 text-primary-700 mb-2">{{ __('Мои задачи') }}</h3>
                        <p class="text-body-2 text-primary-600">{{ __('Управление проектами') }}</p>
                    </div>
                </div>

                <!-- Статистика статусов -->
                <div class="card elevation-2">
                    <div class="card-body text-center">
                        <h3 class="text-h3 text-success-700 mb-2">{{ __('Статусы') }}</h3>
                        <p class="text-body-2 text-success-600">{{ __('Отслеживание прогресса') }}</p>
                    </div>
                </div>

                <!-- Метки -->
                <div class="card elevation-2">
                    <div class="card-body text-center">
                        <h3 class="text-h3 text-warning-700 mb-2">{{ __('Метки') }}</h3>
                        <p class="text-body-2 text-warning-600">{{ __('Организация контента') }}</p>
                    </div>
                </div>
            </div>

            <!-- Главная информационная карточка -->
            <div class="card elevation-4">
                <div class="card-body text-center">
                    <h2 class="text-h2 text-primary-900 mb-4">
                        {{ __("Добро пожаловать в систему!") }}
                    </h2>
                    <p class="text-body-1 text-primary-600 mb-8">
                        {{ __("Вы успешно авторизованы и готовы к продуктивной работе. Начните управлять своими задачами прямо сейчас.") }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('tasks.index') }}" class="btn btn-primary">
                            {{ __('Мои задачи') }}
                        </a>
                        <a href="{{ route('tasks.create') }}" class="btn btn-secondary">
                            {{ __('Создать задачу') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
