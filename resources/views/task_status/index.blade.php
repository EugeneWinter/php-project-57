@extends('layouts.app')

@section('content')
    <div class="grid col-span-full">
            <h1 class="mb-5 text-white"> {{ __('task_status.index.header') }}</h1>

        @can ('create', App\Models\TaskStatus::class)
                <div>
                    <a href="{{ route('task_statuses.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('task_status.index.create') }}
                    </a>
                </div>
            @endcan

            <table class="mt-4">
                <thead class="border-b-2 border-solid border-white text-left text-white">
                <tr>
                    <th>{{ __('task_status.index.id') }}</th>
                    <th>{{ __('task_status.index.name') }}</th>
                    <th>{{ __('task_status.index.created_at') }}</th>
                    @auth
                        <th>{{ __('task_status.index.actions') }}</th>
                    @endauth
                </tr>
                </thead>
                <tbody class="text-white">
                @foreach ($taskStatuses as $status)
                    <tr class="border-b border-dashed text-left">
                        <td>{{ $status->id }}</td>
                        <td>{{ $status->name }}</td>
                        <td>{{ $status->created_at->format('d.m.Y') }}</td>
                            <td>
                                @can('delete', $status)
                                <a href="{{ route('task_statuses.destroy', $status->id) }}"
                                   data-confirm="{{ __('task_status.index.delete_confirm') }}"
                                   data-method="DELETE"
                                   class="text-red-600 hover:text-red-900">
                                    {{ __('task_status.index.delete') }}
                                </a>
                                @endcan
                                @can('update', $status)
                                <a href="{{ route('task_statuses.edit', $status->id) }}" class="text-blue-600 hover:text-blue-900">
                                    {{ __('task_status.index.edit') }}
                                </a>
                                @endcan
                            </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $taskStatuses->links() }}
            </div>
        </div>
@endsection
