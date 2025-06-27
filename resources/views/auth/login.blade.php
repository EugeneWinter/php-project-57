<x-guest-layout>
    <div class="auth-card">
        <h2 class="auth-title">Вход в систему</h2>
        <p class="auth-description">Введите ваши учетные данные для входа</p>
        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password" required autocomplete="current-password">
                @error('password')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-options">
                <label class="remember-me">
                    <input type="checkbox" name="remember">
                    <span>Запомнить меня</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-password">Забыли пароль?</a>
                @endif
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary">Войти</button>
            </div>
        </form>
        <div class="auth-links">
            <span>Нет аккаунта?</span>
            <a href="{{ route('register') }}">Зарегистрироваться</a>
        </div>
    </div>
</x-guest-layout>
