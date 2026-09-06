@extends('admin.layouts.app')

@section('title', 'Experiences | Admin Panel')
@section('page-title', 'Experiences Management')

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
                <h5>All Experiences</h5>
                <a href="{{ route('admin.experiences.create') }}" class="btn btn-primary btn-sm">
                    <i class="ti ti-plus"></i> Add New Experience
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Year</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($experiences as $experience)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><span class="badge bg-light-primary text-primary">{{ $experience->year }}</span></td>
                                    <td>{{ $experience->title }}</td>
                                    <td>{{ Str::limit($experience->description, 50) }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.experiences.edit', $experience->id) }}" class="btn btn-sm btn-light-primary">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-light-danger btn-delete-ajax" data-url="{{ route('admin.experiences.destroy', $experience->id) }}">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">No experiences found.</td>
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
