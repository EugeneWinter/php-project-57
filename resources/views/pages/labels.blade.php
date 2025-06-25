<x-app-layout>
    <x-slot name="header">
        {{ __('Управление метками') }}
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Список меток</h2>
            <a href="{{ route('labels.create') }}" class="btn btn-blue">
                {{ __('Добавить метку') }}
            </a>
        </div>

        <div class="card-body">
            @if ($labels->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($labels as $label)
                        <div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden transition-transform hover:scale-[1.02]">
                            <div class="p-4 border-b border-gray-200 bg-blue-50">
                                <h3 class="font-semibold text-lg text-blue-800">{{ $label->name }}</h3>
                            </div>
                            <div class="p-4">
                                @if($label->description)
                                    <p class="text-gray-600 mb-4">{{ $label->description }}</p>
                                @else
                                    <p class="text-gray-400 italic mb-4">Описание отсутствует</p>
                                @endif
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-500">
                                        Задач: {{ $label->tasks_count ?? 0 }}
                                    </span>
                                    <div class="flex gap-2">
                                        <a href="{{ route('labels.edit', $label->id) }}" 
                                           class="btn btn-outline btn-sm">
                                            Редактировать
                                        </a>
                                        <form action="{{ route('labels.destroy', $label->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Вы уверены, что хотите удалить эту метку?')">
                                                Удалить
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="mt-6 flex justify-center">
                    {{ $labels->links() }}
                </div>
            @else
                <div class="text-center py-8">
                    <div class="mb-4">
                        <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                    <p class="text-gray-500 text-lg mb-2">Метки не найдены</p>
                    <p class="text-gray-400 mb-6">Создайте свою первую метку для категоризации задач</p>
                    <a href="{{ route('labels.create') }}" class="btn btn-blue">
                        Создать метку
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>