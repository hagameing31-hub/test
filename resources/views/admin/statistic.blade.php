@extends('layouts.admin')

@section('title', 'Admin Thống kê')
@section('header_title', 'Bảng Thống Kê (Statistic)')

@push('styles')
<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.04);
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        background: #e0e7ff;
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
    }

    .stat-info h3 {
        font-size: 1.8rem;
        margin-bottom: 5px;
        color: var(--text-dark);
    }

    .stat-info p {
        color: var(--text-muted);
        font-size: 0.9rem;
        font-weight: 500;
    }
</style>
@endpush

@section('content')
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon"><i class="fa-solid fa-code"></i></div>
            <div class="stat-info">
                <h3>{{ $skillCount }}</h3>
                <p>Kỹ Năng Đã Thêm</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: #dcfce7; color: #16a34a;"><i class="fa-solid fa-briefcase"></i></div>
            <div class="stat-info">
                <h3>{{ $experienceCount }}</h3>
                <p>Kinh Nghiệm</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: #fee2e2; color: #ef4444;"><i class="fa-solid fa-folder-open"></i></div>
            <div class="stat-info">
                <h3>{{ $projectCount }}</h3>
                <p>Dự Án Đã Làm</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: #fef9c3; color: #ca8a04;"><i class="fa-solid fa-eye"></i></div>
            <div class="stat-info">
                <h3>{{ number_format($viewCount) }}</h3>
                <p>Lượt Xem Profile</p>
            </div>
        </div>
    </div>

    <div class="card">
        <h3 style="margin-bottom: 15px;">Hoạt động gần đây</h3>
        <table>
            <thead>
                <tr>
                    <th>Hành động</th>
                    <th>Chi tiết</th>
                    <th>Thời gian</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><span style="color: #16a34a; font-weight: 600;">Thêm mới</span></td>
                    <td>Thêm dự án "Todo List App"</td>
                    <td>2 giờ trước</td>
                </tr>
                <tr>
                    <td><span style="color: var(--primary); font-weight: 600;">Cập nhật</span></td>
                    <td>Cập nhật kinh nghiệm làm việc "Freelancer"</td>
                    <td>Hôm qua</td>
                </tr>
                <tr>
                    <td><span style="color: #ef4444; font-weight: 600;">Xóa</span></td>
                    <td>Xóa kỹ năng "C++"</td>
                    <td>3 ngày trước</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
