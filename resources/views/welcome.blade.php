<x-guest-layout>

<h1>Привет от Хекслета!</h1>
<name></name>
    
<h1>Привет от Хекслета!</h1>
<div class="min-h-screen flex items-center justify-center py-12 px-4">
        <div class="max-w-4xl w-full">
            <div class="text-center mb-12">
                <div class="mb-8">
                    <svg class="w-24 h-24 mx-auto text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
                <h1 class="text-h1 text-primary-900 mb-4">
                    <span class="block">Ocean Task Manager</span>
                    <span class="text-primary-600">Управляйте задачами с лёгкостью</span>
                </h1>
                <p class="text-lg font-bold text-green-700 mt-4">Привет от Хекслета!</p>
                <p class="text-body-1 text-primary-600">
                    Элегантное и простое решение для организации ваших проектов и ежедневных задач
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="card elevation-2">
                    <div class="card-body text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-primary-50 mb-4">
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                        </div>
                        <h3 class="text-h2 text-primary-700 mb-2">Вернуться к работе</h3>
                        <p class="text-body-1 text-primary-600 mb-6">Продолжайте с того места, где остановились</p>
                        
                        <a href="{{ route('login') }}" 
                           class="btn btn-primary w-full">
                            Войти в систему
                        </a>
                    </div>
                </div>
                
                <div class="card elevation-2">
                    <div class="card-body text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-primary-50 mb-4">
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                        </div>
                        <h3 class="text-h2 text-primary-700 mb-2">Начать путешествие</h3>
                        <p class="text-body-1 text-primary-600 mb-6">Присоединяйтесь к тысячам довольных пользователей</p>
                        
                        <a href="{{ route('register') }}" 
                           class="btn btn-secondary w-full">
                            Зарегистрироваться
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <div class="flex items-center justify-center gap-4 text-body-2 text-primary-600">
                    <span>Безопасное хранение данных</span>
                    <span>•</span>
                    <span>Полная синхронизация</span>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>