@extends('components.layouts.admin-layout')

@section('title', 'View University')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm animate-slide-in">
                <div class="card-header bg-secondary text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $university->name }}</h4>
                    <a href="{{ route('admin.universities.index') }}" class="btn btn-outline-secondary">Back to Universities</a>
                </div>
                <div class="card-body">
                    @if ($university->logo_path)
                        <div class="mb-3 text-center">
                            <img src="{{ Storage::url($university->logo_path) }}" alt="{{ $university->name }} Logo" class="img-fluid rounded" style="max-width: 200px;">
                        </div>
                    @endif
                    <div class="mb-3">
                        <strong>Name:</strong> {{ $university->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Location:</strong> {{ $university->location }}
                    </div>
                    <div class="mb-3">
                        <strong>Type:</strong> {{ ucfirst($university->type) }}
                    </div>
                    <div class="mb-3">
                        <strong>Description:</strong> {{ $university->description }}
                    </div>
                    <div class="mb-3">
                        <strong>Vision:</strong> {{ $university->vision }}
                    </div>
                    <div class="mb-3">
                        <strong>Mission:</strong> {{ $university->mission }}
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.universities.edit', $university) }}" class="btn btn-outline-primary me-2">Edit</a>
                        <form action="{{ route('admin.universities.destroy', $university) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this university?');">
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