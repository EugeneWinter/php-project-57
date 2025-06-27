<x-app-layout>
    <div class="container mx-auto px-4 py-8 animate-fade-in">
        <div class="card max-w-2xl mx-auto">
            <div class="card-header">
                <h1 class="card-title">
                    {{ __('Редактирование статуса') }}
                </h1>
                <p class="text-sm text-gray-600 mt-1">Обновите информацию о статусе</p>
            </div>
            
            <div class="card-body">
                <form action="{{ route('task_statuses.update', $status) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <x-input-label for="name" :value="__('Название статуса')" />
                        <x-text-input 
                            id="name" 
                            name="name" 
                            type="text" 
                            :value="old('name', $status->name)" 
                            required 
                            placeholder="Укажите название статуса"
                        />
                        <x-input-error :messages="$errors->get('name')" />
                    </div>
                    
                    <div class="flex justify-end space-x-3 pt-6">
                        <x-secondary-button 
                            tag="a" 
                            href="{{ route('task_statuses.index') }}"
                            class="flex items-center"
                        >
                            {{ __('Отмена') }}
                        </x-secondary-button>
                        
                        <x-primary-button type="submit" class="flex items-center">
                            {{ __('Обновить') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
