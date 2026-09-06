
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chấm công Nhân viên</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-8 text-center">
        <h2 class="text-2xl font-bold text-slate-800 mb-2">Hệ Thống Chấm Công</h2>
        <p class="text-slate-500 mb-8" id="current-time">Đang tải giờ...</p>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('checkin.store') }}" method="POST">
            @csrf
            <div class="mb-6 text-left">
                <label class="block text-slate-700 text-sm font-bold mb-2">Chọn nhân viên</label>
                <select name="employee_id" class="w-full border border-slate-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">-- Vui lòng chọn tên --</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->name }} - {{ $employee->position }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <button type="submit" name="action" value="checkin" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-4 rounded-lg flex flex-col items-center justify-center transition">
                    <i class="fa-solid fa-right-to-bracket text-2xl mb-2"></i>
                    Check-in
                </button>
                <button type="submit" name="action" value="checkout" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 px-4 rounded-lg flex flex-col items-center justify-center transition">
                    <i class="fa-solid fa-right-from-bracket text-2xl mb-2"></i>
                    Check-out
                </button>
            </div>
        </form>
    </div>

    <script>
        function updateTime() {
            const now = new Date();
            document.getElementById('current-time').innerText = now.toLocaleString('vi-VN', { 
                weekday: 'long', year: 'numeric', month: 'long', day: 'numeric',
                hour: '2-digit', minute: '2-digit', second: '2-digit'
            });
        }
        setInterval(updateTime, 1000);
        updateTime();
    </script>
</body>
</html>
