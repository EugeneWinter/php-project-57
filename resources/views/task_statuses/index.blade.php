<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ __('Статусы задач') }}
            </h2>
            <a href="{{ route('task_statuses.create') }}" class="btn btn-primary">
                {{ __('Добавить статус') }}
            </a>
        </div>
    </x-slot>

    <div class="card">
        @if($statuses->count() > 0)
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Название') }}</th>
                            <th>{{ __('Дата создания') }}</th>
                            <th>{{ __('Действия') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($statuses as $status)
                        <tr>
                            <td>{{ $status->id }}</td>
                            <td>{{ $status->name }}</td>
                            <td>{{ $status->created_at->format('d.m.Y') }}</td>
                            <td>
                                <div class="flex space-x-2">
                                    <a href="{{ route('task_statuses.edit', $status) }}" class="btn btn-secondary">
                                        {{ __('Изменить') }}
                                    </a>
                                    <form action="{{ route('task_statuses.destroy', $status) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" 
                                                onclick="return confirm('{{ __('Вы уверены?') }}')">
                                            {{ __('Удалить') }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t">
                {{ $statuses->links() }}
            </div>
        @else
            <div class="text-center py-8">
                <p class="text-gray-500 mb-4">{{ __('Статусы не найдены') }}</p>
                <a href="{{ route('task_statuses.create') }}" class="btn btn-primary">
                    {{ __('Создать первый статус') }}
                </a>
            </div>
        @endif
    </div>
</x-app-layout>