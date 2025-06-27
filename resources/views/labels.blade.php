<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="text-h1 text-white">
                <span class="text-primary-100">Управление</span>
                <span class="text-white"> метками</span>
            </div>
            <a href="{{ route('labels.create') }}" class="btn btn-primary">
                Добавить метку
            </a>
        </div>
    </x-slot>

    <div class="py-8 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="card elevation-2">
                <div class="card-header">
                    <div class="text-h2 text-white">Список меток</div>
                    <div class="relative">
                        <input type="text" placeholder="Поиск меток..." class="form-control bg-white/90">
                    </div>
                </div>

                <div class="card-body">
                    @if ($labels->count() > 0)
                        <div class="table-container elevation-1">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Имя</th>
                                        <th>Описание</th>
                                        <th>Дата создания</th>
                                        <th class="text-center">Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($labels as $label)
                                        <tr>
                                            <td class="font-mono text-primary-600">#{{ $label->id }}</td>
                                            <td>
                                                <div class="flex items-center gap-2">
                                                    <span class="w-3 h-3 rounded-full bg-primary-400"></span>
                                                    <span class="text-body-1">{{ $label->name }}</span>
                                                </div>
                                            </td>
                                            <td class="text-body-2 text-primary-600">{{ $label->description }}</td>
                                            <td>
                                                <div class="text-body-2 text-primary-600">
                                                    {{ $label->created_at->format('d.m.Y') }}
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="flex gap-2 justify-center">
                                                    <a href="{{ route('labels.edit', $label->id) }}" class="btn btn-sm btn-secondary">
                                                        Редактировать
                                                    </a>
                                                    <form action="{{ route('labels.destroy', $label->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены?')">
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
                        
                        <div class="mt-8 flex justify-between items-center">
                            <div class="text-body-2 text-primary-600">
                                Показано {{ $labels->count() }} из {{ $labels->total() }} меток
                            </div>
                            <div class="flex gap-2">
                                <button class="btn btn-sm btn-secondary">
                                    Назад
                                </button>
                                <button class="btn btn-sm btn-secondary">
                                    Вперед
                                </button>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-12">
                            <h3 class="text-xl font-medium text-gray-900 mt-4 mb-2">Метки не найдены</h3>
                            <p class="text-gray-500 mb-6">Создайте свою первую метку для организации задач</p>
                            <a href="{{ route('labels.create') }}" class="btn btn-primary">
                                Создать метку
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>