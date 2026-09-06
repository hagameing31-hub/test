@extends('admin.layouts.app')

@section('title', 'Employees | Admin Panel')
@section('page-title', 'HR Management - Employees')

@section('content')
<div class="row">
    <div class="col-sm-12">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>All Employees</h5>
                <a href="{{ route('admin.employees.create') }}" class="btn btn-primary btn-sm">
                    <i class="ti ti-plus"></i> Add New Employee
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Salary</th>
                                <th>Join Date</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($employees as $employee)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $employee->name }}<br><small class="text-muted">{{ $employee->email }} / {{ $employee->phone }}</small></td>
                                    <td><span class="badge bg-light-primary text-primary">{{ $employee->position }}</span></td>
                                    <td>{{ number_format($employee->salary, 0, ',', '.') }} VNĐ</td>
                                    <td>{{ \Carbon\Carbon::parse($employee->join_date)->format('d/m/Y') }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.employees.edit', $employee->id) }}" class="btn btn-sm btn-light-primary">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-light-danger btn-delete-ajax" data-url="{{ route('admin.employees.destroy', $employee->id) }}">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">No employees found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
