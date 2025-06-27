<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
                Настройки профиля
            </h2>
            <div class="text-sm text-gray-500">
                Последнее обновление: {{ auth()->user()->updated_at->format('d.m.Y') }}
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <!-- Profile Information Section -->
            <div class="bg-white overflow-hidden shadow-xl rounded-2xl">
                <div class="p-6 sm:p-8">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-800">
                            Личная информация
                        </h3>
                    </div>
                    <div class="border-t border-gray-200 pt-6">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <!-- Password Update Section -->
            <div class="bg-white overflow-hidden shadow-xl rounded-2xl">
                <div class="p-6 sm:p-8">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-800">
                            Пароль и безопасность
                        </h3>
                    </div>
                    <div class="border-t border-gray-200 pt-6">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <!-- Account Deletion Section -->
            <div class="bg-white overflow-hidden shadow-xl rounded-2xl border border-red-100">
                <div class="p-6 sm:p-8">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-red-700">
                            Опасная зона
                        </h3>
                    </div>
                    <div class="border-t border-gray-200 pt-6">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
