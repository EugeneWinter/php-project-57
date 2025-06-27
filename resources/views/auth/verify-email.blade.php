<x-guest-layout>
    <div class="auth-card">
        <h2 class="auth-title">{{ __('Подтверждение Email') }}</h2>
        
        <p class="auth-description">
            {{ __('Спасибо за регистрацию! Прежде чем начать, подтвердите ваш email, перейдя по ссылке в письме.') }}
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="auth-message success-message">
                {{ __('Новая ссылка для подтверждения была отправлена на ваш email.') }}
            </div>
        @endif

        <div class="verify-actions">
            <form method="POST" action="{{ route('verification.send') }}" class="verify-form">
                @csrf
                <button type="submit" class="auth-button primary-button">
                    {{ __('Отправить письмо повторно') }}
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="auth-button secondary-button">
                    {{ __('Выйти') }}
                </button>
            </form>
        </div>
        
        <div class="auth-info">
            <p class="info-text">
                {{ __('Не получили письмо? Проверьте папку "Спам" или нажмите кнопку выше для повторной отправки.') }}
            </p>
        </div>
    </div>
</x-guest-layout>
