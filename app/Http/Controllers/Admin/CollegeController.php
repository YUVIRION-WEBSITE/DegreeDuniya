<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCollegeRequest;
use App\Http\Requests\Admin\UpdateCollegeRequest;
use App\Models\College;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CollegeController extends Controller
{
    public function index()
    {
        $colleges = College::paginate(10);
        return view('admin.colleges.index', compact('colleges'));
    }
    public function show(College $college)
    {
        $courses = $college->courses()->paginate(5); // Paginate 5 courses per page
        return view('admin.colleges.show', compact('college', 'courses'));
    }

    public function create()
    {
        $universities = University::all();
        return view('admin.colleges.create', compact('universities'));
    }

    public function store(StoreCollegeRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('logo')) {
            $data['logo_path'] = $request->file('logo')->store('colleges', 'public');
        }
        College::create($data);
        return redirect()->route('admin.colleges.index')->with('success', 'College created successfully.');
    }



    public function edit(College $college)
    {
        $universities = University::all();
        return view('admin.colleges.edit', compact('college', 'universities'));
    }

    public function update(UpdateCollegeRequest $request, College $college)
    {
        $data = $request->validated();
        if ($request->hasFile('logo')) {
            if ($college->logo_path) {
                Storage::delete($college->logo_path);
            }
            $data['logo_path'] = $request->file('logo')->store('colleges', 'public');
        }
        $college->update($data);
        return redirect()->route('admin.colleges.index')->with('success', 'College updated successfully.');
    }

    public function destroy(College $college)
    {
        if ($college->logo_path) {
            Storage::delete($college->logo_path);
        }
        $college->delete();
        return redirect()->route('admin.colleges.index')->with('success', 'College deleted successfully.');
    }
}
