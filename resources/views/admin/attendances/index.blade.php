@extends('admin.layouts.app')

@section('title', 'Attendance | Admin Panel')
@section('page-title', 'Attendance Tracking')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Bảng Chấm Công - Tháng {{ $month }}/{{ $year }}</h5>
                <form action="{{ route('admin.attendances.index') }}" method="GET" class="d-flex">
                    <select name="month" class="form-select form-select-sm me-2" style="width: auto;">
                        @for($i = 1; $i <= 12; $i++)
                            <option value="{{ sprintf('%02d', $i) }}" {{ $month == sprintf('%02d', $i) ? 'selected' : '' }}>Tháng {{ $i }}</option>
                        @endfor
                    </select>
                    <select name="year" class="form-select form-select-sm me-2" style="width: auto;">
                        @for($i = date('Y') - 1; $i <= date('Y') + 1; $i++)
                            <option value="{{ $i }}" {{ $year == $i ? 'selected' : '' }}>Năm {{ $i }}</option>
                        @endfor
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm">Xem</button>
                </form>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive" style="max-height: 600px;">
                    <table class="table table-bordered table-hover mb-0 text-center align-middle" style="min-width: 1500px;">
                        <thead class="table-light sticky-top">
                            <tr>
                                <th class="text-start sticky-start bg-light" style="min-width: 200px; left: 0; position: sticky; z-index: 2;">Nhân viên</th>
                                @for($d = 1; $d <= $daysInMonth; $d++)
                                    <th>{{ $d }}</th>
                                @endfor
                                <th class="bg-light fw-bold sticky-end" style="min-width: 100px; right: 0; position: sticky; z-index: 2;">Tổng công</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                                @php
                                    // Map attendances by day
                                    $attMap = [];
                                    $totalWork = 0;
                                    foreach($employee->attendances as $att) {
                                        $day = (int)date('d', strtotime($att->date));
                                        $attMap[$day] = $att->status;
                                        if ($att->status == 'X') {
                                            $totalWork += 1;
                                        } elseif ($att->status == 'M') {
                                            $totalWork += 0.5; // Đi muộn tính nửa công (ví dụ)
                                        }
                                    }
                                @endphp
                                <tr>
                                    <td class="text-start sticky-start bg-white" style="left: 0; position: sticky; z-index: 1;">
                                        <strong>{{ $employee->name }}</strong><br>
                                        <small class="text-muted">{{ $employee->position }}</small>
                                    </td>
                                    
                                    @for($d = 1; $d <= $daysInMonth; $d++)
                                        @php
                                            $status = $attMap[$d] ?? '';
                                            $bgClass = '';
                                            $textClass = '';
                                            if($status == 'X') {
                                                $bgClass = 'bg-light-success';
                                                $textClass = 'text-success fw-bold';
                                            } elseif($status == 'M') {
                                                $bgClass = 'bg-light-warning';
                                                $textClass = 'text-warning fw-bold';
                                            } elseif($status == 'P') {
                                                $bgClass = 'bg-light-danger';
                                                $textClass = 'text-danger fw-bold';
                                            }
                                        @endphp
                                        <td class="{{ $bgClass }} {{ $textClass }} p-1" style="width: 40px;" title="{{ $d }}/{{ $month }}/{{ $year }}">
                                            {{ $status }}
                                        </td>
                                    @endfor
                                    
                                    <td class="bg-white fw-bold sticky-end" style="right: 0; position: sticky; z-index: 1; font-size: 16px;">
                                        {{ $totalWork }}
                                    </td>
                                </tr>
                            @endforeach
                            @if($employees->isEmpty())
                                <tr>
                                    <td colspan="{{ $daysInMonth + 2 }}" class="text-muted py-4">Chưa có dữ liệu nhân viên.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="p-3 bg-light mt-0 border-top">
                    <strong>Chú thích:</strong> 
                    <span class="badge bg-light-success text-success border me-2">X: Đi làm (1 công)</span>
                    <span class="badge bg-light-warning text-warning border me-2">M: Đi muộn (0.5 công)</span>
                    <span class="badge bg-light-danger text-danger border">P: Nghỉ phép (0 công)</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
