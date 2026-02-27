<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCourseRequest;
use App\Http\Requests\Admin\UpdateCourseRequest;
use App\Models\Course;
use App\Models\University;
use App\Models\College;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    

    public function create()
    {
        $universities = University::all();
        $colleges = College::all();
        return view('admin.courses.create', compact('universities', 'colleges'));
    }

    public function store(StoreCourseRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('courses', 'public');
        }
        Course::create($data);
        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }
 public function show(Course $course)
    {
        $students = $course->students()->paginate(5); // Paginate 5 students per page
        return view('admin.courses.show', compact('course', 'students'));
    }


    public function edit(Course $course)
    {
        $universities = University::all();
        $colleges = College::all();
        return view('admin.courses.edit', compact('course', 'universities', 'colleges'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            if ($course->image_path) {
                Storage::delete($course->image_path);
            }
            $data['image_path'] = $request->file('image')->store('courses', 'public');
        }
        $course->update($data);
        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        if ($course->image_path) {
            Storage::delete($course->image_path);
        }
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }
}