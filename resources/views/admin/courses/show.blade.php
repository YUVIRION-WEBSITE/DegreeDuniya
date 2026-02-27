@extends('components.layouts.admin-layout')

@section('title', 'View Course')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm animate-slide-in">
                <div class="card-header bg-secondary text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $course->name }}</h4>
                    <a href="{{ route('admin.courses.index') }}" class="btn btn-primary">Back to Courses</a>
                </div>
                <div class="card-body">
                    @if ($course->image_path)
                        <div class="mb-3 text-center">
                            <img src="{{ Storage::url($course->image_path) }}" alt="{{ $course->name }} Image" class="img-fluid rounded" style="max-width: 200px;">
                        </div>
                    @endif
                    <div class="mb-3">
                        <strong>Name:</strong> {{ $course->name }}
                    </div>
                    <div class="mb-3">
                        <strong>University:</strong> {{ $course->university->name ?? 'N/A' }}
                    </div>
                    <div class="mb-3">
                        <strong>College:</strong> {{ $course->college->name ?? 'N/A' }}
                    </div>
                    <div class="mb-3">
                        <strong>Description:</strong> {{ $course->description }}
                    </div>
                    <div class="mb-3">
                        <strong>Duration:</strong> {{ $course->duration }}
                    </div>
                    <div class="mb-3">
                        <strong>Fees:</strong> {{ number_format($course->fees, 2) }}
                    </div>
                    <div class="mb-3">
                        <strong>Eligibility:</strong> {{ $course->eligibility }}
                    </div>
                    <div class="mb-3">
                        <strong>Scope:</strong> {{ $course->scope }}
                    </div>
                    <div class="mb-3">
                        <strong>Students:</strong>
                        @if ($students->isEmpty())
                            <p class="text-muted">No students enrolled.</p>
                        @else
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email ?? 'N/A' }}</td>
                                            <td>
                                                <a href="{{ route('admin.students.show', $student) }}" class="btn btn-sm btn-outline-primary">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $students->links('pagination::bootstrap-5') }}
                            </div>
                        @endif
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-outline-primary me-2">Edit</a>
                        <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this course?');">
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