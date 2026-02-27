@extends('components.layouts.admin-layout')

@section('title', 'Enquiries')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm animate-slide-in">
                <div class="card-header bg-secondary text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Enquiries</h4>
                </div>
                <div class="card-body">
                    @if ($enquiries->isEmpty())
                        <p class="text-muted">No enquiries found.</p>
                    @else
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>University</th>
                                    <th>College</th>
                                    <th>Course</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($enquiries as $enquiry)
                                    <tr>
                                        <td>{{ $enquiry->name }}</td>
                                        <td>{{ $enquiry->email }}</td>
                                        <td>{{ $enquiry->phone }}</td>
                                        <td>{{ $enquiry->university->name ?? 'N/A' }}</td>
                                        <td>{{ $enquiry->college->name ?? 'N/A' }}</td>
                                        <td>{{ $enquiry->course->name ?? 'N/A' }}</td>
                                        <td>{{ $enquiry->status ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('admin.enquiries.show', $enquiry) }}" class="btn btn-sm btn-outline-primary">View</a>
                                            <form action="{{ route('admin.enquiries.destroy', $enquiry) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this enquiry?');">
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
                            {{ $enquiries->links('pagination::bootstrap-5') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection