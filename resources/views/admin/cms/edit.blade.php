@extends('components.layouts.admin-layout')

@section('title', 'Edit CMS Content')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm animate-slide-in">
                <div class="card-header bg-secondary text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit Content</h4>
                    <a href="{{ route('admin.cms.index') }}" class="btn btn-primary">Back to CMS</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.cms.update', $cm) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $cm->title) }}" required>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $cm->slug) }}" required>
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" id="content" class="form-control" rows="6" required>{{ old('content', $cm->content) }}</textarea>
                            @error('content')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="draft" {{ old('status', $cm->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status', $cm->status) == 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                            @if ($cm->image_path)
                                <div class="mt-2">
                                    <img src="{{ Storage::url($cm->image_path) }}" alt="{{ $cm->title }} Image" class="img-fluid rounded" style="max-width: 150px;">
                                </div>
                            @endif
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update Content</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection