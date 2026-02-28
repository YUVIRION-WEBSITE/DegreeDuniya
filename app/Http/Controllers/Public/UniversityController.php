<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\University;

class UniversityController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $query = University::query();

        $query->when($request->filled('search'), function ($q) use ($request) {
            $searchTerm = '%' . $request->search . '%';
            $q->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', $searchTerm)
                    ->orWhere('location', 'like', $searchTerm);
            });
        });

        $query->when($request->filled('type'), function ($q) use ($request) {
            $q->whereIn('type', (array) $request->type);
        });

        $sort = $request->input('sort', 'name_asc');
        switch ($sort) {
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'rating_desc':
                $query->orderBy('rating', 'desc');
                break;
            case 'name_asc':
            default:
                $query->orderBy('name', 'asc');
                break;
        }

        $universities = $query->paginate(12)->withQueryString();
        return view('public.universities', compact('universities'));
    }

    public function show($slug)
    {
        $university = University::with('colleges')->where('slug', $slug)->firstOrFail();
        return view('public.university-detail', compact('university'));
    }
}