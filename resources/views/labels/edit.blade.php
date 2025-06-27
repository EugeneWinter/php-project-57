<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ __('Редактирование метки') }}
            </h2>
            <a href="{{ route('labels.index') }}" class="btn btn-secondary">
                {{ __('Назад') }}
            </a>
        </div>
    </x-slot>

    <div class="card elevation-4">
        <div class="card-body">
            <form method="POST" action="{{ route('labels.update', $label) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <x-input-label for="name" :value="__('Название')" />
                    <x-text-input id="name" type="text" name="name" 
                                value="{{ old('name', $label->name) }}" required 
                                class="w-full" placeholder="{{ __('Введите название метки') }}" />
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                <div class="form-group">
                    <x-input-label for="description" :value="__('Описание')" />
                    <textarea id="description" name="description" rows="3" 
                            class="form-control w-full" placeholder="{{ __('Введите описание метки') }}">{{ old('description', $label->description) }}</textarea>
                    <x-input-error :messages="$errors->get('description')" />
                </div>

                <div class="flex justify-end space-x-4">
                    <x-secondary-button type="button" onclick="window.history.back()">
                        {{ __('Отмена') }}
                    </x-secondary-button>
                    <x-primary-button>
                        {{ __('Обновить') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>