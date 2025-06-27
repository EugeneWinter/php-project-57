<section class="bg-white rounded-xl shadow-sm p-6">
    <header class="mb-6">
        <h2 class="text-xl font-semibold text-gray-800">
            Информация профиля
        </h2>
        <p class="mt-2 text-sm text-gray-600">
            Обновите информацию вашего профиля и адрес электронной почты.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('patch')

        <div class="form-group">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Имя</label>
            <x-text-input 
                id="name" 
                name="name" 
                type="text" 
                :value="old('name', $user->name)" 
                required 
                autofocus 
                autocomplete="name" 
            />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <div class="form-group">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <x-text-input 
                id="email" 
                name="email" 
                type="email" 
                :value="old('email', $user->email)" 
                required 
                autocomplete="username" 
            />
            <x-input-error :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-3 bg-yellow-50 rounded-lg">
                    <p class="text-sm text-yellow-700">
                        Ваш адрес электронной почты не подтвержден.

                        <button form="send-verification" class="ml-1 font-medium text-yellow-600 hover:text-yellow-500">
                            Нажмите здесь, чтобы повторно отправить письмо для подтверждения.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600">
                            Новая ссылка для подтверждения была отправлена на ваш адрес электронной почты.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>

            @if (session('status') === 'profile-updated')
                <div class="status-message success">
                    Сохранено.
                </div>
            @endif
        </div>
    </form>
</section>