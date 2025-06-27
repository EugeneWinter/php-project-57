<x-guest-layout>
    <div class="auth-card">
        <h2 class="auth-title">{{ __('Сброс пароля') }}</h2>

        <form method="POST" action="{{ route('password.store') }}" class="auth-form">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <div class="form-group">
                <x-input-label for="password" :value="__('Новый пароль')" />
                <x-text-input id="password" type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" />
            </div>

            <div class="form-group">
                <x-input-label for="password_confirmation" :value="__('Подтвердите пароль')" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required />
                <x-input-error :messages="$errors->get('password_confirmation')" />
            </div>

            <div class="form-footer">
                <x-primary-button>
                    {{ __('Сбросить пароль') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>