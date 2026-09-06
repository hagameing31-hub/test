<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>419 - Trang đã hết hạn</title>
    <!-- Thêm Tailwind CSS qua CDN nếu Vite chưa build, 
         hoặc dùng Vite Tailwind nếu project đã setup -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0" role="main">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
                <h1 class="px-4 text-lg text-gray-700 dark:text-gray-300 border-r border-gray-400 tracking-wider">
                    419
                </h1>

                <div class="ml-4 text-lg text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                    Trang đã hết hạn
                </div>
            </div>
            
            <div class="mt-8 text-center sm:text-left">
                <a href="{{ url()->previous() }}" class="text-sm text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 underline">
                    &larr; Quay lại trang trước
                </a>
            </div>
        </div>
    </div>
</body>
</html>
