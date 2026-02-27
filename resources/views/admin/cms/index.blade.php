@extends('components.layouts.admin-layout')

@section('title', 'CMS Content')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm animate-slide-in">
                <div class="card-header bg-secondary text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">CMS Content</h4>
                    <a href="{{ route('admin.cms.create') }}" class="btn btn-primary">Add Content</a>
                </div>
                <div class="card-body">
                    @if ($cms->isEmpty())
                        <p class="text-muted">No content found.</p>
                    @else
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cms as $cm)
                                    <tr>
                                        <td>{{ $cm->title }}</td>
                                        <td>{{ $cm->slug }}</td>
                                        <td>{{ $cm->status ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('admin.cms.show', $cm) }}" class="btn btn-sm btn-outline-primary">View</a>
                                            <a href="{{ route('admin.cms.edit', $cm) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                            <form action="{{ route('admin.cms.destroy', $cm) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this content?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $cms->links('pagination::bootstrap-5') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection