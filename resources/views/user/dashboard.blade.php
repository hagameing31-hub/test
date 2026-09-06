<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Người Dùng</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-100 min-h-screen flex flex-col p-4">
    <nav class="w-full flex justify-between items-center py-4 px-8 bg-white shadow-md rounded-xl mb-6">
        <h1 class="text-xl font-bold text-slate-800">Xin chào, {{ auth()->user()->name ?? 'Người dùng' }}!</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Đăng xuất</button>
        </form>
    </nav>
    <div class="flex-grow flex justify-center items-start pt-10">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-4xl p-8 text-center">
            <h2 class="text-2xl font-bold text-slate-800 mb-4">Trang tổng quan cá nhân</h2>
            <p class="text-slate-500 mb-8">Chào mừng bạn đến với hệ thống. Đây là trang dành riêng cho người dùng.</p>
            <div class="grid grid-cols-1 gap-6">
                <a href="{{ route('user.profile') }}" class="block p-6 bg-blue-50 border border-blue-100 rounded-lg hover:shadow-md transition text-left">
                    <i class="fa-solid fa-user-circle text-blue-500 text-3xl mb-3"></i>
                    <h3 class="text-lg font-bold text-slate-800">Hồ sơ cá nhân</h3>
                    <p class="text-slate-500 text-sm mt-1">Cập nhật thông tin tài khoản của bạn.</p>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
