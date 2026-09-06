<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Profile')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --sidebar-bg: #1e293b;
            --sidebar-hover: #334155;
            --sidebar-text: #cbd5e1;
            --sidebar-active: #ffffff;
            --main-bg: #f1f5f9;
            --primary: #4f46e5;
            --text-dark: #0f172a;
            --text-muted: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: var(--main-bg);
            color: var(--text-dark);
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background-color: var(--sidebar-bg);
            color: var(--sidebar-text);
            display: flex;
            flex-direction: column;
            transition: all 0.3s;
            height: 100vh; /* Cố định chiều cao bằng khung nhìn */
            position: sticky;
            top: 0;
        }

        .sidebar-header {
            padding: 24px 20px;
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            letter-spacing: 1px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 20px 0;
            flex: 1;
            overflow-y: auto; /* Cho phép cuộn dọc nếu menu dài */
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 24px;
            color: var(--sidebar-text);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }

        .sidebar-menu a i {
            width: 24px;
            font-size: 1.1rem;
            margin-right: 10px;
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background-color: var(--sidebar-hover);
            color: var(--sidebar-active);
            border-left: 4px solid var(--primary);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        .header {
            background: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .header-title {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-info span {
            display: block;
            font-weight: 600;
            font-size: 0.95rem;
        }
        
        .user-info small {
            color: var(--text-muted);
        }

        /* Content Area */
        .content {
            padding: 30px;
            flex: 1;
        }

        /* Thiết lập thời gian và kiểu chuyển động cho các khối nội dung */
        .content-section {
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.4s ease, transform 0.4s ease;
        }

        /* Khi mục được kích hoạt hiển thị */
        .content-section.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* UI Components */
        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
            padding: 20px;
            margin-bottom: 24px;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            border: none;
            transition: all 0.2s;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: #4338ca;
        }
        
        .btn-danger {
            background-color: #ef4444;
            color: white;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        table th {
            font-weight: 600;
            color: var(--text-muted);
            background-color: #f8fafc;
        }

        table tbody tr:hover {
            background-color: #f8fafc;
        }

        /* Bổ sung các class hỗ trợ nhanh */
        .flex { display: flex; }
        .items-center { align-items: center; }
        .gap-2 { gap: 8px; }
        .gap-3 { gap: 12px; }
        .px-6 { padding-left: 24px; padding-right: 24px; }
        .py-4 { padding-top: 16px; padding-bottom: 16px; }
        .h-8 { height: 32px; }
        .w-auto { width: auto; }
        .object-contain { object-fit: contain; }

        @stack('styles')
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-brand px-6 py-4 flex items-center gap-3">
            <a href="{{ url('/admin') }}" class="flex items-center gap-2">
                <!-- Sử dụng hàm asset() của Laravel để gọi ảnh -->
                <img src="{{ asset('images/sdsd.png') }}" alt="Logo" class="h-8 w-auto object-contain">
                
                <!-- Tên thương hiệu (nếu muốn hiển thị kèm logo) -->
                <span style="color: white; font-weight: bold; font-size: 1.25rem;">Admin</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="/admin" class="{{ request()->is('admin') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-pie"></i> Thống kê
                </a>
            </li>
            <li>
                <a href="#" class="{{ request()->is('admin/info') ? 'active' : '' }}">
                    <i class="fa-solid fa-user"></i> Thông tin cá nhân
                </a>
            </li>
            <li>
                <a href="/admin/skills" class="{{ request()->is('admin/skills') ? 'active' : '' }}">
                    <i class="fa-solid fa-code"></i> Quản lý Kỹ năng
                </a>
            </li>
            <li>
                <a href="#" class="{{ request()->is('admin/experience') ? 'active' : '' }}">
                    <i class="fa-solid fa-briefcase"></i> Kinh nghiệm
                </a>
            </li>
            <li>
                <a href="#" class="{{ request()->is('admin/projects') ? 'active' : '' }}">
                    <i class="fa-solid fa-folder-open"></i> Dự án
                </a>
            </li>
            <li style="margin-top: auto;">
                <a href="/" target="_blank">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i> Xem Website
                </a>
            </li>
            <li>
                <a href="{{ route('logout.get') }}">
                    <i class="fa-solid fa-right-from-bracket"></i> Đăng xuất
                </a>
            </li>
        </ul>
    </aside>

    <div class="main-content">
        <header class="header">
            <div class="header-title">
                @yield('header_title', 'Dashboard')
            </div>
            
            <div class="user-profile">
                <div class="user-info" style="text-align: right;">
                    <span>Hùng Anh</span>
                    <small>Administrator</small>
                </div>
                <img src="{{ asset('images/abc.png') }}" alt="Admin">
            </div>
        </header>

        <main class="content">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
