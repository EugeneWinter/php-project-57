@php
    $isEdit = isset($taskStatus) && $taskStatus->exists;
    $prefix = $isEdit ? 'task_status.edit' : 'task_status.create';
@endphp
@csrf

<div class="flex flex-col">
    <div>
        <label for="name" class="text-white">{{ __($prefix . '.name') }}</label>
    </div>
    <div class="mt-2">
        <input type="text" name="name" id="name" class="rounded border-gray-300 w-1/3" value="{{ old('name', $taskStatus->name ?? '') }}">
    </div>
    <x-error-message name="name" />

    <div class="mt-2">
        <label for="description" class="text-white">{{ __($prefix . '.description') }}</label>
    </div>
    <div class="mt-2">
        <textarea name="description" id="description" class="rounded border-gray-300 w-1/3 h-32" cols="50" rows="5">{{ old('description', $taskStatus->description ?? '') }}</textarea>
    </div>
    <x-error-message name="description" />

    <x-submit-button>
        {{ $buttonText ?? __($prefix . '.button') }}
    </x-submit-button>
</div>
