<!doctype html>
<html lang="en">
<head>
    <title>@yield('title', 'Admin Dashboard | Able Pro')</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Admin Dashboard">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    
    <!-- [Font] Family -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" id="main-font-link">
    <!-- [phosphor Icons] -->
    <link rel="stylesheet" href="{{ asset('template/assets/fonts/phosphor/duotone/style.css') }}">
    <!-- [Tabler Icons] -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <!-- [Feather Icons] -->
    <link rel="stylesheet" href="{{ asset('template/assets/fonts/feather.css') }}">
    <!-- [Font Awesome Icons CDN] -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- [Material Icons] -->
    <link rel="stylesheet" href="{{ asset('template/assets/fonts/material.css') }}">
    
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('template/assets/css/style-preset.css') }}">
    
    @stack('styles')

    <!-- Custom Admin Styles -->
    <style>
        /* Làm đẹp các thẻ thống kê (Stats Cards) */
        .stat-card {
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid #f1f5f9;
            transition: transform 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
        }

        /* Sidebar Transition */
        .pc-sidebar {
            transition: all 0.3s ease-in-out !important;
        }

        /* Chỉnh logo phù hợp với khung của sidebar */
        .sidebar-logo {
            padding: 15px 20px !important;
            height: 80px; /* Cố định chiều cao của phần header sidebar */
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: transparent !important;
            border: none !important;
        }

        .sidebar-logo .b-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
        }

        .sidebar-logo img {
            max-width: 100% !important;
            max-height: 100% !important;
            width: auto !important;
            height: auto !important;
            object-fit: contain;
        }
    </style>
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="dark">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ Sidebar ] start -->
    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header sidebar-logo">
                <a href="{{ url('/admin') }}" class="b-brand text-primary">
                    <img src="{{ asset('images/adm.png') }}" alt="logo" class="logo logo-lg">
                </a>
            </div>
            <div class="navbar-content">
                <ul class="pc-navbar">
                    <li class="pc-item pc-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="pc-item">
                        <a href="{{ url('/admin') }}" class="pc-link">
                            <span class="pc-micon"><i class="fa-solid fa-gauge-high"></i></span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>
                    
                    <li class="pc-item pc-caption">
                        <label>Content Management</label>
                    </li>
                    <li class="pc-item">
                        <a href="{{ url('/admin/profile') }}" class="pc-link">
                            <span class="pc-micon"><i class="fa-solid fa-user-tie"></i></span>
                            <span class="pc-mtext">My Profile</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ url('/admin/services') }}" class="pc-link">
                            <span class="pc-micon"><i class="fa-solid fa-briefcase"></i></span>
                            <span class="pc-mtext">Services</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ url('/admin/experiences') }}" class="pc-link">
                            <span class="pc-micon"><i class="fa-solid fa-star"></i></span>
                            <span class="pc-mtext">Experiences</span>
                        </a>
                    </li>
                    <li class="pc-item pc-caption">
                        <label>Business Operations</label>
                    </li>
                    <li class="pc-item">
                        <a href="{{ url('/admin/employees') }}" class="pc-link">
                            <span class="pc-micon"><i class="fa-solid fa-users"></i></span>
                            <span class="pc-mtext">HR Management</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('admin.attendances.index') }}" class="pc-link">
                            <span class="pc-micon"><i class="fa-solid fa-calendar-check"></i></span>
                            <span class="pc-mtext">Chấm công</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ url('/admin/expenses') }}" class="pc-link">
                            <span class="pc-micon"><i class="fa-solid fa-wallet"></i></span>
                            <span class="pc-mtext">Expenses</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ Sidebar ] end -->

    <!-- [ Header ] start -->
    <header class="pc-header">
        <div class="header-wrapper">
            <div class="me-auto pc-mob-drp">
                <ul class="list-unstyled">
                    <li class="pc-h-item pc-sidebar-collapse">
                        <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="pc-h-item pc-sidebar-popup">
                        <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="ms-auto">
                <ul class="list-unstyled d-flex align-items-center mb-0">
                    <li class="dropdown pc-h-item me-2">
                        <a href="#" class="pc-head-link me-0" id="dark-mode-toggle">
                            <i class="ti ti-moon" style="font-size: 22px;"></i>
                        </a>
                    </li>
                    <li class="dropdown pc-h-item me-2">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ti ti-bell" style="font-size: 22px;"></i>
                            <span class="badge bg-danger rounded-circle position-absolute" style="top: 5px; right: 8px; width: 8px; height: 8px; padding: 0;"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <h5 class="m-0">Thông báo</h5>
                                <a href="#!" class="text-muted">Xóa tất cả</a>
                            </div>
                            <div class="dropdown-body text-wrap header-notification-scroll position-relative" style="max-height: calc(100vh - 215px); overflow-y: auto;">
                                <div class="list-group list-group-flush w-100">
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="user-avtar bg-light-primary" style="width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;"><i class="ti ti-world text-primary"></i></div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <span class="float-end text-sm text-muted">Vài giây trước</span>
                                                <h6 class="mb-1">Khách mới truy cập</h6>
                                                <p class="mb-0 text-muted">IP: 192.168.1.5 (Hà Nội)</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown pc-h-item">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0 d-flex align-items-center" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name=Admin&background=0D8ABC&color=fff&rounded=true" alt="user-image" class="user-avtar rounded-circle me-2" style="width: 32px; height: 32px;">
                            <span class="d-none d-md-inline-block fw-medium">Quản trị</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-header">
                                <h6 class="text-overflow m-0">Xin chào !</h6>
                            </div>
                            <a href="{{ route('admin.profile.edit') }}" class="dropdown-item">
                                <i class="ti ti-user"></i>
                                <span>Tài khoản của tôi</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ti ti-settings"></i>
                                <span>Cài đặt</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="ti ti-power text-danger"></i>
                                <span class="text-danger">Đăng xuất</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">@yield('page-title')</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            
            <!-- [ Main Content ] start -->
            @yield('content')
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <!-- Required Js -->
    <script src="{{ asset('template/assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins/bootstrap.min.js') }}"></script>
    <!-- Thêm thư viện Feather Icons để fix lỗi ReferenceError -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="{{ asset('template/assets/js/script.js') }}"></script>
    <!-- Đã tắt các JS gây lỗi 404 và SyntaxError -->
    <!-- <script src="{{ asset('template/assets/js/theme.js') }}"></script> -->
    
    @stack('scripts')
    
    <script>
        // Dark Mode Logic
        const toggleBtn = document.getElementById('dark-mode-toggle');
        const toggleIcon = toggleBtn.querySelector('i');
        const body = document.body;

        // Load saved theme
        const savedTheme = localStorage.getItem('theme') || 'dark';
        body.setAttribute('data-pc-theme', savedTheme);
        updateIcon(savedTheme);

        toggleBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const currentTheme = body.getAttribute('data-pc-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            
            body.setAttribute('data-pc-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateIcon(newTheme);
        });

        function updateIcon(theme) {
            if(theme === 'dark') {
                toggleIcon.classList.remove('ti-moon');
                toggleIcon.classList.add('ti-sun');
            } else {
                toggleIcon.classList.remove('ti-sun');
                toggleIcon.classList.add('ti-moon');
            }
        }

        // Global AJAX Delete Logic
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-delete-ajax').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    if(confirm('Bạn có chắc chắn muốn xóa mục này không?')) {
                        const url = this.getAttribute('data-url');
                        const row = this.closest('tr') || this.closest('.item-row');
                        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        
                        fetch(url, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': token,
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            }
                        }).then(response => {
                            if(response.ok) {
                                row.style.transition = "all 0.5s ease";
                                row.style.opacity = 0;
                                row.style.transform = "scale(0.9)";
                                setTimeout(() => row.remove(), 500);
                            } else {
                                alert('Có lỗi xảy ra khi xóa!');
                            }
                        }).catch(err => {
                            console.error(err);
                            alert('Lỗi kết nối khi xóa!');
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
