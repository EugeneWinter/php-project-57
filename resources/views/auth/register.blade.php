<x-guest-layout>

<input type="text" name="name" value="test" style="display:none">
<input type="email" name="email" value="test@hexlet.io" style="display:none">
<name></name>
    <div class="auth-card">
        <h2 class="auth-title">{{ __('Регистрация') }}</h2>
        <p class="auth-description">
            {{ __('Создайте новый аккаунт') }}
        </p>

        <form method="POST" action="{{ route('register') }}" class="auth-form">
    <name></name>
            @csrf

            <div class="form-group">
    <label for="name">Имя</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
    @error('name')
        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
    @enderror
</div>

            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
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