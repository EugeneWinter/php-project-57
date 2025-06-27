<x-guest-layout>
    <div class="auth-card">
        <h2 class="auth-title">{{ __('Регистрация') }}</h2>
        <p class="auth-description">
            {{ __('Создайте новый аккаунт') }}
        </p>

        <form method="POST" action="{{ route('register') }}" class="auth-form">
            @csrf

            <div class="form-group">
                <x-input-label for="name" :value="__('Имя')" />
                <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" />
            </div>

            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <div class="form-group">
                <x-input-label for="password" :value="__('Пароль')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" />
            </div>

            <div class="form-group">
                <x-input-label for="password_confirmation" :value="__('Подтверждение пароля')" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required />
                <x-input-error :messages="$errors->get('password_confirmation')" />
            </div>

            <div class="form-footer">
                <x-primary-button>
                    {{ __('Зарегистрироваться') }}
                </x-primary-button>
            </div>
        </form>

        <div class="auth-links">
            <span>{{ __('Уже есть аккаунт?') }}</span>
            <a href="{{ route('login') }}">{{ __('Войти') }}</a>
        </div>
    </div>
</x-guest-layout>