<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="grid col-span-full">

                <x-notification></x-notification>

                <h1 class="mb-5">@lang('app.pages.tasks')</h1>

                <div class="w-full flex items-center">
                    <div>
                        <form method="GET" action="{{ route('tasks.index') }}">
                            <div class="flex">
                                <select class="rounded border-gray-300" name="filter[status_id]" id="filter[status_id]">
                                    <option value="" selected="selected">@lang('app.pages.status')</option>
                                    @foreach($statuses as $id => $name)
                                        <option value="{{ $id }}" {{ request('filter.status_id') == $id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                                <select class="rounded border-gray-300 ml-2" name="filter[created_by_id]" id="filter[created_by_id]">
                                    <option value="" selected="selected">@lang('app.pages.author')</option>
                                    @foreach($users as $id => $name)
                                        <option value="{{ $id }}" {{ request('filter.created_by_id') == $id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                                <select class="rounded border-gray-300 ml-2" name="filter[assigned_to_id]" id="filter[assigned_to_id]">
                                    <option value="" selected="selected">@lang('app.pages.executor')</option>
                                    @foreach($users as $id => $name)
                                        <option value="{{ $id }}" {{ request('filter.assigned_to_id') == $id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button class="blue-button ml-2" type="submit">
                                    @lang('app.pages.apply')
                                </button>
                                @if(request()->hasAny('filter.status_id', 'filter.created_by_id', 'filter.assigned_to_id'))
                                    <a href="{{ route('tasks.index') }}" class="ml-2 text-gray-600 hover:text-gray-900">
                                        @lang('app.pages.reset')
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>

                    @can('create', $taskModel)
                        <div class="ml-auto">
                            <a href="{{ route('tasks.create') }}" class="blue-button">
                                @lang('app.pages.createTask')
                            </a>
                        </div>
                    @endcan
                </div>

                <table class="mt-4">
                    <thead class="border-b-2 border-solid border-black text-left">
                        <tr>
                            <th>ID</th>
                            <th>@lang('app.pages.status')</th>
                            <th>@lang('app.pages.name')</th>
                            <th>@lang('app.pages.author')</th>
                            <th>@lang('app.pages.executor')</th>
                            <th>@lang('app.pages.createdDate')</th>
                            @canany(['update', 'delete'], $taskModel)
                                <th>@lang('app.pages.actions')</th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr class="border-b border-dashed text-left">
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->status->name }}</td>
                                <td>
                                    <a class="text-blue-600 hover:text-blue-900"
                                        href="{{ route('tasks.show', $task) }}">
                                        {{ $task->name }}
                                    </a>
                                </td>
                                <td>{{ $task->createdBy->name }}</td>
                                <td>
                                    {{ $task->assigned_to_id ? $task->assignedTo->name : __('app.pages.executorNotSpecified') }}
                                </td>
                                <td>{{ $task->created_at->format('d.m.Y') }}</td>
                                <td>
                                    @can('delete', $task)
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('@lang('app.pages.confirm')')">
                                                @lang('app.pages.delete')
                                            </button>
                                        </form>
                                    @endcan
                                    @can('update', $task)
                                        <a href="{{ route('tasks.edit', $task) }}"
                                            class="text-blue-600 hover:text-blue-900 ml-2">
                                            @lang('app.pages.edit')
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
        </div>
    </section>
</x-app-layout>