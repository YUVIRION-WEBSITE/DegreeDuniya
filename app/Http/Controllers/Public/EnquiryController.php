<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Public\StoreEnquiryRequest;
use App\Models\Enquiry;
use App\Models\University;
use App\Models\College;
use App\Models\Course;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function create()
    {
        $universities = University::with('colleges')->get();
        return view('public.enquiry', compact('universities'));
    }

    public function store(StoreEnquiryRequest $request)
    {
        Enquiry::create($request->validated());
        return redirect()->route('public.enquiry.create')->with('success', 'Enquiry submitted successfully.');
    }

    public function getColleges($universityId)
    {
        $colleges = College::where('university_id', $universityId)->get(['id', 'name']);
        return response()->json($colleges);
    }

    public function getCourses($collegeId)
    {
        $courses = Course::where('college_id', $collegeId)->get(['id', 'name']);
        return response()->json($courses);
    }
}