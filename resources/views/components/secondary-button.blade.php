<button {{ $attributes->merge([
    'type' => 'button',
    'class' => 'btn btn-secondary elevation-1'
]) }}>
    <span class="btn-content">{{ $slot }}</span>
</button>