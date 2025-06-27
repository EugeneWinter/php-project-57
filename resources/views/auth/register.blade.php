<x-guest-layout>
    <body>
        <div class="auth-card">
            <h2 class="auth-title">Регистрация</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" name="name" id="name" required autofocus>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Подтверждение пароля</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                </div>
                <div class="form-footer">
                    <button type="submit" name="register-button">Зарегистрировать</button>
                </div>
            </form>
        </div>
    </body>
</x-guest-layout>