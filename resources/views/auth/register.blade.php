<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация - Портфолио</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f5f5f5;
            color: #2c2c2c;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            font-size: 1.5rem;
            font-weight: 300;
            margin-bottom: 25px;
            text-align: center;
        }
        .form-group { margin-bottom: 20px; }
        label {
            display: block;
            font-size: 0.9rem;
            color: #4a4a4a;
            margin-bottom: 6px;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #d0d0d0;
            border-radius: 4px;
            font-size: 1rem;
        }
        input:focus {
            outline: none;
            border-color: #4a4a4a;
        }
        .error { color: #d32f2f; font-size: 0.85rem; margin-top: 5px; }
        .success { color: #2e7d32; font-size: 0.9rem; margin-bottom: 15px; }
        .btn {
            width: 100%;
            padding: 14px;
            background-color: #4a4a4a;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover { background-color: #2c2c2c; }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #666;
            text-decoration: none;
            font-size: 0.95rem;
        }
        .back-link:hover { color: #2c2c2c; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Регистрация</h1>
        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email (логин)</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Подтвердите пароль</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn">Зарегистрироваться</button>
        </form>
        <a href="{{ route('portfolio') }}" class="back-link">← Вернуться на главную</a>
    </div>
</body>
</html>
