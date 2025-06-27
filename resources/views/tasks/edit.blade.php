<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ __('Редактирование задачи') }}
            </h2>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                {{ __('Назад') }}
            </a>
        </div>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('tasks.update', $task) }}">
                @csrf
                @method('PATCH')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="form-group">
                        <x-input-label for="name" :value="__('Название')" required />
                        <x-text-input id="name" name="name" :value="old('name', $task->name)" required />
                        <x-input-error :messages="$errors->get('name')" />
                    </div>

                    <div class="form-group">
                        <x-input-label for="status_id" :value="__('Статус')" required />
                        <select id="status_id" name="status_id" class="form-control" required>
                            <option value="">{{ __('Выберите статус') }}</option>
                            @foreach($statuses as $id => $name)
                                <option value="{{ $id }}" {{ old('status_id', $task->status_id) == $id ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('status_id')" />
                    </div>

                    <div class="form-group">
                        <x-input-label for="assigned_to_id" :value="__('Исполнитель')" />
                        <select id="assigned_to_id" name="assigned_to_id" class="form-control">
                            <option value="">{{ __('Не назначено') }}</option>
                            @foreach($users as $id => $name)
                                <option value="{{ $id }}" {{ old('assigned_to_id', $task->assigned_to_id) == $id ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('assigned_to_id')" />
                    </div>

                    <div class="form-group">
                        <x-input-label for="labels" :value="__('Метки')" />
                        <select id="labels" name="labels[]" multiple class="form-control">
                            @foreach($labels as $id => $name)
                                <option value="{{ $id }}" {{ in_array($id, old('labels', $task->labels->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('labels')" />
                    </div>

                    <div class="form-group md:col-span-2">
                        <x-input-label for="description" :value="__('Описание')" />
                        <textarea id="description" name="description" rows="4" class="form-control">{{ old('description', $task->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" />
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <x-primary-button>
                        {{ __('Обновить') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>