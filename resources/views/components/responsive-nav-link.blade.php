@props(['active' => false])

@php
$classes = $active
    ? 'block px-4 py-2 text-sm bg-primary-50 text-primary-700 font-medium rounded'
    : 'block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700 font-medium rounded transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>