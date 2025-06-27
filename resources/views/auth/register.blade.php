<x-guest-layout>
    <div class="auth-card">
        <h2 class="auth-title">Регистрация</h2>
        <p class="auth-description">Создайте новый аккаунт</p>
        <form method="POST" action="{{ route('register') }}" class="auth-form">
            @csrf
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password" required autocomplete="new-password">
                @error('password')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Подтверждение пароля</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
                @error('password_confirmation')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-footer">
                <button type="submit" name="register-button" class="btn btn-primary">Зарегистрировать</button>
            </div>
        </form>
        <div class="auth-links">
            <span>Уже есть аккаунт?</span>
            <a href="{{ route('login') }}">Войти</a>
        </div>
    </div>
</x-guest-layout>