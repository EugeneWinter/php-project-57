<section class="bg-white rounded-xl shadow-sm p-6">
    <header class="mb-6">
        <h2 class="text-xl font-semibold text-gray-800">
            Изменить пароль
        </h2>
        <p class="mt-2 text-sm text-gray-600">
            Убедитесь, что ваш аккаунт использует длинный, случайный пароль для безопасности.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-5">
        @csrf
        @method('put')

        <div class="form-group">
            <x-input-label for="update_password_current_password" value="Текущий пароль" />
            <x-text-input 
                id="update_password_current_password" 
                name="current_password" 
                type="password" 
                autocomplete="current-password" 
            />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" />
        </div>

        <div class="form-group">
            <x-input-label for="update_password_password" value="Новый пароль" />
            <x-text-input 
                id="update_password_password" 
                name="password" 
                type="password" 
                autocomplete="new-password" 
            />
            <x-input-error :messages="$errors->updatePassword->get('password')" />
        </div>

        <div class="form-group">
            <x-input-label for="update_password_password_confirmation" value="Подтвердите пароль" />
            <x-text-input 
                id="update_password_password_confirmation" 
                name="password_confirmation" 
                type="password" 
                autocomplete="new-password" 
            />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" />
        </div>

        <div class="flex items-center gap-4 pt-2">
            <x-primary-button>
                Сохранить
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <div class="status-message success">
                    Пароль обновлен.
                </div>
            @endif
        </div>
    </form>
</section>