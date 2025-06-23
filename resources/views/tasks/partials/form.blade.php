<div class="space-y-4">
    <div>
        <label for="name" class="block font-medium text-sm text-gray-700">
            @lang('app.pages.name') <span class="text-red-600">*</span>
        </label>
        <input type="text" name="name" id="name" value="{{ old('name', $task->name) }}"
               class="form-field w-full @error('name') border-red-600 @enderror" required>
        @error('name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description" class="block font-medium text-sm text-gray-700">
            @lang('app.pages.description')
        </label>
        <textarea name="description" id="description" rows="4"
                  class="form-field w-full">{{ old('description', $task->description) }}</textarea>
    </div>

    <div>
        <label for="status_id" class="block font-medium text-sm text-gray-700">
            @lang('app.pages.status') <span class="text-red-600">*</span>
        </label>
        <select name="status_id" id="status_id" class="form-field w-full @error('status_id') border-red-600 @enderror" required>
            <option value="">@lang('app.pages.selectStatus')</option>
            @foreach($statuses as $id => $name)
                <option value="{{ $id }}" {{ old('status_id', $task->status_id) == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        @error('status_id')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="assigned_to_id" class="block font-medium text-sm text-gray-700">
            @lang('app.pages.executor')
        </label>
        <select name="assigned_to_id" id="assigned_to_id" class="form-field w-full">
            <option value="">@lang('app.pages.selectExecutor')</option>
            @foreach($users as $id => $name)
                <option value="{{ $id }}" {{ old('assigned_to_id', $task->assigned_to_id) == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mt-4">
        <button type="submit" class="blue-button">
            {{ $buttonText ?? __('app.pages.save') }}
        </button>
    </div>
</div>