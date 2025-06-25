<x-app-layout>
    <x-slot name="header">
        {{ __('Управление задачами') }}
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Список задач</h2>
            <a href="{{ route('tasks.create') }}" class="btn btn-blue">
                {{ __('Создать задачу') }}
            </a>
        </div>

        <div class="card-body">
            @if ($tasks->count() > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Статус</th>
                                <th>Автор</th>
                                <th>Исполнитель</th>
                                <th>Дата создания</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->id }}</td>
                                    <td>
                                        <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-600 hover:underline">
                                            {{ $task->name }}
                                        </a>
                                    </td>
                                    <td>
                                        <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs">
                                            {{ $task->status->name }}
                                        </span>
                                    </td>
                                    <td>{{ $task->createdBy->name }}</td>
                                    <td>{{ $task->assignedTo->name ?? '-' }}</td>
                                    <td>{{ $task->created_at->format('d.m.Y') }}</td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ route('tasks.edit', $task->id) }}" 
                                               class="btn btn-outline btn-sm">
                                                Редактировать
                                            </a>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Удалить
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-6">
                    {{ $tasks->links() }}
                </div>
            @else
                <div class="text-center py-8">
                    <p class="text-gray-500">Задачи не найдены</p>
                    <a href="{{ route('tasks.create') }}" class="btn btn-blue mt-4">
                        Создать первую задачу
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>