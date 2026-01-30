<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Портфолио студента</title>
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
            max-width: 1200px;
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
            font-size: 2.5rem;
            font-weight: 300;
            color: #2c2c2c;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 1rem;
            color: #666;
            font-weight: 300;
        }

        .add-post-btn {
            display: inline-block;
            background-color: #4a4a4a;
            color: #ffffff;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
            font-size: 0.95rem;
            transition: background-color 0.3s ease;
        }

        .add-post-btn:hover {
            background-color: #2c2c2c;
        }

        .alert {
            padding: 15px 20px;
            margin-bottom: 30px;
            border-radius: 4px;
            background-color: #e8f5e9;
            color: #2e7d32;
            border-left: 4px solid #4caf50;
        }

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .post-card {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
        }

        .post-image {
            width: 100%;
            height: 260px;
            object-fit: cover;
            display: block;
        }

        .post-content {
            padding: 20px;
        }

        .post-title {
            font-size: 1.3rem;
            font-weight: 400;
            color: #2c2c2c;
            margin-bottom: 12px;
        }

        .post-description {
            font-size: 0.95rem;
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .delete-btn {
            background-color: #e0e0e0;
            color: #4a4a4a;
            border: none;
            padding: 8px 18px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }

        .delete-btn:hover {
            background-color: #d32f2f;
            color: #ffffff;
        }

        .empty-state {
            text-align: center;
            padding: 80px 20px;
            color: #999;
        }

        .empty-state h2 {
            font-size: 1.5rem;
            font-weight: 300;
            margin-bottom: 15px;
        }

        .empty-state p {
            font-size: 1rem;
            margin-bottom: 25px;
        }

        footer {
            text-align: center;
            padding: 40px 0;
            color: #999;
            font-size: 0.9rem;
            margin-top: 60px;
            border-top: 1px solid #e0e0e0;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Портфолио студента Елизова Алексея Олеговича</h1>
            <p class="subtitle">Информационные системы и программирование</p>
            <p class="subtitle">Коллекция проектов и работ</p>
            <a href="{{ route('posts.create') }}" class="add-post-btn">+ Добавить работу</a>
        </div>
    </header>

    <div class="container">
        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        @if($posts->count() > 0)
            <div class="posts-grid">
                @foreach($posts as $post)
                    <div class="post-card">
                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="post-image">
                        <div class="post-content">
                            <h2 class="post-title">{{ $post->title }}</h2>
                            <p class="post-description">{{ $post->description }}</p>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Вы уверены, что хотите удалить эту работу?')">Удалить</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <h2>Портфолио пока пусто</h2>
                <p>Добавьте свою первую работу, чтобы начать формирование портфолио</p>
                <a href="{{ route('posts.create') }}" class="add-post-btn">Добавить первую работу</a>
            </div>
        @endif
    </div>

    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} Портфолио студента. Все права защищены.</p>
        </div>
    </footer>
</body>
</html>



