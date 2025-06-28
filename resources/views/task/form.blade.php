@php
    $isEdit = isset($task) && $task->exists;
    $prefix = $isEdit ? 'task.edit' : 'task.create';
@endphp
@csrf

<div class="flex flex-col">
    {{-- Name --}}
    <div>
        <label for="name">{{ __($prefix . '.name') }}</label>
    </div>
    <div class="mt-2">
        <input type="text" name="name" id="name" class="rounded border-gray-300 w-1/3" value="{{ old('name', $task->name ?? '') }}">
    </div>
    <x-error-message name="name" />

    {{-- Description --}}
    <div class="mt-2">
        <label for="description">{{ __($prefix . '.description') }}</label>
    </div>
    <div class="mt-2">
        <textarea name="description" id="description" class="rounded border-gray-300 w-1/3 h-32" cols="50" rows="10">{{ old('description', $task->description ?? '') }}</textarea>
    </div>
    <x-error-message name="description" />

    {{-- Status --}}
    <div class="mt-2">
        <label for="status_id">{{ __($prefix . '.status_id') }}</label>
    </div>
    <div class="mt-2">
        <select name="status_id" id="status_id" class="rounded border-gray-300 w-1/3">
            <option value="">----------</option>
            @foreach($taskStatuses as $id => $name)
                <option value="{{ $id }}" {{ old('status_id', $task->status_id ?? '') == $id ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
    </div>
    <x-error-message name="status_id" />

    {{-- Assigned To --}}
    <div class="mt-2">
        <label for="assigned_to_id">{{ __($prefix . '.assigned_to_id') }}</label>
    </div>
    <div class="mt-2">
        <select name="assigned_to_id" id="assigned_to_id" class="rounded border-gray-300 w-1/3">
            <option value="">----------</option>
            @foreach($users as $id => $name)
                <option value="{{ $id }}" {{ old('assigned_to_id', $task->assigned_to_id ?? '') == $id ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Labels --}}
    <div class="mt-2">
        <label for="labels">{{ __($prefix . '.labels') }}</label>
    </div>
    <div class="mt-2">
        <select name="labels[]" id="labels" class="rounded border-gray-300 w-1/3 h-32" multiple>
            @foreach($labels as $id => $name)
                <option value="{{ $id }}" {{ in_array($id, old('labels', isset($task) ? $task->labels->pluck('id')->toArray() : [])) ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Submit --}}
    <x-submit-button>
        {{ $buttonText ?? __($prefix . '.button') }}
    </x-submit-button>
</div>
