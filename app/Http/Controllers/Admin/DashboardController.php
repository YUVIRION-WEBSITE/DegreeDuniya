<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use App\Models\College;
use App\Models\Course;
use App\Models\Student;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'universities' => University::count(),
            'colleges' => College::count(),
            'courses' => Course::count(),
            'students' => Student::count(),
            'enquiries' => Enquiry::count(),
        ];
        return view('admin.dashboard', compact('stats'));
    }
}