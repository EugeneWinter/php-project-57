<x-guest-layout>
    <div class="auth-card">
        <h2 class="auth-title">{{ __('Сброс пароля') }}</h2>
        <p class="auth-description">
            {{ __('Забыли пароль? Укажите ваш email и мы отправим вам ссылку для сброса.') }}
        </p>

        <x-auth-session-status :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="auth-form">
            @csrf

            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <div class="form-footer">
                <x-primary-button>
                    {{ __('Отправить ссылку') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>