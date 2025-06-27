<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ __('Метки') }}
            </h2>
            <a href="{{ route('labels.create') }}" class="btn btn-primary">
                {{ __('Добавить метку') }}
            </a>
        </div>
    </x-slot>

    <div class="card elevation-2">
        @if($labels->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('ID') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Название') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Описание') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Дата создания') }}</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Действия') }}</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($labels as $label)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $label->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $label->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $label->description ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $label->created_at->format('d.m.Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-4">
                                    <a href="{{ route('labels.edit', $label) }}" class="text-primary-600 hover:text-primary-900">
                                        {{ __('Изменить') }}
                                    </a>
                                    <form action="{{ route('labels.destroy', $label) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900"
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
            
            @if($labels instanceof \Illuminate\Pagination\AbstractPaginator && $labels->hasPages())
            <div class="px-6 py-4 border-t bg-gray-50">
                {{ $labels->links() }}
            </div>
            @endif
            
        @else
            <div class="text-center py-12">
                <h3 class="mt-4 text-lg font-medium text-gray-900">{{ __('Метки не найдены') }}</h3>
                <p class="mt-2 text-sm text-gray-500">{{ __('Начните с создания новой метки.') }}</p>
                <div class="mt-6">
                    <a href="{{ route('labels.create') }}" class="btn btn-primary">
                        {{ __('Создать первую метку') }}
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>