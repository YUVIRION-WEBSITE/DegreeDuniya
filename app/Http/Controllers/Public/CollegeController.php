<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\College;

class CollegeController extends Controller
{
    public function index()
    {
        $colleges = College::paginate(10);
        return view('public.colleges', compact('colleges'));
    }

    public function show($slug)
    {
        $college = College::with('courses')->where('slug', $slug)->firstOrFail();
        return view('public.college-detail', compact('college'));
    }
}