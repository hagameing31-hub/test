@extends('admin.layouts.app')

@section('title', 'Services | Admin Panel')
@section('page-title', 'Services Management')

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
                <h5>All Services</h5>
                <a href="{{ route('admin.services.create') }}" class="btn btn-primary btn-sm">
                    <i class="ti ti-plus"></i> Add New Service
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Icon</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($services as $service)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><i class="{{ $service->icon }} fs-4 text-primary"></i></td>
                                    <td>{{ $service->title }}</td>
                                    <td>{{ Str::limit($service->description, 50) }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-light-primary">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-light-danger btn-delete-ajax" data-url="{{ route('admin.services.destroy', $service->id) }}">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">No services found.</td>
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
