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
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 40px;
        }

        header .container {
            padding: 40px;
            width: 100%;
            max-width: none;
        }

        .header-inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .header-row {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            align-self: stretch;
        }

        .header-row h1 {
            margin-bottom: 0;
            text-align: center;
        }

        .header-row .auth-btn,
        .header-row .user-menu {
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        .auth-btn {
            display: inline-block;
            background-color: #4a4a4a;
            color: #ffffff;
            padding: 10px 24px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 0.95rem;
            transition: background-color 0.3s ease;
        }

        .auth-btn:hover {
            background-color: #2c2c2c;
        }

        .user-menu {
            position: relative;
            display: inline-block;
        }

        .user-name {
            display: inline-block;
            background-color: #4a4a4a;
            color: #ffffff;
            padding: 10px 24px;
            border-radius: 4px;
            font-size: 0.95rem;
            cursor: pointer;
            border: none;
        }

        .user-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 5px;
            background: #fff;
            border-radius: 4px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            overflow: hidden;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.2s, visibility 0.2s;
            z-index: 100;
        }

        .user-menu:hover .user-dropdown {
            opacity: 1;
            visibility: visible;
        }

        .user-dropdown form {
            margin: 0;
        }

        .logout-btn {
            display: block;
            width: 100%;
            padding: 12px 24px;
            background: none;
            border: none;
            color: #2c2c2c;
            font-size: 0.95rem;
            cursor: pointer;
            text-align: left;
            transition: background-color 0.2s;
        }

        .logout-btn:hover {
            background-color: #f0f0f0;
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
            cursor: pointer;
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
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .post-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
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

        /* Modal */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal {
            background: #fff;
            border-radius: 8px;
            max-width: 600px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            display: flex;
            flex-direction: column;
        }

        .modal-image-wrap {
            width: 100%;
            min-height: 200px;
            max-height: 400px;
            overflow: hidden;
            background: #f0f0f0;
            flex-shrink: 0;
        }

        .modal-image {
            width: 100%;
            height: auto;
            max-height: 400px;
            object-fit: contain;
            display: block;
            vertical-align: top;
        }

        .modal-content {
            padding: 24px;
            flex: 1;
            min-width: 0;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 400;
            margin-bottom: 16px;
            color: #2c2c2c;
            word-wrap: break-word;
        }

        .modal-description {
            font-size: 1rem;
            color: #666;
            line-height: 1.7;
            white-space: pre-wrap;
            word-wrap: break-word;
            overflow-wrap: break-word;
            word-break: break-word;
        }

        .modal-close {
            position: absolute;
            top: 15px;
            right: 15px;
            z-index: 10;
            background: rgba(255,255,255,0.95);
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            font-size: 1.5rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
            transition: background 0.2s;
            box-shadow: 0 1px 4px rgba(0,0,0,0.2);
        }

        .modal-close:hover {
            background: #fff;
        }

        .modal-header {
            position: relative;
            flex-shrink: 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-inner">
                <div class="header-row">
                    <h1>Портфолио студента Елизова Алексея Олеговича</h1>
                    @auth
                        <div class="user-menu">
                            <span class="user-name">{{ Auth::user()->name }}</span>
                            <div class="user-dropdown">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="logout-btn">Выйти</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="auth-btn">Авторизоваться</a>
                    @endauth
                </div>
                <p class="subtitle">Информационные системы и программирование</p>
                <p class="subtitle">Коллекция проектов и работ</p>
                @auth
                    <a href="{{ route('posts.create') }}" class="add-post-btn">+ Добавить работу</a>
                @endauth
            </div>
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
                    <div class="post-card" data-post-id="{{ $post->id }}" data-post-title="{{ e($post->title) }}" data-post-description="{{ e($post->description) }}" data-post-image="{{ url('storage/' . $post->image_path) }}">
                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="post-image">
                        <div class="post-content">
                            <h2 class="post-title">{{ $post->title }}</h2>
                            <p class="post-description">{{ $post->description }}</p>
                            @auth
                                <div class="post-actions">
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;" onclick="event.stopPropagation();">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn" onclick="return confirm('Вы уверены, что хотите удалить эту работу?')">Удалить</button>
                                    </form>
                                </div>
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <h2>Портфолио пока пусто</h2>
                <p>Добавьте свою первую работу, чтобы начать формирование портфолио</p>
                @auth
                    <a href="{{ route('posts.create') }}" class="add-post-btn">Добавить первую работу</a>
                @endauth
            </div>
        @endif
    </div>

    <div class="modal-overlay" id="postModal">
        <div class="modal">
            <div class="modal-header">
                <button type="button" class="modal-close" id="modalClose">&times;</button>
                <div class="modal-image-wrap">
                    <img src="" alt="" class="modal-image" id="modalImage">
                </div>
            </div>
            <div class="modal-content">
                <h2 class="modal-title" id="modalTitle"></h2>
                <p class="modal-description" id="modalDescription"></p>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} Портфолио студента. Все права защищены.</p>
        </div>
    </footer>

    <script>
        document.querySelectorAll('.post-card').forEach(card => {
            card.addEventListener('click', function(e) {
                if (e.target.closest('form')) return;
                const modal = document.getElementById('postModal');
                document.getElementById('modalImage').src = this.dataset.postImage;
                document.getElementById('modalImage').alt = this.dataset.postTitle;
                document.getElementById('modalTitle').textContent = this.dataset.postTitle;
                document.getElementById('modalDescription').textContent = this.dataset.postDescription;
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        });

        function closeModal() {
            document.getElementById('postModal').classList.remove('active');
            document.body.style.overflow = '';
        }

        document.getElementById('modalClose').addEventListener('click', closeModal);
        document.getElementById('postModal').addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeModal();
        });
    </script>
</body>
</html>
