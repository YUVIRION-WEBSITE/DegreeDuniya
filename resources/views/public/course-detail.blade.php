@extends('components.layouts.public-layout')

@section('title', '{{ $course->name }} - EduConnect')

@section('content')
    <!-- Hero Section -->
    <section class="relative flex min-h-[40vh] items-center justify-center bg-cover bg-center py-12 text-white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4) 0%, rgba(0, 0, 0, 0.6) 100%), url('{{ $course->image_path ?: 'https://via.placeholder.com/300' }}');">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold tracking-tight sm:text-5xl">{{ $course->name }}</h1>
            <p class="mt-2 text-lg text-gray-200">{{ $course->duration ?? 'Duration not available' }}</p>
        </div>
    </section>

    <!-- Course Details -->
    <section class="py-16 sm:py-20">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8">
                <div class="group flex flex-col gap-4 overflow-hidden rounded-lg bg-white dark:bg-background-dark shadow-md">
                    <div class="p-4">
                        <h3 class="font-bold text-gray-900 dark:text-white">Description</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $course->description ?? 'No description available.' }}</p>
                    </div>
                </div>
                <div class="group flex flex-col gap-4 overflow-hidden rounded-lg bg-white dark:bg-background-dark shadow-md">
                    <div class="p-4">
                        <h3 class="font-bold text-gray-900 dark:text-white">Eligibility</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $course->eligibility ?? 'No eligibility details available.' }}</p>
                    </div>
                </div>
                <div class="group flex flex-col gap-4 overflow-hidden rounded-lg bg-white dark:bg-background-dark shadow-md">
                    <div class="p-4">
                        <h3 class="font-bold text-gray-900 dark:text-white">Scope</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $course->scope ?? 'No scope details available.' }}</p>
                    </div>
                </div>
                <div class="group flex flex-col gap-4 overflow-hidden rounded-lg bg-white dark:bg-background-dark shadow-md">
                    <div class="p-4">
                        <h3 class="font-bold text-gray-900 dark:text-white">Fees</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $course->fees ? '₹' . number_format($course->fees, 2) : 'Not specified' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection