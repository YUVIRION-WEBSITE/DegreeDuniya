<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUniversityRequest;
use App\Http\Requests\Admin\UpdateUniversityRequest;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UniversityController extends Controller
{
    public function index()
    {
        $universities = University::paginate(10);
        return view('admin.universities.index', compact('universities'));
    }

    public function create()
    {
        return view('admin.universities.create');
    }

    public function store(StoreUniversityRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('logo')) {
            $data['logo_path'] = $request->file('logo')->store('universities', 'public');
        }
        University::create($data);
        return redirect()->route('admin.universities.index')->with('success', 'University created successfully.');
    }

    public function show(University $university)
    {
        return view('admin.universities.show', compact('university'));
    }

    public function edit(University $university)
    {
        return view('admin.universities.edit', compact('university'));
    }

    public function update(UpdateUniversityRequest $request, University $university)
    {
        $data = $request->validated();
        if ($request->hasFile('logo')) {
            if ($university->logo_path) {
                Storage::delete($university->logo_path);
            }
            $data['logo_path'] = $request->file('logo')->store('universities', 'public');
        }
        $university->update($data);
        return redirect()->route('admin.universities.index')->with('success', 'University updated successfully.');
    }

    public function destroy(University $university)
    {
        if ($university->logo_path) {
            Storage::delete($university->logo_path);
        }
        $university->delete();
        return redirect()->route('admin.universities.index')->with('success', 'University deleted successfully.');
    }
}