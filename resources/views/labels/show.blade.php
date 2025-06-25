<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Просмотр метки') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ $label->name }}</h3>
                        <p class="mt-1 text-sm text-gray-600">{{ $label->description ?? 'Нет описания' }}</p>
                    </div>
                    <div class="flex items-center">
                        <a href="{{ route('labels.index') }}" class="text-blue-600 hover:text-blue-900 mr-4">
                            Назад к списку
                        </a>
                        <span class="text-sm text-gray-500">
                            Создано: {{ $label->created_at->format('d.m.Y H:i') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>