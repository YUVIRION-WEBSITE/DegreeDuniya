<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public function index(Request $request)
    {
        $query = College::with('university');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhereHas('university', function ($uq) use ($search) {
                        $uq->where('name', 'like', "%{$search}%")
                            ->orWhere('location', 'like', "%{$search}%");
                    });
            });
        }

        // Type Filter (via University)
        if ($request->filled('type')) {
            $type = $request->type;
            $query->whereHas('university', function ($uq) use ($type) {
                $uq->where('type', $type);
            });
        }

        // Sort By
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'rating_desc':
                    // We join with universities to sort by rating
                    $query->select('colleges.*')
                        ->leftJoin('universities', 'colleges.university_id', '=', 'universities.id')
                        ->orderBy('universities.rating', 'desc');
                    break;
            }
        } else {
            // Default sort
            $query->orderBy('name', 'asc');
        }

        $colleges = $query->paginate(12)->withQueryString();

        return view('public.colleges', compact('colleges'));
    }

    public function show($slug)
    {
        $college = College::with('courses')->where('slug', $slug)->firstOrFail();
        return view('public.college-detail', compact('college'));
    }
}