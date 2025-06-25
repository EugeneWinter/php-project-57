<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="grid col-span-full">
                <h1 class="mb-5">@lang('app.pages.updateTask')</h1>

                <form method="POST" action="{{ route('tasks.update', $task) }}" class="w-50">
                    @csrf
                    @method('PATCH')
                    <div class="flex flex-col">
                        <div>
                            <label for="name">@lang('app.pages.name')</label>
                        </div>
                        <div>
                            <input type="text" name="name" id="name" 
                                   value="{{ old('name', $task->name) }}"
                                   class="form-field @error('name') border-rose-600 @enderror">
                            @error('name')
                                <p class="text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="description">@lang('app.pages.description')</label>
                        </div>
                        <div>
                            <textarea name="description" id="description" 
                                      class="form-field h-32 @error('description') border-rose-600 @enderror">{{ old('description', $task->description) }}</textarea>
                            @error('description')
                                <p class="text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="status_id">@lang('app.pages.status')</label>
                        </div>
                        <div>
                            <select name="status_id" id="status_id" 
                                    class="form-field @error('status_id') border-rose-600 @enderror">
                                <option value=""></option>
                                @foreach($statuses as $id => $name)
                                    <option value="{{ $id }}" 
                                        {{ old('status_id', $task->status_id) == $id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status_id')
                                <p class="text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="assigned_to_id">@lang('app.pages.executor')</label>
                        </div>
                        <div>
                            <select name="assigned_to_id" id="assigned_to_id" 
                                    class="form-field @error('assigned_to_id') border-rose-600 @enderror">
                                <option value=""></option>
                                @foreach($users as $id => $name)
                                    <option value="{{ $id }}" 
                                        {{ old('assigned_to_id', $task->assigned_to_id) == $id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('assigned_to_id')
                                <p class="text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="labels">@lang('app.pages.labels')</label>
                        </div>
                        <div>
                            <select name="labels[]" id="labels" multiple 
                                    class="form-field h-32 @error('labels') border-rose-600 @enderror">
                            </select>
                            @error('labels')
                                <p class="text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <button type="submit" class="blue-button">
                                @lang('app.pages.update')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>