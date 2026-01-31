<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить работу - Портфолио</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f5f5f5;
            color: #2c2c2c;
            line-height: 1.6;
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            background-color: #ffffff;
            padding: 40px 0;
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 40px;
        }

        h1 {
            font-size: 2rem;
            font-weight: 300;
            color: #2c2c2c;
        }

        .back-link {
            display: inline-block;
            color: #666;
            text-decoration: none;
            margin-top: 15px;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #2c2c2c;
        }

        .form-card {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-size: 0.95rem;
            color: #4a4a4a;
            margin-bottom: 8px;
            font-weight: 400;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #d0d0d0;
            border-radius: 4px;
            font-size: 1rem;
            font-family: inherit;
            transition: border-color 0.3s ease;
            background-color: #fafafa;
        }

        input[type="text"]:focus,
        textarea:focus,
        input[type="file"]:focus {
            outline: none;
            border-color: #4a4a4a;
            background-color: #ffffff;
        }

        textarea {
            resize: vertical;
            min-height: 150px;
        }

        input[type="file"] {
            padding: 10px;
            cursor: pointer;
        }

        .error {
            color: #d32f2f;
            font-size: 0.85rem;
            margin-top: 5px;
        }

        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 35px;
        }

        .btn {
            flex: 1;
            padding: 14px 30px;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            display: inline-block;
        }

        .btn-primary {
            background-color: #4a4a4a;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #2c2c2c;
        }

        .btn-secondary {
            background-color: #e0e0e0;
            color: #4a4a4a;
        }

        .btn-secondary:hover {
            background-color: #d0d0d0;
        }

        .file-info {
            font-size: 0.85rem;
            color: #999;
            margin-top: 5px;
        }

        footer {
            text-align: center;
            padding: 40px 0;
            color: #999;
            font-size: 0.9rem;
            margin-top: 60px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Добавить новую работу</h1>
            <a href="{{ route('portfolio') }}" class="back-link">← Вернуться к портфолио</a>
        </div>
    </header>

    <div class="container">
        <div class="form-card">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Название работы</label>
                    <input 
                        type="text" 
                        id="title" 
                        name="title" 
                        value="{{ old('title') }}" 
                        placeholder="Введите название проекта"
                        required
                    >
                    @error('title')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea 
                        id="description" 
                        name="description" 
                        placeholder="Опишите проект, использованные технологии и ваш вклад"
                        required
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Изображение проекта</label>
                    <input 
                        type="file" 
                        id="image" 
                        name="image" 
                        accept="image/jpeg,image/png,image/jpg,image/gif"
                        required
                    >
                    <div class="file-info">Форматы: JPEG, PNG, JPG, GIF. Максимальный размер: 10 МБ</div>
                    @error('image')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Опубликовать</button>
                    <a href="{{ route('portfolio') }}" class="btn btn-secondary">Отмена</a>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} Портфолио студента</p>
        </div>
    </footer>
</body>
</html>



