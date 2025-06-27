@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl'
])

@php
$maxWidth = [
    'sm' => 'sm:max-w-sm',
    'md' => 'sm:max-w-md',
    'lg' => 'sm:max-w-lg',
    'xl' => 'sm:max-w-xl',
    '2xl' => 'sm:max-w-2xl',
][$maxWidth];
@endphp

<div class="modal" data-modal="{{ $name }}" style="display: {{ $show ? 'block' : 'none' }};">
    <div class="modal-overlay"></div>

    <div class="modal-content {{ $maxWidth }}">
        {{ $slot }}
    </div>
</div>