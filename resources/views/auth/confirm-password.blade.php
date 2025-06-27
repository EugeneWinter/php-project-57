<x-guest-layout>
    <div class="auth-card">
        <h2 class="auth-title">{{ __('Подтверждение пароля') }}</h2>
        <p class="auth-description">
            {{ __('Это защищенная зона приложения. Пожалуйста, подтвердите ваш пароль перед продолжением.') }}
        </p>

        <form method="POST" action="{{ route('password.confirm') }}" class="auth-form">
            @csrf

            <div class="form-group">
                <x-input-label for="password" :value="__('Пароль')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" />
            </div>

            <div class="form-footer">
                <x-primary-button>
                    {{ __('Подтвердить') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>