@extends('components.layouts.admin-layout')

@section('title', 'Edit College')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm animate-slide-in">
                <div class="card-header bg-secondary text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit College</h4>
                    <a href="{{ route('admin.colleges.index') }}" class="btn btn-primary">Back to Colleges</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.colleges.update', $college) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="university_id" class="form-label">University</label>
                            <select name="university_id" id="university_id" class="form-control" required>
                                <option value="">Select University</option>
                                @if ($universities->isNotEmpty())
                                    @foreach ($universities as $university)
                                        <option value="{{ $university->id }}" {{ old('university_id', $college->university_id) == $university->id ? 'selected' : '' }}>{{ $university->name }}</option>
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
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $college->name) }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tagline" class="form-label">Tagline</label>
                            <input type="text" name="tagline" id="tagline" class="form-control" value="{{ old('tagline', $college->tagline) }}" required>
                            @error('tagline')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $college->description) }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="facilities" class="form-label">Facilities (Add multiple)</label>
                            <div id="facilities-container">
                                @forelse (old('facilities', $college->facilities ?? []) as $facility)
                                    <div class="input-group mb-2">
                                        <input type="text" name="facilities[]" class="form-control" value="{{ $facility }}">
                                        <button type="button" class="btn btn-outline-danger remove-facility">Remove</button>
                                    </div>
                                @empty
                                    <div class="input-group mb-2">
                                        <input type="text" name="facilities[]" class="form-control">
                                        <button type="button" class="btn btn-outline-danger remove-facility">Remove</button>
                                    </div>
                                @endforelse
                            </div>
                            <button type="button" class="btn btn-outline-primary mt-2" id="add-facility">Add Facility</button>
                            @error('facilities.*')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control" accept="image/*">
                            @if ($college->logo_path)
                                <div class="mt-2">
                                    <img src="{{ Storage::url($college->logo_path) }}" alt="{{ $college->name }} Logo" class="img-fluid rounded" style="max-width: 150px;">
                                </div>
                            @endif
                            @error('logo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update College</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addFacilityBtn = document.getElementById('add-facility');
        const facilitiesContainer = document.getElementById('facilities-container');

        if (addFacilityBtn && facilitiesContainer) {
            addFacilityBtn.addEventListener('click', function () {
                const newInput = document.createElement('div');
                newInput.className = 'input-group mb-2';
                newInput.innerHTML = `
                    <input type="text" name="facilities[]" class="form-control">
                    <button type="button" class="btn btn-outline-danger remove-facility">Remove</button>
                `;
                facilitiesContainer.appendChild(newInput);
            });

            facilitiesContainer.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-facility')) {
                    if (facilitiesContainer.querySelectorAll('.input-group').length > 1) {
                        e.target.closest('.input-group').remove();
                    }
                }
            });
        }
    });
</script>
@endsection