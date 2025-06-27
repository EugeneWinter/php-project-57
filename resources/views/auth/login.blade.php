<x-guest-layout>


<name></name>
    <div class="auth-card">
        <h2 class="auth-title">{{ __('Вход в систему') }}</h2>
        <p class="auth-description">
            {{ __('Введите ваши учетные данные для входа') }}
        </p>

        <x-auth-session-status :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf

            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <div class="form-group">
                <x-input-label for="password" :value="__('Пароль')" />
                <input type="password" name="password" id="password" required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" />
            </div>

            <div class="form-options">
                <label class="remember-me">
                    <input type="checkbox" name="remember">
                    <span>{{ __('Запомнить меня') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-password">
                        {{ __('Забыли пароль?') }}
                    </a>
                @endif
            </div>

            <div class="form-footer">
                <x-primary-button>
                    {{ __('Войти') }}
                </x-primary-button>
            </div>
        </form>

        <div class="auth-links">
            <span>{{ __('Нет аккаунта?') }}</span>
            <a href="{{ route('register') }}">{{ __('Зарегистрироваться') }}</a>
        </div>
    </div>
</x-guest-layout>