@extends('components.layouts.admin-layout')

@section('title', 'View Enquiry')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm animate-slide-in">
                <div class="card-header bg-secondary text-dark d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $enquiry->name }}'s Enquiry</h4>
                    <a href="{{ route('admin.enquiries.index') }}" class="btn btn-primary">Back to Enquiries</a>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Name:</strong> {{ $enquiry->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong> {{ $enquiry->email }}
                    </div>
                    <div class="mb-3">
                        <strong>Phone:</strong> {{ $enquiry->phone }}
                    </div>
                    <div class="mb-3">
                        <strong>University:</strong> {{ $enquiry->university->name ?? 'N/A' }}
                    </div>
                    <div class="mb-3">
                        <strong>College:</strong> {{ $enquiry->college->name ?? 'N/A' }}
                    </div>
                    <div class="mb-3">
                        <strong>Course:</strong> {{ $enquiry->course->name ?? 'N/A' }}
                    </div>
                    <div class="mb-3">
                        <strong>Message:</strong> {!! nl2br(e($enquiry->message)) !!}
                    </div>
                    <div class="mb-3">
                        <strong>Status:</strong> {{ $enquiry->status ?? 'N/A' }}
                    </div>
                    <div class="d-flex justify-content-end">
                        <form action="{{ route('admin.enquiries.destroy', $enquiry) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this enquiry?');">
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