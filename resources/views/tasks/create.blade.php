<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center animate-slide-in-top">
            <h2 class="text-3xl font-bold gradient-text-blue flex items-center gap-3">
                <i class="fas fa-plus-circle text-blue-600"></i>
                {{ __('Создание задачи') }}
            </h2>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary elevation-2 hover-lift">
                <i class="fas fa-arrow-left mr-2"></i>
                {{ __('Назад') }}
            </a>
        </div>
    </x-slot>

    <div class="card elevation-3 animate-fade-in">
        <div class="card-header bg-gradient-blue text-white">
            <div class="flex items-center gap-3">
                <i class="fas fa-tasks text-xl"></i>
                <h3 class="text-lg font-semibold mb-0">{{ __('Форма создания задачи') }}</h3>
            </div>
        </div>
        <div class="card-body p-8">
            <form action="{{ route('tasks.store') }}" method="POST" class="form-modern">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Название задачи -->
                    <div class="form-group animate-slide-in-left" style="animation-delay: 0.1s">
                        <x-input-label for="name" :value="__('Название задачи')" required class="form-label-modern" />
                        <div class="input-wrapper">
                            <i class="fas fa-tag input-icon"></i>
                            <x-text-input id="name" name="name" required class="form-input-modern" placeholder="Введите название задачи" />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="error-message" />
                    </div>
                    
                    <!-- Статус -->
                    <div class="form-group animate-slide-in-right" style="animation-delay: 0.2s">
                        <x-input-label for="status_id" :value="__('Статус')" required class="form-label-modern" />
                        <div class="select-wrapper">
                            <i class="fas fa-flag select-icon"></i>
                            <select id="status_id" name="status_id" class="form-select-modern" required>
                                <option value="" disabled selected>{{ __('Выберите статус') }}</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-input-error :messages="$errors->get('status_id')" class="error-message" />
                    </div>
                    
                    <!-- Автор -->
                    <div class="form-group animate-slide-in-left" style="animation-delay: 0.3s">
                        <x-input-label for="created_by_id" :value="__('Автор')" required class="form-label-modern" />
                        <div class="select-wrapper">
                            <i class="fas fa-user-edit select-icon"></i>
                            <select id="created_by_id" name="created_by_id" class="form-select-modern" required>
                                <option value="" disabled selected>{{ __('Выберите автора') }}</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-input-error :messages="$errors->get('created_by_id')" class="error-message" />
                    </div>
                    
                    <!-- Исполнитель -->
                    <div class="form-group animate-slide-in-right" style="animation-delay: 0.4s">
                        <x-input-label for="assigned_to_id" :value="__('Исполнитель')" class="form-label-modern" />
                        <div class="select-wrapper">
                            <i class="fas fa-user-check select-icon"></i>
                            <select id="assigned_to_id" name="assigned_to_id" class="form-select-modern">
                                <option value="">{{ __('Не назначено') }}</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-input-error :messages="$errors->get('assigned_to_id')" class="error-message" />
                    </div>
                    
                    <!-- Описание -->
                    <div class="form-group md:col-span-2 animate-fade-in" style="animation-delay: 0.5s">
                        <x-input-label for="description" :value="__('Описание')" class="form-label-modern" />
                        <div class="textarea-wrapper">
                            <i class="fas fa-align-left textarea-icon"></i>
                            <textarea id="description" name="description" rows="5" class="form-textarea-modern" placeholder="Подробное описание задачи (необязательно)"></textarea>
                        </div>
                        <x-input-error :messages="$errors->get('description')" class="error-message" />
                    </div>
                </div>
                
                <!-- Кнопки действий -->
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-8 pt-6 border-t border-gray-200 animate-fade-in" style="animation-delay: 0.6s">
                    <div class="flex gap-3">
                        <button type="reset" class="btn btn-secondary elevation-2 hover-lift">
                            <i class="fas fa-eraser mr-2"></i>
                            {{ __('Очистить') }}
                        </button>
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary hover-lift">
                            <i class="fas fa-times mr-2"></i>
                            {{ __('Отмена') }}
                        </a>
                        <button type="submit" class="btn btn-primary elevation-2 hover-lift pulse-on-hover">
                            <i class="fas fa-save mr-2"></i>
                            {{ __('Создать задачу') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Подсказка -->
    <div class="card elevation-2 mt-6 animate-slide-in-bottom bg-gradient-light">
        <div class="card-body p-4">
            <div class="flex items-start gap-3 text-blue-700">
                <i class="fas fa-lightbulb text-xl mt-1"></i>
                <div>
                    <h4 class="font-semibold mb-2">{{ __('Подсказка') }}</h4>
                    <p class="text-sm opacity-90">
                        {{ __('Заполните обязательные поля отмеченные звездочкой. Исполнителя можно назначить позже при редактировании задачи.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
