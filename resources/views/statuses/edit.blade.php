<x-app-layout>
    <x-slot name="header">
        {{ __('Редактирование задачи') }}
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Редактирование задачи</h2>
            <a href="{{ route('tasks.index') }}" class="btn btn-outline">
                Назад к списку
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="form-group">
                        <label class="form-label" for="name">Название задачи *</label>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="{{ old('name', $task->name) }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="status_id">Статус *</label>
                        <select class="form-control" id="status_id" name="status_id" required>
                            <option value="">Выберите статус</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}" 
                                    {{ $status->id == $task->status_id ? 'selected' : '' }}>
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="created_by_id">Автор *</label>
                        <select class="form-control" id="created_by_id" name="created_by_id" required>
                            <option value="">Выберите автора</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ $user->id == $task->created_by_id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="assigned_to_id">Исполнитель</label>
                        <select class="form-control" id="assigned_to_id" name="assigned_to_id">
                            <option value="">Не назначено</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ $user->id == optional($task->assignedTo)->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group md:col-span-2">
                        <label class="form-label" for="description">Описание</label>
                        <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $task->description) }}</textarea>
                    </div>
                </div>
                
                <div class="flex-between mt-6">
                    <button type="reset" class="btn btn-outline">Сбросить</button>
                    <button type="submit" class="btn btn-blue">Обновить задачу</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>