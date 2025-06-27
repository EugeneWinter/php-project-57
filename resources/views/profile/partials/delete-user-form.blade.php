<section class="bg-white rounded-xl shadow-sm p-6">
    <header class="mb-6">
        <h2 class="text-xl font-semibold text-gray-800">
            Удалить аккаунт
        </h2>
        <p class="mt-2 text-sm text-gray-600">
            После удаления вашего аккаунта все его ресурсы и данные будут безвозвратно удалены. Перед удалением аккаунта скачайте любые данные или информацию, которую вы хотите сохранить.
        </p>
    </header>

    <details class="mt-6">
        <summary class="cursor-pointer inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
            Удалить аккаунт
        </summary>
        
        <div class="mt-4 p-4 border border-red-200 rounded-lg bg-red-50">
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <div>
                    <h3 class="text-lg font-semibold text-gray-800">
                        Вы уверены, что хотите удалить свой аккаунт?
                    </h3>
                    <p class="mt-1 text-sm text-gray-600">
                        После удаления вашего аккаунта все его ресурсы и данные будут безвозвратно удалены. Введите свой пароль для подтверждения того, что вы хотите навсегда удалить свой аккаунт.
                    </p>
                </div>

                <div class="mt-5">
                    <x-input-label for="password" value="Пароль" class="sr-only" />
                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="w-full mt-1"
                        placeholder="Текущий пароль"
                        required
                    />
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="this.closest('details').removeAttribute('open')" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                        Отмена
                    </button>

                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Удалить аккаунт
                    </button>
                </div>
            </form>
        </div>
    </details>
</section>
