@extends('admin.layouts.app')

@section('title', 'Expenses | Admin Panel')
@section('page-title', 'Business Expenses')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- Overview Widget -->
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <i class="fa-solid fa-wallet fa-3x opacity-50"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-white mb-0">Total Expenses Overview</h6>
                        <h2 class="text-white mb-0 mt-2">{{ number_format($totalExpense ?? 0, 0, ',', '.') }} VNĐ</h2>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>All Expenses</h5>
                <a href="{{ route('admin.expenses.create') }}" class="btn btn-primary btn-sm">
                    <i class="ti ti-plus"></i> Record New Expense
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($expenses as $expense)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($expense->expense_date)->format('d/m/Y') }}</td>
                                    <td>{{ $expense->title }}<br><small class="text-muted">{{ Str::limit($expense->description, 30) }}</small></td>
                                    <td><span class="badge bg-light-secondary text-secondary">{{ $expense->category }}</span></td>
                                    <td class="text-danger font-weight-bold">-{{ number_format($expense->amount, 0, ',', '.') }} VNĐ</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.expenses.edit', $expense->id) }}" class="btn btn-sm btn-light-primary">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-light-danger btn-delete-ajax" data-url="{{ route('admin.expenses.destroy', $expense->id) }}">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">No expenses recorded yet.</td>
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
