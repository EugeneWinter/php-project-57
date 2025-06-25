@props(['type' => 'button'])

<button 
    {{ $attributes->merge([
        'type' => $type,
        'class' => 'blue-button'
    ]) }}>
    {{ $slot }}
</button>