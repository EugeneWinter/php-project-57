<x-app-layout>
    <x-slot name="header">
        {{ __('Управление метками') }}
    </x-slot>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Список меток</h2>
                <a href="{{ route('labels.create') }}" class="blue-button">
                    {{ __('Добавить метку') }}
                </a>
            </div>

            <div class="card-body">
                @if ($labels->count() > 0)
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Описание</th>
                                <th>Дата создания</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($labels as $label)
                                <tr>
                                    <td>{{ $label->id }}</td>
                                    <td>{{ $label->name }}</td>
                                    <td>{{ $label->description }}</td>
                                    <td>{{ $label->created_at->format('d.m.Y') }}</td>
                                    <td>
                                        <div class="flex gap-2">
                                            <a href="{{ route('labels.edit', $label->id) }}" 
                                               class="blue-button">
                                                Редактировать
                                            </a>
                                            <form action="{{ route('labels.destroy', $label->id) }}" method="POST">
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
                @else
                    <div class="text-center py-8">
                        <p class="text-gray-500">Метки не найдены</p>
                        <a href="{{ route('labels.create') }}" class="blue-button mt-4">
                            Создать первую метку
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>