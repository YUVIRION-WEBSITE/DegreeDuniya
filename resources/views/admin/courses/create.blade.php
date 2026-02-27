@extends('components.layouts.admin-layout')

@section('title', 'Add Course')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm animate-slide-in">
                <div class="card-header bg-secondary text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Add New Course</h4>
                    <a href="{{ route('admin.courses.index') }}" class="btn btn-primary">Back to Courses</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="university_id" class="form-label">University</label>
                            <select name="university_id" id="university_id" class="form-control" required>
                                <option value="">Select University</option>
                                @if ($universities->isNotEmpty())
                                    @foreach ($universities as $university)
                                        <option value="{{ $university->id }}" {{ old('university_id') == $university->id ? 'selected' : '' }}>{{ $university->name }}</option>
                                    @endforeach
                                @else
                                    <option value="" disabled>No universities available</option>
                                @endif
                            </select>
                            @error('university_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="college_id" class="form-label">College</label>
                            <select name="college_id" id="college_id" class="form-control" required>
                                <option value="">Select College</option>
                                @if ($colleges->isNotEmpty())
                                    @foreach ($colleges as $college)
                                        <option value="{{ $college->id }}" {{ old('college_id') == $college->id ? 'selected' : '' }}>{{ $college->name }}</option>
                                    @endforeach
                                @else
                                    <option value="" disabled>No colleges available</option>
                                @endif
                            </select>
                            @error('college_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="text" name="duration" id="duration" class="form-control" value="{{ old('duration') }}" required>
                            @error('duration')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="fees" class="form-label">Fees</label>
                            <input type="number" name="fees" id="fees" class="form-control" value="{{ old('fees') }}" step="0.01" min="0" required>
                            @error('fees')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="eligibility" class="form-label">Eligibility</label>
                            <textarea name="eligibility" id="eligibility" class="form-control" rows="4" required>{{ old('eligibility') }}</textarea>
                            @error('eligibility')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="scope" class="form-label">Scope</label>
                            <textarea name="scope" id="scope" class="form-control" rows="4" required>{{ old('scope') }}</textarea>
                            @error('scope')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Create Course</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection