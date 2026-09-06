<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập hệ thống</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Mặc định là Dark Mode */
        :root {
            --bg-color: #0f172a;
            --card-bg: #1e293b;
            --text-main: #ffffff;
            --text-muted: #94a3b8;
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --input-bg: #334155;
            --border-color: #475569;
            --shadow-color: rgba(0, 0, 0, 0.3);
        }

        /* Light Mode */
        body.light-theme {
            --bg-color: #f1f5f9;
            --card-bg: #ffffff;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --input-bg: #ffffff;
            --border-color: #cbd5e1;
            --shadow-color: rgba(0, 0, 0, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
        }

        /* Nút chuyển đổi Theme */
        .theme-toggle {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--card-bg);
            color: var(--text-main);
            border: 1px solid var(--border-color);
            border-radius: 50%;
            width: 44px;
            height: 44px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            box-shadow: 0 4px 6px var(--shadow-color);
            z-index: 10;
        }

        .theme-toggle:hover {
            transform: scale(1.05);
        }

        .theme-toggle i {
            font-size: 1.2rem;
        }

        .auth-container {
            background-color: var(--card-bg);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px var(--shadow-color);
            width: 100%;
            max-width: 400px;
        }

        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .auth-header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .auth-header p {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-muted);
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            background-color: var(--input-bg);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            color: var(--text-main);
            font-size: 1rem;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
        }
        
        .form-control::placeholder {
            color: var(--text-muted);
            opacity: 0.7;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
        }

        .btn:hover {
            background-color: var(--primary-hover);
        }

        .auth-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        .auth-footer a {
            color: var(--primary);
            text-decoration: none;
        }

        .auth-footer a:hover {
            text-decoration: underline;
        }
        
        /* Hiển thị lỗi */
        .error-message {
            color: #ef4444;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }
    </style>
</head>
<body>
    <button class="theme-toggle" id="themeToggleBtn" aria-label="Chuyển đổi giao diện">
        <i class="fa-solid fa-sun" id="themeIcon"></i>
    </button>

    <div class="auth-container">
        <div class="auth-header">
            <h1>Đăng nhập</h1>
            <p>Vui lòng đăng nhập để tiếp tục</p>
        </div>

        @if(request()->query('success') == 'register_success')
            <div style="background-color: #10b981; color: white; padding: 10px; border-radius: 6px; margin-bottom: 20px; text-align: center; font-size: 0.9rem;">
                Đăng ký tài khoản thành công! Vui lòng đăng nhập.
            </div>
        @endif
        
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email / Tên đăng nhập</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Nhập email của bạn" required>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Nhập mật khẩu" required>
            </div>
            
            <button type="submit" class="btn">Đăng nhập</button>
        </form>
        
        <div class="auth-footer">
            Chưa có tài khoản? <a href="{{ url('/register') }}">Đăng ký ngay</a>
        </div>
    </div>

    <script>
        const themeToggleBtn = document.getElementById('themeToggleBtn');
        const themeIcon = document.getElementById('themeIcon');
        const body = document.body;

        // Kiểm tra theme đã lưu trong localStorage
        const currentTheme = localStorage.getItem('theme');
        if (currentTheme === 'light') {
            body.classList.add('light-theme');
            themeIcon.classList.replace('fa-sun', 'fa-moon');
        }

        themeToggleBtn.addEventListener('click', () => {
            body.classList.toggle('light-theme');
            
            if (body.classList.contains('light-theme')) {
                localStorage.setItem('theme', 'light');
                themeIcon.classList.replace('fa-sun', 'fa-moon');
            } else {
                localStorage.setItem('theme', 'dark');
                themeIcon.classList.replace('fa-moon', 'fa-sun');
            }
        });
    </script>
</body>
</html>
