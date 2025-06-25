<x-guest-layout>
    <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-xl">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-blue-800 mb-2">Добро пожаловать</h1>
            <p class="text-gray-600">Войдите в свой аккаунт</p>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group mb-6">
                <label class="form-label" for="email">Email *</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="form-group mb-6">
                <label class="form-label" for="password">Пароль *</label>
                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mb-6">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">Запомнить меня</span>
                </label>
                
                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-600 hover:text-blue-800" href="{{ route('password.request') }}">
                        Забыли пароль?
                    </a>
                @endif
            </div>

            <button type="submit" class="btn btn-blue w-full py-3 text-lg">
                Войти
            </button>
        </form>
        
        <div class="mt-8 text-center">
            <p class="text-gray-600">
                Ещё нет аккаунта?
                <a href="{{ route('register') }}" class="text-blue-600 font-medium hover:text-blue-800">
                    Зарегистрируйтесь
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>