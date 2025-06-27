@props(['active' => false])

@php
$classes = $active
    ? 'inline-flex items-center px-4 h-full border-b-2 border-primary-500 text-primary-600 font-medium transition'
    : 'inline-flex items-center px-4 h-full border-b-2 border-transparent hover:border-primary-300 text-gray-600 hover:text-primary-500 font-medium transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>