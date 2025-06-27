<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Управление метками') }}
            </h2>
            <a href="{{ route('labels.create') }}" class="btn btn-primary">
                {{ __('Добавить метку') }}
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm rounded-xl">
            @if ($labels->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                    @foreach ($labels as $label)
                        <div class="bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-all duration-200">
                            <div class="p-5 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-blue-100">
                                <h3 class="font-semibold text-lg text-blue-800">
                                    {{ $label->name }}
                                </h3>
                            </div>
                            <div class="p-5">
                                <div class="min-h-[60px] mb-4">
                                    @if($label->description)
                                        <p class="text-gray-600">{{ $label->description }}</p>
                                    @else
                                        <p class="text-gray-400 italic">Описание отсутствует</p>
                                    @endif
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
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
                
                <div class="px-6 py-4 border-t border-gray-100">
                    {{ $labels->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Метки не найдены</h3>
                    <p class="text-gray-500 max-w-md mx-auto mb-6">Используйте метки для категоризации и организации ваших задач</p>
                    <a href="{{ route('labels.create') }}" class="btn btn-primary">
                        Создать первую метку
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>