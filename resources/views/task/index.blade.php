@extends('layouts.app')

@section('content')
    <div class="grid col-span-full">
        <h1 class="mb-5 text-white">
            {{ __('task.index.header') }}
        </h1>

        <div class="w-full flex items-center">
            <div>
                <form action="{{ route('tasks.index') }}" method="GET">
                    <div class="flex">
                        <div>
                            <select name="filter[status_id]" class="rounded border-gray-300">
                                <option value="">{{ __('task.index.status_id') }}</option>
                                @foreach($taskStatusesById as $id => $name)
                                    <option value="{{ $id }}" {{ Arr::get($filter, 'status_id') == $id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <select name="filter[created_by_id]" class="ml-2 rounded border-gray-300">
                                <option value="">{{ __('task.index.created_by') }}</option>
                                @foreach($usersById as $id => $name)
                                    <option value="{{ $id }}" {{ Arr::get($filter, 'created_by_id') == $id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <select name="filter[assigned_to_id]" class="ml-2 rounded border-gray-300">
                                <option value="">{{ __('task.index.assigned_to') }}</option>
                                @foreach($usersById as $id => $name)
                                    <option value="{{ $id }}" {{ Arr::get($filter, 'assigned_to_id') == $id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                                {{ __('task.index.apply') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            @can ('create', App\Models\Task::class)
                <div class="ml-auto">
                    <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                        {{ __('task.index.create') }}
                    </a>
                </div>
            @endcan
        </div>

        <table class="mt-4">
            <thead class="border-b-2 border-solid border-white text-left text-white">
            <tr>
                <th>{{ __('task.index.id') }}</th>
                <th>{{ __('task.index.status_id') }}</th>
                <th>{{ __('task.index.name') }}</th>
                <th>{{ __('task.index.created_by') }}</th>
                <th>{{ __('task.index.assigned_to') }}</th>
                <th>{{ __('task.index.created_at') }}</th>
                @auth
                    <th>{{ __('task.index.actions') }}</th>
                @endauth
            </tr>
            </thead>
            <tbody>
            @foreach ($tasks as $task)
                <tr class="border-b border-dashed text-left">
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->status->name }}</td>
                    <td>
                        <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-600 hover:text-blue-900">
                            {{ $task->name }}
                        </a>
                    </td>
                    <td>{{ $task->createdBy->name }}</td>
                    <td>{{ $task->assignedTo->name ?? '' }}</td>
                    <td>{{ $task->created_at->format('d.m.Y') }}</td>
                        <td>
                            @can('delete', $task)
                                <a href="{{ route('tasks.destroy', $task->id) }}"
                                   data-confirm="{{ __('task.index.delete_confirm') }}"
                                   data-method="DELETE"
                                   class="text-red-600 hover:text-red-900">
                                    {{ __('task.index.delete') }}
                                </a>
                            @endcan
                            @can('update', $task)
                            <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-600 hover:text-blue-900">
                                {{ __('task.index.edit') }}
                            </a>
                            @endcan
                        </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $tasks->links() }}
        </div>
    </div>
@endsection
