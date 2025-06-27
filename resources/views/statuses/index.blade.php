<x-app-layout>
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6 flex justify-between items-center border-b border-gray-200">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{ __('Статусы задач') }}
            </h3>
            <a href="{{ route('task_statuses.create') }}" class="btn btn-primary">
                {{ __('Создать статус') }}
            </a>
        </div>

        @if($taskStatuses->isEmpty())
        <div class="p-6 text-center">
            <h3 class="mt-2 text-sm font-medium text-gray-900">{{ __('Нет статусов') }}</h3>
            <p class="mt-1 text-sm text-gray-500">{{ __('Начните с создания нового статуса.') }}</p>
            <div class="mt-6">
                <a href="{{ route('task_statuses.create') }}" class="btn btn-primary">
                    {{ __('Создать статус') }}
                </a>
            </div>
        </div>
        @else
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('ID') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('Название') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('Дата создания') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('Действия') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($taskStatuses as $status)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $status->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $status->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $status->created_at->format('d.m.Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="{{ route('task_statuses.edit', $status) }}" class="text-blue-600 hover:text-blue-900">
                                    {{ __('Изменить') }}
                                </a>
                                <form action="{{ route('task_statuses.destroy', $status) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('{{ __('Вы уверены?') }}')">
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
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $taskStatuses->links() }}
        </div>
        @endif
    </div>
</x-app-layout>