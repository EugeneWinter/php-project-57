<x-app-layout>
    <x-slot name="header">
        {{ __('Управление статусами задач') }}
    </x-slot>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Список статусов</h2>
                <a href="{{ route('task_statuses.create') }}" class="blue-button">
                    {{ __('Добавить статус') }}
                </a>
            </div>

            <div class="card-body">
                @if ($statuses->count() > 0)
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Дата создания</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($statuses as $status)
                                <tr>
                                    <td>{{ $status->id }}</td>
                                    <td>{{ $status->name }}</td>
                                    <td>{{ $status->created_at->format('d.m.Y') }}</td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ route('task_statuses.edit', $status) }}" 
                                               class="blue-button">
                                                Редактировать
                                            </a>
                                            <form action="{{ route('task_statuses.destroy', $status) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="blue-button bg-red-600 hover:bg-red-700">
                                                    Удалить
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <div class="mt-4">
                        {{ $statuses->links() }}
                    </div>
                @else
                    <div class="text-center py-8">
                        <p class="text-gray-500">Статусы задач не найдены</p>
                        <a href="{{ route('task_statuses.create') }}" class="blue-button mt-4">
                            Создать первый статус
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>