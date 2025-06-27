<x-guest-layout>
    <body>
        <div class="auth-card">
            <h2 class="auth-title">Вход в систему</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="form-footer">
                    <button type="submit" name="login-button">Войти</button>
                </div>
            </form>
        </div>
    </body>
</x-guest-layout>