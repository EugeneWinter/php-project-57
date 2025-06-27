<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'btn btn-primary elevation-1'
]) }}>
    <span class="btn-content">{{ $slot }}</span>
</button>