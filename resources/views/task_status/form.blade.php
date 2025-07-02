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
        <input type="text" name="name" id="name" class="rounded border-gray-300 w-1/3 text-gray-800 bg-white" value="{{ old('name', $taskStatus->name ?? '') }}">
    </div>
    <x-error-message name="name" />

    <x-submit-button>
        {{ $buttonText ?? __($prefix . '.button') }}
    </x-submit-button>
</div>