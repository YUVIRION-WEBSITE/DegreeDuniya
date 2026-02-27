@extends('components.layouts.admin-layout')

@section('title', 'View College')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm animate-slide-in">
                <div class="card-header bg-secondary text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $college->name }}</h4>
                    <a href="{{ route('admin.colleges.index') }}" class="btn btn-primary">Back to Colleges</a>
                </div>
                <div class="card-body">
                    @if ($college->logo_path)
                        <div class="mb-3 text-center">
                            <img src="{{ Storage::url($college->logo_path) }}" alt="{{ $college->name }} Logo" class="img-fluid rounded" style="max-width: 200px;">
                        </div>
                    @endif
                    <div class="mb-3">
                        <strong>Name:</strong> {{ $college->name }}
                    </div>
                    <div class="mb-3">
                        <strong>University:</strong> {{ $college->university->name ?? 'N/A' }}
                    </div>
                    <div class="mb-3">
                        <strong>Tagline:</strong> {{ $college->tagline }}
                    </div>
                    <div class="mb-3">
                        <strong>Description:</strong> {{ $college->description }}
                    </div>
                    <div class="mb-3">
                        <strong>Facilities:</strong>
                        @if ($college->facilities)
                            <ul>
                                @foreach ($college->facilities as $facility)
                                    <li>{{ $facility }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">No facilities listed.</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <strong>Courses:</strong>
                        @if ($courses->isEmpty())
                            <p class="text-muted">No courses found.</p>
                        @else
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Duration</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td>{{ $course->name }}</td>
                                            <td>{{ $course->duration ?? 'N/A' }}</td>
                                            <td>
                                                <a href="{{ route('admin.courses.show', $course) }}" class="btn btn-sm btn-outline-primary">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $courses->links('pagination::bootstrap-5') }}
                            </div>
                        @endif
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.colleges.edit', $college) }}" class="btn btn-outline-primary me-2">Edit</a>
                        <form action="{{ route('admin.colleges.destroy', $college) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this college?');">
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