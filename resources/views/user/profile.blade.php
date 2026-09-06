<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ Sơ Cá Nhân</title>
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
        <h1 class="text-xl font-bold text-slate-800">Hồ Sơ Cá Nhân</h1>
        <div class="flex gap-4">
            <a href="{{ route('user.dashboard') }}" class="text-blue-500 hover:text-blue-700 font-medium">Quay lại Dashboard</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Đăng xuất</button>
            </form>
        </div>
    </nav>
    <div class="flex-grow flex justify-center items-start pt-10">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-2xl p-8">
            <h2 class="text-2xl font-bold text-slate-800 mb-6 text-center">Cập nhật thông tin</h2>
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('user.profile.update') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-slate-700 text-sm font-bold mb-2">Họ và tên</label>
                    <input type="text" name="name" value="{{ auth()->user()->name }}" class="w-full border border-slate-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-6">
                    <label class="block text-slate-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" name="email" value="{{ auth()->user()->email }}" class="w-full border border-slate-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <!-- Có thể thêm các trường khác như số điện thoại, địa chỉ ở đây nếu bạn muốn cập nhật bảng users trong Database -->
                <div class="flex justify-center">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition">
                        Lưu Thay Đổi
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
