<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ __('Просмотр задачи') }}: {{ $task->name }}
            </h2>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                {{ __('Назад') }}
            </a>
        </div>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <div class="space-y-4">
                <div>
                    <h3 class="text-lg font-medium text-gray-900">{{ __('Основная информация') }}</h3>
                    <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">{{ __('Название') }}</p>
                            <p class="font-medium">{{ $task->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">{{ __('Статус') }}</p>
                            <p class="font-medium">{{ $task->status->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">{{ __('Автор') }}</p>
                            <p class="font-medium">{{ $task->createdBy->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">{{ __('Исполнитель') }}</p>
                            <p class="font-medium">{{ $task->assignedTo->name ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-medium text-gray-900">{{ __('Описание') }}</h3>
                    <p class="mt-2 text-gray-600">{{ $task->description ?? __('Нет описания') }}</p>
                </div>

                @if($task->labels->count() > 0)
                <div>
                    <h3 class="text-lg font-medium text-gray-900">{{ __('Метки') }}</h3>
                    <div class="mt-2 flex flex-wrap gap-2">
                        @foreach($task->labels as $label)
                        <span class="badge badge-secondary">
                            {{ $label->name }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif

                <div class="flex items-center justify-between pt-4">
                    <span class="text-sm text-gray-500">
                        {{ __('Создано:') }} {{ $task->created_at->format('d.m.Y H:i') }}
                    </span>
                    @can('update', $task)
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-secondary">
                        {{ __('Редактировать') }}
                    </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>