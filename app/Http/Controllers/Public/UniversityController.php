<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\University;

class UniversityController extends Controller
{
    public function index()
    {
        $universities = University::paginate(10);
        return view('public.universities', compact('universities'));
    }

    public function show($slug)
    {
        $university = University::with('colleges')->where('slug', $slug)->firstOrFail();
        return view('public.university-detail', compact('university'));
    }
}