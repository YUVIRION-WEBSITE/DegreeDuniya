<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCMSRequest;
use App\Http\Requests\Admin\UpdateCMSRequest;
use App\Models\CMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CMSController extends Controller
{
    public function index()
    {
        $cms = CMS::paginate(10);
        return view('admin.cms.index', compact('cms'));
    }

    public function create()
    {
        return view('admin.cms.create');
    }

    public function store(StoreCMSRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('cms', 'public');
        }
        CMS::create($data);
        return redirect()->route('admin.cms.index')->with('success', 'Content created successfully.');
    }

    public function show(CMS $cm)
    {
        return view('admin.cms.show', compact('cm'));
    }

    public function edit(CMS $cm)
    {
        return view('admin.cms.edit', compact('cm'));
    }

    public function update(UpdateCMSRequest $request, CMS $cm)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            if ($cm->image_path) {
                Storage::delete($cm->image_path);
            }
            $data['image_path'] = $request->file('image')->store('cms', 'public');
        }
        $cm->update($data);
        return redirect()->route('admin.cms.index')->with('success', 'Content updated successfully.');
    }

    public function destroy(CMS $cm)
    {
        if ($cm->image_path) {
            Storage::delete($cm->image_path);
        }
        $cm->delete();
        return redirect()->route('admin.cms.index')->with('success', 'Content deleted successfully.');
    }
}