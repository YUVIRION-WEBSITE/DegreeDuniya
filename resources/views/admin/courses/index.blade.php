@extends('components.layouts.admin-layout')

@section('title', 'Courses')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm animate-slide-in">
                <div class="card-header bg-secondary text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Courses</h4>
                    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">Add Course</a>
                </div>
                <div class="card-body">
                    @if ($courses->isEmpty())
                        <p class="text-muted">No courses found.</p>
                    @else
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>University</th>
                                    <th>College</th>
                                    <th>Duration</th>
                                    <th>Fees</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>{{ $course->name }}</td>
                                        <td>{{ $course->university->name ?? 'N/A' }}</td>
                                        <td>{{ $course->college->name ?? 'N/A' }}</td>
                                        <td>{{ $course->duration }}</td>
                                        <td>{{ number_format($course->fees, 2) }}</td>
                                        <td>
                                            <a href="{{ route('admin.courses.show', $course) }}" class="btn btn-sm btn-outline-primary">View</a>
                                            <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                            <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this course?');">
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
                            {{ $courses->links('pagination::bootstrap-5') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection