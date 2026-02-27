@extends('components.layouts.admin-layout')

@section('title', 'Colleges')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm animate-slide-in">
                <div class="card-header bg-secondary text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Colleges</h4>
                    <a href="{{ route('admin.colleges.create') }}" class="btn btn-primary">Add College</a>
                </div>
                <div class="card-body">
                    @if ($colleges->isEmpty())
                        <p class="text-muted">No colleges found.</p>
                    @else
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>University</th>
                                    <th>Tagline</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colleges as $college)
                                    <tr>
                                        <td>{{ $college->name }}</td>
                                        <td>{{ $college->university->name ?? 'N/A' }}</td>
                                        <td>{{ $college->tagline }}</td>
                                        <td>
                                            <a href="{{ route('admin.colleges.show', $college) }}" class="btn btn-sm btn-outline-primary">View</a>
                                            <a href="{{ route('admin.colleges.edit', $college) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                            <form action="{{ route('admin.colleges.destroy', $college) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this college?');">
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
                            {{ $colleges->links('pagination::bootstrap-5') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection