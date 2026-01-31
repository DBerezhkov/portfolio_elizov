<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход - Портфолио</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f5f5f5;
            color: #2c2c2c;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .auth-card {
            background: #fff;
            border-radius: 8px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        h1 {
            font-size: 1.75rem;
            font-weight: 300;
            margin-bottom: 25px;
            text-align: center;
        }
        .form-group { margin-bottom: 20px; }
        label {
            display: block;
            font-size: 0.95rem;
            color: #4a4a4a;
            margin-bottom: 8px;
        }
        input[type="email"],
        input[type="password"],
        input[type="text"] {
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
        .btn-primary {
            width: 100%;
            padding: 14px;
            background-color: #4a4a4a;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn-primary:hover { background-color: #2c2c2c; }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #666;
            text-decoration: none;
            font-size: 0.95rem;
        }
        .back-link:hover { color: #2c2c2c; }
        .remember { display: flex; align-items: center; gap: 8px; margin-bottom: 15px; }
        .remember input { width: auto; }
    </style>
</head>
<body>
    <div class="auth-card">
        <h1>Вход</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')<div class="error">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" required>
                @error('password')<div class="error">{{ $message }}</div>@enderror
            </div>
            <div class="form-group remember">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember" style="margin:0;">Запомнить меня</label>
            </div>
            <button type="submit" class="btn-primary">Войти</button>
        </form>
        <a href="{{ route('portfolio') }}" class="back-link">← Вернуться к портфолио</a>
    </div>
</body>
</html>
