<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center animate-fade-in">
            <div>
                <h2 class="text-3xl font-bold bg-gradient-to-r from-primary-600 to-primary-800 bg-clip-text text-transparent">
                    <i class="fas fa-tasks mr-3 text-primary-600"></i>{{ __('Задачи') }}
                </h2>
                <p class="text-gray-600 mt-1">{{ __('Управление всеми задачами проекта') }}</p>
            </div>
            <div class="btn-content">
                <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-elevated hover-lift">
                    <span class="btn-content">
                        <i class="fas fa-plus mr-2"></i>{{ __('Создать задачу') }}
                    </span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="card animate-slide-up hover-lift">
        @if($tasks->count() > 0)
            <div class="card-header bg-gradient-subtle">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-800">
                        <i class="fas fa-list mr-2 text-primary-600"></i>{{ __('Список задач') }}
                    </h3>
                    <span class="badge badge-info">
                        {{ $tasks->total() }} {{ __('задач') }}
                    </span>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table>
                    <thead class="table-header">
                        <tr>
                            <th class="text-center">
                                <i class="fas fa-hashtag mr-1"></i>{{ __('ID') }}
                            </th>
                            <th>
                                <i class="fas fa-file-alt mr-1"></i>{{ __('Название') }}
                            </th>
                            <th class="text-center">
                                <i class="fas fa-flag mr-1"></i>{{ __('Статус') }}
                            </th>
                            <th>
                                <i class="fas fa-user mr-1"></i>{{ __('Автор') }}
                            </th>
                            <th>
                                <i class="fas fa-user-check mr-1"></i>{{ __('Исполнитель') }}
                            </th>
                            <th class="text-center">
                                <i class="fas fa-calendar mr-1"></i>{{ __('Дата создания') }}
                            </th>
                            <th class="text-center">
                                <i class="fas fa-cogs mr-1"></i>{{ __('Действия') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr class="table-row hover-highlight animate-fade-in-delay-{{ $loop->index % 5 }}">
                            <td class="text-center font-mono text-sm">
                                <span class="badge badge-light">#{{ $task->id }}</span>
                            </td>
                            <td>
                                <a href="{{ route('tasks.show', $task) }}" class="task-link font-medium hover-scale">
                                    <i class="fas fa-external-link-alt mr-2 opacity-50"></i>
                                    {{ Str::limit($task->name, 40) }}
                                </a>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-status badge-{{ strtolower(str_replace(' ', '-', $task->status->name)) }} pulse-animation">
                                    <i class="fas fa-circle mr-1"></i>
                                    {{ $task->status->name }}
                                </span>
                            </td>
                            <td>
                                <div class="flex items-center">
                                    <div class="avatar-sm">
                                        <i class="fas fa-user-circle text-primary-400"></i>
                                    </div>
                                    <span class="ml-2 text-gray-700">{{ $task->createdBy->name }}</span>
                                </div>
                            </td>
                            <td>
                                @if($task->assignedTo)
                                    <div class="flex items-center">
                                        <div class="avatar-sm">
                                            <i class="fas fa-user-check text-success-500"></i>
                                        </div>
                                        <span class="ml-2 text-gray-700">{{ $task->assignedTo->name }}</span>
                                    </div>
                                @else
                                    <span class="text-gray-400 italic">
                                        <i class="fas fa-user-slash mr-1"></i>{{ __('Не назначено') }}
                                    </span>
                                @endif
                            </td>
                            <td class="text-center text-sm text-gray-600">
                                <i class="fas fa-clock mr-1 text-gray-400"></i>
                                {{ $task->created_at->format('d.m.Y') }}
                            </td>
                            <td>
                                <div class="flex space-x-2 justify-center">
                                    <div class="btn-content">
                                        <a href="{{ route('tasks.edit', $task) }}" 
                                           class="btn btn-secondary btn-sm hover-lift" 
                                           title="{{ __('Редактировать задачу') }}">
                                            <span class="btn-content">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                    </div>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-content">
                                            <button type="submit" 
                                                    class="btn btn-danger btn-sm hover-shake" 
                                                    title="{{ __('Удалить задачу') }}"
                                                    onclick="return confirm('{{ __('Вы уверены что хотите удалить эту задачу?') }}')">
                                                <span class="btn-content">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @if($tasks->hasPages())
            <div class="card-footer bg-gradient-subtle">
                <div class="flex justify-center">
                    {{ $tasks->links() }}
                </div>
            </div>
            @endif
        @else
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="fas fa-tasks text-6xl text-gray-300"></i>
                </div>
                <h3 class="empty-state-title">{{ __('Пока нет задач') }}</h3>
                <p class="empty-state-text">{{ __('Создайте первую задачу для начала работы с проектом') }}</p>
                <div class="btn-content mt-6">
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-elevated hover-lift">
                        <span class="btn-content">
                            <i class="fas fa-plus mr-2"></i>{{ __('Создать первую задачу') }}
                        </span>
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
