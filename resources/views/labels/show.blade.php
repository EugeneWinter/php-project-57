<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ __('Просмотр метки') }}
            </h2>
            <a href="{{ route('labels.index') }}" class="btn btn-secondary">
                {{ __('Назад') }}
            </a>
        </div>
    </x-slot>

    <div class="card elevation-4">
        <div class="card-body">
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-900">{{ $label->name }}</h3>
                <p class="mt-4 text-gray-600 whitespace-pre-line">{{ $label->description ?? __('Нет описания') }}</p>
            </div>
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between pt-6 border-t border-gray-200">
                <div class="text-sm text-gray-500 mb-4 sm:mb-0">
                    <div>{{ __('Создано:') }} {{ $label->created_at->format('d.m.Y H:i') }}</div>
                    @if($label->created_at != $label->updated_at)
                    <div>{{ __('Обновлено:') }} {{ $label->updated_at->format('d.m.Y H:i') }}</div>
                    @endif
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('labels.edit', $label) }}" class="btn btn-secondary">
                        {{ __('Редактировать') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>