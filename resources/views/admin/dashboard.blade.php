@extends('admin.layouts.app')

@section('title', 'Dashboard | Admin Panel')

@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Hello, Admin!</h5>
            </div>
            <div class="card-body">
                <p>Welcome to your new admin panel. The template assets (CSS/JS/Images) have been successfully linked.</p>
                
                <div class="row text-center mt-4">
                    <div class="col-md-4">
                        <div class="stat-card">
                            <h3 class="text-primary mb-2"><i class="fa-solid fa-users"></i> 1.250</h3>
                            <span class="text-muted fw-medium">Tổng người dùng</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-card">
                            <h3 class="text-success mb-2"><i class="fa-solid fa-cart-shopping"></i> 340</h3>
                            <span class="text-muted fw-medium">Đơn hàng mới</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-card">
                            <h3 class="text-warning mb-2"><i class="fa-solid fa-sack-dollar"></i> 5.240 VNĐ</h3>
                            <span class="text-muted fw-medium">Doanh thu</span>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Thống kê lượt truy cập & Doanh thu (7 ngày qua)</h5>
                            </div>
                            <div class="card-body">
                                <div id="dashboard-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var options = {
            series: [{
                name: 'Lượt truy cập',
                type: 'column',
                data: {!! json_encode($visitorCounts) !!}
            }, {
                name: 'Doanh thu (VNĐ)',
                type: 'line',
                data: {!! json_encode($expenseAmounts) !!}
            }],
            chart: {
                height: 350,
                type: 'line',
                toolbar: { show: false }
            },
            stroke: {
                width: [0, 4]
            },
            title: {
                text: 'Biểu đồ kết hợp'
            },
            dataLabels: {
                enabled: true,
                enabledOnSeries: [1]
            },
            labels: {!! json_encode($visitorDates) !!},
            xaxis: {
                type: 'category'
            },
            yaxis: [{
                title: { text: 'Lượt truy cập' },
            }, {
                opposite: true,
                title: { text: 'Doanh thu' }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#dashboard-chart"), options);
        chart.render();
    });
</script>
@endpush
