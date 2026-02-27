@extends('components.layouts.admin-layout')

@section('title', 'Universities')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm animate-slide-in">
                <div class="card-header bg-secondary text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Universities</h4>
                    <a href="{{ route('admin.universities.create') }}" class="btn btn-primary">Add University</a>
                </div>
                <div class="card-body">
                    @if ($universities->isEmpty())
                        <p class="text-muted">No universities found.</p>
                    @else
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($universities as $university)
                                    <tr>
                                        <td>{{ $university->name }}</td>
                                        <td>{{ $university->location }}</td>
                                        <td>{{ ucfirst($university->type) }}</td>
                                        <td>
                                            <a href="{{ route('admin.universities.show', $university) }}" class="btn btn-sm btn-outline-primary">View</a>
                                            <a href="{{ route('admin.universities.edit', $university) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                            <form action="{{ route('admin.universities.destroy', $university) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this university?');">
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
                            {{ $universities->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection