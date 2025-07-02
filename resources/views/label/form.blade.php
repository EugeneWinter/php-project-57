@php
    $isEdit = isset($label) && $label->exists;
    $prefix = $isEdit ? 'label.edit' : 'label.create';
@endphp
@csrf
<div class="flex flex-col">
    <div>
        <label for="name" class="text-white">{{ __($prefix . '.name') }}</label>
    </div>
    <div class="mt-2">
        <input type="text" name="name" id="name" class="rounded border-gray-300 w-1/3 text-gray-800 bg-white" value="{{ old('name', $label->name ?? '') }}">
    </div>
    <x-error-message name="name" />

    <div class="mt-2">
        <label for="description" class="text-white">{{ __($prefix . '.description') }}</label>
    </div>
    <div class="mt-2">
        <textarea name="description" id="description" class="rounded border-gray-300 w-1/3 h-32 text-gray-800 bg-white" cols="50" rows="10">{{ old('description', $label->description ?? '') }}</textarea>
    </div>
    <x-error-message name="description" />

    <x-submit-button>
        {{ $buttonText ?? __($prefix . '.button') }}
    </x-submit-button>
</div>