# Менеджер задач

[![Actions Status](https://github.com/EugeneWinter/php-project-57/actions/workflows/hexlet-check.yml/badge.svg)](https://github.com/EugeneWinter/php-project-57/actions)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=EugeneWinter_php-project-9&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=EugeneWinter_php-project-57)
[![Maintainability](https://sonarcloud.io/api/project_badges/measure?project=EugeneWinter_php-project-9&metric=sqale_rating)](https://sonarcloud.io/summary/new_code?id=EugeneWinter_php-project-57)


## Демо

[Открыть приложение на Render.com](https://php-project-57-oz8j.onrender.com)

---

## Разворачивание и запуск

1. Клонируйте репозиторий
2. Установите зависимости:
   ```
   composer install
   npm ci
   ```
3. Скопируйте .env.example в .env и настройте переменные окружения (см. ниже)
4. Соберите фронтенд:
   ```
   npm run build
   ```
5. Примените миграции и сиды:
   ```
   php artisan migrate --seed
   ```
6. Запустите сервер:
   ```
   php artisan serve
   ```

---

## Важно
- Для деплоя используется Dockerfile (Render.com, Runtime Docker)
- Все секреты (ключи, пароли) передаются только через переменные окружения
- Для тестов переменные задаются в phpunit.xml

---

## Аутентификация
- Используется [Laravel Breeze](https://laravel.com/docs/11.x/starter-kits#laravel-breeze)
- Сессии хранятся в базе данных

---

## Почта
- Для отправки почты используется [mailtrap.io](https://mailtrap.io/)
- Пример настроек в .env.example:
  ```
  MAIL_MAILER=smtp
  MAIL_HOST=smtp.mailtrap.io
  MAIL_PORT=2525
  MAIL_USERNAME=your_mailtrap_username
  MAIL_PASSWORD=your_mailtrap_password
  MAIL_ENCRYPTION=null
  MAIL_FROM_ADDRESS="hello@example.com"
  MAIL_FROM_NAME="${APP_NAME}"
  ```

---

## Флеш-сообщения
- Используется [laracasts/flash](https://github.com/laracasts/flash)
- Все флеши выводятся через @include('flash::message')

---

## Локализация
- Все тексты, лейблы, флеши и ошибки валидации вынесены в lang-файлы (resources/lang/ru, en)

---

## Тесты и линтер
- Запуск тестов и линтера через Github Actions (см. .github/workflows)

---

## Sentry
- Для трекинга ошибок можно подключить [Sentry](https://sentry.io/)
- Пример переменной окружения:
  ```
  SENTRY_LARAVEL_DSN=your_sentry_dsn
  ```

---

## Основные технологии
- Laravel 11
- Laravel Breeze
- laracasts/flash
- spatie/laravel-query-builder
- TailwindCSS
- Docker
- Github Actions
- SonarQube

---

## Лицензия
MIT
