@props(['active' => false])

@php
$classes = $active
    ? 'block w-full px-4 py-2 text-left text-sm bg-primary-50 text-primary-700 transition'
    : 'block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>