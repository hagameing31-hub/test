@extends('admin.layouts.app')

@section('title', 'Record Expense | Admin Panel')
@section('page-title', 'Record New Expense')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Expense Details</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.expenses.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Expense Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                            @error('title')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category <span class="text-danger">*</span></label>
                            <input type="text" name="category" class="form-control" value="{{ old('category') }}" placeholder="e.g. Salary, Utilities, Marketing" required>
                            @error('category')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Amount (VNĐ) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="amount" class="form-control" value="{{ old('amount') }}" required>
                            @error('amount')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date <span class="text-danger">*</span></label>
                            <input type="date" name="expense_date" class="form-control" value="{{ old('expense_date') }}" required>
                            @error('expense_date')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                            @error('description')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="text-end mt-4">
                        <a href="{{ route('admin.expenses.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Record Expense</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
