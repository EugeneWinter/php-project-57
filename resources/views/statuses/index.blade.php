<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="grid col-span-full">

                <x-notification></x-notification>

                <h1 class="mb-5">@lang('app.pages.statuses')</h1>

                @can('create', $taskStatusModel)
                    <div>
                        <a href="{{ route('task_statuses.create') }}" class="blue-button">
                            @lang('app.pages.createStatus')
                        </a>
                    </div>
                @endcan

                <table class="mt-4">
                    <thead class="border-b-2 border-solid border-black text-left">
                        <tr>
                            <th>ID</th>
                            <th>@lang('app.pages.name')</th>
                            <th>@lang('app.pages.createdDate')</th>
                            @can('create', $taskStatusModel)
                                <th>@lang('app.pages.actions')</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taskStatuses as $taskStatus)
                            <tr class="border-b border-dashed text-left">
                                <td>{{ $taskStatus->id }}</td>
                                <td>{{ $taskStatus->name }}</td>
                                <td>{{ $taskStatus->created_at->format('d.m.Y') }}</td>
                                @canany(['delete', 'update'], $taskStatus)
                                    <td>
                                        <form action="{{ route('task_statuses.destroy', $taskStatus) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-900"
                                                    onclick="return confirm('@lang('app.pages.confirm')')">
                                                @lang('app.pages.delete')
                                            </button>
                                        </form>
                                        <a class="text-blue-600 hover:text-blue-900 ml-2"
                                            href="{{ route('task_statuses.edit', $taskStatus) }}">
                                            @lang('app.pages.edit')
                                        </a>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-app-layout>