@if (session()->has('success') || session()->has('error'))
<div class="notification fixed top-4 right-4 p-4 rounded shadow-lg 
            {{ session('success') ? 'bg-green-500' : 'bg-red-500' }} text-white">
    {{ session('success') ?? session('error') }}
</div>
@endif