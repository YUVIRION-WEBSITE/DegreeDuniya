@extends('components.layouts.admin-layout')

@section('title', 'View CMS Content')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm animate-slide-in">
                <div class="card-header bg-secondary text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $cm->title }}</h4>
                    <a href="{{ route('admin.cms.index') }}" class="btn btn-primary">Back to CMS</a>
                </div>
                <div class="card-body">
                    @if ($cm->image_path)
                        <div class="mb-3 text-center">
                            <img src="{{ Storage::url($cm->image_path) }}" alt="{{ $cm->title }} Image" class="img-fluid rounded" style="max-width: 200px;">
                        </div>
                    @endif
                    <div class="mb-3">
                        <strong>Title:</strong> {{ $cm->title }}
                    </div>
                    <div class="mb-3">
                        <strong>Slug:</strong> {{ $cm->slug }}
                    </div>
                    <div class="mb-3">
                        <strong>Content:</strong> {!! nl2br(e($cm->content)) !!}
                    </div>
                    <div class="mb-3">
                        <strong>Status:</strong> {{ $cm->status ?? 'N/A' }}
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.cms.edit', $cm) }}" class="btn btn-outline-primary me-2">Edit</a>
                        <form action="{{ route('admin.cms.destroy', $cm) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this content?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection