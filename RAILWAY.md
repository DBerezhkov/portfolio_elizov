# Railway — деплой

## 1. Добавьте PostgreSQL

В проекте Railway: **New** → **Database** → **PostgreSQL**

## 2. Переменные окружения

В сервисе приложения → **Variables** добавьте:

| Переменная | Значение |
|------------|----------|
| `DATABASE_URL` | `${{Postgres.DATABASE_URL}}` |
| `APP_KEY` | `base64:...` (сгенерируйте: `php artisan key:generate`) |
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |
| `APP_URL` | Ваш домен Railway (например `https://xxx.up.railway.app`) |

## 3. Деплой

Сделайте push в репозиторий — Railway соберёт образ по Dockerfile и задеплоит.

## Вход

- **Email:** `elizov@portfolio.local`
- **Пароль:** `portfolio123`
