@extends('components.layouts.admin-layout')

@section('title', 'Edit University')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm animate-slide-in">
                <div class="card-header bg-secondary text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit University</h4>
                    <a href="{{ route('admin.universities.index') }}" class="btn btn-outline-secondary">Back to Universities</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.universities.update', $university) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $university->name) }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $university->location) }}" required>
                            @error('location')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="government" {{ old('type', $university->type) == 'government' ? 'selected' : '' }}>Government</option>
                                <option value="private" {{ old('type', $university->type) == 'private' ? 'selected' : '' }}>Private</option>
                            </select>
                            @error('type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $university->description) }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="vision" class="form-label">Vision</label>
                            <textarea name="vision" id="vision" class="form-control" rows="4" required>{{ old('vision', $university->vision) }}</textarea>
                            @error('vision')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="mission" class="form-label">Mission</label>
                            <textarea name="mission" id="mission" class="form-control" rows="4" required>{{ old('mission', $university->mission) }}</textarea>
                            @error('mission')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control" accept="image/*">
                            @if ($university->logo_path)
                                <div class="mt-2">
                                    <img src="{{ Storage::url($university->logo_path) }}" alt="{{ $university->name }} Logo" class="img-fluid rounded" style="max-width: 150px;">
                                </div>
                            @endif
                            @error('logo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update University</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection