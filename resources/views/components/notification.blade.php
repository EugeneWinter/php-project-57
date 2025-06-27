@if (session()->has('success') || session()->has('error'))
<div class="notification {{ session('success') ? 'success' : 'error' }}">
    {{ session('success') ?? session('error') }}
</div>
@endif